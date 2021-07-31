<?php

namespace App\Http\Controllers;

use App\Events\TotalQuestionChanged;
use App\Mail\ScheduledBroadcastMessage;
use App\Models\BroadcastMessage;
use App\Models\User;
use Chatify\Facades\ChatifyMessenger as Chatify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BroadcastMessageController extends Controller
{
    public function insertRecord(Request $request)
    {
        $message = new BroadcastMessage();

        $message->user_id = Auth::id();
//        $message->type = $request->input('type');
        $message->message = $request->input('message');
        $message->status = 1;

        $isSaved = $message->save();
        if ($isSaved) {

            $receivers = $this->getRandomUsers($message->user_id);

            $sender = User::find($message->user_id);

            foreach ($receivers as $receiver) {
                $this->sendMessage($message, $receiver);
                if ($receiver->notify_me == 1) {
                    Mail::to($receiver)->send(new ScheduledBroadcastMessage($receiver, $sender->name, $message));
                }
//                $receiver->notify(new ScheduledBroadcastMessage($receiver, $sender->name, $message));
            }
        }

        $totalQuestions = BroadcastMessage::all()->count();
//        event(new TotalQuestionChanged($totalQuestions, $message->message, \auth()->user()->name));
        event(new TotalQuestionChanged($totalQuestions, $request->input('message'), $sender->name));

        app(scheduledMessage::class);

        return "message has been created";
    }

    private function getRandomUsers($id): array
    {
        /** user blocked */
        $usersblocked = [];
        foreach (auth()->user()->BlockedUser()->get() as $blockedUser) {
            $usersblocked [] = User::find($blockedUser->user_blocked_id);
        }

        /** number of users we want to mail */
        $usersNum = 15;

        if (User::all()->count() < $usersNum) {
            $usersNum = User::all()->count() - 1;
        }
        /** select random users */
        $i = 0;
        /** array of randomly selected users */
        $users = [];


        while ($i < $usersNum) {
            /**
             * $user = User::inRandomOrder()->limit($usersNum)->get();
             * get random user
             */
            $user = User::inRandomOrder()->first();

            if (User::all()->count() - count($usersblocked) - 1 < $usersNum) {
                $usersNum--;
            }

            /** check if rules applies */
            if (!in_array($user, $usersblocked)) {
                if (!in_array($user, $users) && $user->id != $id) {
                    $users[] = $user;
                    $i++;
                }
            }
        }

        return $users;
    }

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

}
