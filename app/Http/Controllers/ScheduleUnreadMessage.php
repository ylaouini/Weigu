<?php

namespace App\Http\Controllers;

use App\Models\ChMessage;
use App\Models\User;
use App\Notifications\UnreadMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleUnreadMessage extends Controller
{
    public function __invoke(){

        $unreadMessages = DB::table('ch_messages')
            ->select('to_id',DB::raw('count(seen) as total_unread'))
            ->where('seen',0)
            ->where('email_sent',0)
            ->groupBy('to_id')
            ->get();

        foreach ($unreadMessages as $item){
            $user = User::find($item->to_id);
            if ($user->notify_me_message == 1){
            $user->notify(new UnreadMessage($item->total_unread));
            ChMessage::where('to_id',$item->to_id)->update(['email_sent' => true]);
            }
        }
    }
}
