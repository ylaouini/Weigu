<?php

namespace App\Notifications;

use App\Models\ChMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class UnreadMessage extends Notification implements ShouldQueue
{
    use Queueable;

    public $messageCount;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($messageCount)
    {
        $this->messageCount = $messageCount;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = URL::route('chat');
        $messages = ChMessage::where('to_id',$notifiable->id)->where('seen',0)->where('email_sent',0)->get();
        $messages = $messages->unique('to_id');
        return (new MailMessage)
            ->subject('Nouveau message privé')
            ->from('noreply@weigu-app.com','Weigu')
            ->markdown('mail.unreadMessage',[
                'messageCount' => $this->messageCount,
                'name' => $notifiable->name,
                'url' => $url,
                'messages' => $messages
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
