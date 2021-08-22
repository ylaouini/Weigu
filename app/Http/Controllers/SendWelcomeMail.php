<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\WelcomeNotification;
use Illuminate\Http\Request;

class SendWelcomeMail extends Controller
{
    public function __invoke()
    {
        $users = User::all();

//        dd($users);
        foreach ($users as $user){
            $user->notify(new WelcomeNotification());
        }
    }
}
