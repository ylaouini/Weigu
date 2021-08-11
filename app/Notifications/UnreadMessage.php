<?php

namespace App\Notifications;

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
        return (new MailMessage)
            ->from('noreply@weigu-app.com','Weigu')
            ->subject('Nouveau message')
            ->greeting('Salut '.$notifiable->name)
            ->line('Vous avez '.$this->messageCount.' message(s) non lu')
            ->action('Aller au message', URL::route('chat'))
            ->line('Merci d\'utiliser notre application!');
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
