<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleChangeName extends Controller
{
    public function __invoke()
    {
        $users = User::all();
        $date = Carbon::now()->format('Ym');

        foreach ($users as $user){
            $user->name = $date.$user->id;
            $user->save();
        }
    }
}
