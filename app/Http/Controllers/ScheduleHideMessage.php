<?php

namespace App\Http\Controllers;

use App\Models\ChMessage;
use Illuminate\Http\Request;

class ScheduleHideMessage extends Controller
{
    public function __invoke(Request $request)
    {
        ChMessage::where('show',true)
            ->where('created_at','<',now()->subDay())
            ->update(['show' => false]);
    }
}
