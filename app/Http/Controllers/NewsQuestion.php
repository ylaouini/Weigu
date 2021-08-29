<?php

namespace App\Http\Controllers;

use App\Models\BroadcastMessage;
use App\Models\ChMessage;
use Illuminate\Support\Facades\Auth;

class NewsQuestion extends Controller
{
    public function index()
    {
        $questions = BroadcastMessage::with('user')->get();
        $countUnseenMessages= ChMessage::where('to_id', Auth::user()->id)->where('seen', 0)->count();
//        dd($questions);
        return view('news-question',compact('questions','countUnseenMessages'));
    }


    public function sendQuestion($question)
    {
        $message =  ChMessage::where('broadcast_message_id',$question)->first();
        $newMessage = $message->replicate();
        $newMessage->id = mt_rand(9, 999999999) + time();
        $newMessage->to_id = Auth::id();
        $newMessage->save();
        return redirect(route('chat')) ;
    }
}
