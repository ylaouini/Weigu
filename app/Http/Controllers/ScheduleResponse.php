<?php

namespace App\Http\Controllers;

use App\Events\TotalResponseChanged;
use App\Models\ChMessage;
use Illuminate\Http\Request;

class ScheduleResponse extends Controller
{

    public function __invoke ()
    {
        $messages = ChMessage::where('broadcast_message_id' ,'!=',null)->get();

        $responses = [];
        foreach ($messages as $message) {
            $sender = $message->from_id;
            $receiver = $message->to_id;

            $reply = ChMessage::where('from_id', $receiver)
                ->where('to_id' , $sender)
                ->where('created_at', '>',$message->created_at)
                ->first();

            if($reply != null){
                if (strtotime($reply->created_at) > strtotime($message->created_at))
                    $responses [] = $reply;
            }
        }

        event(new TotalResponseChanged(count($responses)));
    }
}
