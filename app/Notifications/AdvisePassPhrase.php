<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class AdvisePassPhrase extends Notification
{
    use Queueable;

    public $passphrase;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $passphrase)
    {
        $this->passphrase = $passphrase;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Votre code de connexion pour ' . config('app.name'))
            ->line('Voici votre mot de passe de connexion qui est valable pour les 15 prochaines minutes')
            ->line($this->passphrase)
            ->line('Ou cliquez sur le bouton pour accéder au site (s\'ouvre dans une nouvelle fenêtre)')
            ->action('Confirm', URL::temporarySignedRoute(
                'login.magiclink',
                now()->addMinutes(15),
                ['user' => $notifiable->id, 'code' => $this->passphrase]
            ))
            ->line('Merci d\'utiliser notre application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
