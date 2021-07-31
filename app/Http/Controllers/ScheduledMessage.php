<?php

namespace App\Http\Controllers;

use App\Mail\ScheduledBroadcastMessage;
use App\Models\BroadcastMessage;
use App\Models\ChMessage;
use App\Models\User;
use Carbon\Carbon;
use Chatify\Facades\ChatifyMessenger as Chatify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ScheduledMessage extends Controller
{
    /**
     * a method who's gonna send a message to
     * {config:messagedPeople(15)} every {config:messagedTime(12h)}
     * possible bug if $usersNum < eligible users infinite loop trait later
     */
    public function __invoke(Request $request)
    {
        $messages = $this->getActiveMessages();
        $everyMinutes = 2;

        foreach ($messages as $message) {
            $twelveHoursPassed = $this->sendNow($message, $everyMinutes);
            $gotReply = $this->gotReplyYet($message);

            $canSendMessage = $twelveHoursPassed && !$gotReply;

            if ($canSendMessage) {

                $receivers = $this->getRandomUsers($message->user_id, $message->id);

                if (count($receivers) == 0) {
                    return;
                }

                $sender = User::find($message->user_id);

                foreach ($receivers as $receiver) {
                    $this->sendMessage($message, $receiver);
                    if ($receiver->notify_me == 1){
                        Mail::to($receiver)->send(new ScheduledBroadcastMessage($receiver, $sender->name, $message));
                    }

                }
            } elseif ($gotReply) {
                /**
                 * disable the podcast_message since it got replay
                 */
                $message->status = 0;
                $message->update();
//                $totalResponses = Podcast_message::where('status','0')->count();
//                event(new TotalResponseChanged($totalResponses));
            }
        }

    }


    /** get active podcast messages */

    private function getActiveMessages()
    {
        return BroadcastMessage::where('status', '=', '1')->get();
    }

    /**
     * check if our message should be sent now
     * @param $message
     * @return bool
     * @throws \Exception DateTime
     */
    private function sendNow($message, $everyXminutes): bool
    {
        $start_date = new \DateTime($message->created_at);
        $since_start = $start_date->diff(Carbon::now());
        $minutes = $since_start->days * 24 * 60;
        $minutes += $since_start->h * 60;
        $minutes += $since_start->i;

        if ($minutes == 0) {
            return false;
        }

        if (!($minutes % $everyXminutes)) {
            return true;
        }

        return false;
    }

    /**
     * get random number of users so we can send em our Podcast_message
     */

    private function getRandomUsers($userSenderID, $idMessage): array
    {
        /** user blocked */

        $usersender = User::find($userSenderID);
        foreach ($usersender->BlockedUser()->get() as $blockedUser) {
            $usersblocked [] = User::find($blockedUser->user_blocked_id);
        }

        /** user already have message */
        $usersAlreadyHaveMessage = [];

        /** number of users we want to mail */
        $usersNum = 2;
        /** select random users */
        $i = 0;
        /** array of randomly selected users */
        $users = [];

        foreach (ChMessage::where(['from_id' => $userSenderID, 'broadcast_message_id' => $idMessage])->get() as $message) {
            $usersAlreadyHaveMessage [] = User::find($message->to_id);
        }


        while ($i < $usersNum) {
            /**
             * $user = User::inRandomOrder()->limit($usersNum)->get();
             * get random user
             */
            $user = User::inRandomOrder()->first();


            if (User::all()->count() - count($usersAlreadyHaveMessage) - 1 < $usersNum) {
                $usersNum--;
            }
            /** check if rules applies */
            if (!in_array($user, $blockedUser)) {
                if (!in_array($user, $usersAlreadyHaveMessage)) {
                    if (!in_array($user, $users) && $user->id != $userSenderID) {
                        $users[] = $user;
                        $i++;
                    }
                }
            }
        }
        return $users;
    }

    /**
     * send message in app to the user
     */

    private function sendMessage(BroadcastMessage $broadcastMessage, User $reciever)
    {
        $attachment = null;
        $attachment_title = null;
        // send to database
        $messageID = mt_rand(9, 999999999) + time();
        Chatify::newMessage([
            'id' => $messageID,
            'type' => 3,
            'from_id' => $broadcastMessage->user_id,
            'to_id' => $reciever->id,
            'body' => htmlentities(trim($broadcastMessage->message), ENT_QUOTES, 'UTF-8'),
            'attachment' => ($attachment) ? json_encode((object)[
                'new_name' => $attachment,
                'old_name' => $attachment_title,
            ]) : null,

        ]);

        // fetch message to send it with the response
        $messageData = Chatify::fetchMessage($messageID);

        // send to user using pusher
        Chatify::push('private-chatify', 'messaging', [
            'from_id' => $broadcastMessage->user_id,
            'to_id' => $reciever->id,
            'message' => Chatify::messageCard($messageData, 'default')
        ]);
    }

    private function gotReplyYet(BroadcastMessage $message): bool
    {
        $messages = ChMessage::where(['broadcast_message_id' => $message->id])->get();

        foreach ($messages as $message) {
            $sender = $message->from_id;
            $receiver = $message->to_id;

            $replies = ChMessage::where(['from_id' => $receiver, 'to_id' => $sender])->get();
            foreach ($replies as $reply) {
                if (strtotime($reply->created_at) > strtotime($message->created_at))
                    return true;
            }
        }

        return false;
    }
}
