<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TotalNotificationChanged implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $totalNotifications,$user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($totalNotifications,User $user)
    {
        $this->totalNotifications = $totalNotifications;
        $this->user = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */

    public function broadcastOn()
    {
        return new PrivateChannel('user-'.$this->user->id);
//        return new Channel('count-changed');
    }

    public function broadcastAs()
    {
        return 'TotalNotificationChanged';
    }
}
