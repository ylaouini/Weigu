<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ChMessage;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings',['countUnseenMessages'=> ChMessage::where('to_id', Auth::user()->id)->where('seen', 0)->count()]);
    }

    public function changeStatusNotifictionMessage(Request $request)
    {
        $user = User::find($request->user_id);
        $user->notify_me_message = $request->status;
        $user->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    public function changeStatusNotifictionQuestion(Request $request)
    {
        $user = User::find($request->user_id);
        $user->notify_me_question = $request->status;
        $user->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
}
