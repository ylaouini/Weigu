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
        session()->flash('message', 'Parcel successfully add.');
        session()->flash('notyfType', 'success');
        return view('exprimer', [
            'totalUsers' => User::all()->count(),
            'totalResponses' => BroadcastMessage::where('status','0')->count(),
            'totalQuestions' => BroadcastMessage::all()->count(),
            'totalNotification' => Notification::where('notifiable_id',\auth()->id())->count(),
            'countUnseenMessages'=> ChMessage::where('to_id', Auth::user()->id)->where('seen', 0)->count()]);
    }
}
