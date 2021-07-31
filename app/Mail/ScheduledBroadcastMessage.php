<?php

namespace App\Mail;

use App\Models\BroadcastMessage;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ScheduledBroadcastMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $receiver;
    public $sender;
    public $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $receiver, string $sender, BroadcastMessage $message)
    {
        $this->receiver = $receiver;
        $this->sender = $sender;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreplay@weigu-app.com')
            ->view('vendor.mail.html.schedulerMessage')
            ->with([
                'name' => $this->receiver->name,
                'content' => $this->message->message,
                'sender' => $this->sender,
            ]);
    }
}
