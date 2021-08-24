<?php

namespace App\Http\Controllers;

use App\Models\BroadcastMessage;
use App\Models\ChMessage;
use App\Models\Message;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('home', ['user' => $user]);
    }

    public function exprimer()
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


        session()->flash('message', 'Parcel successfully add.');
        session()->flash('notyfType', 'success');
        return view('exprimer', [
            'totalUsers' => User::all()->count(),
            'totalResponses' => count($responses)+100,
            'totalQuestions' => BroadcastMessage::all()->count()+70,
            'totalNotification' => Notification::where('notifiable_id',\auth()->id())->count(),
            'countUnseenMessages'=> ChMessage::where('to_id', Auth::user()->id)->where('seen', 0)->count()]);
    }
}
