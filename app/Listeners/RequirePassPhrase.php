<?php

namespace App\Listeners;

use App\Notifications\AdvisePassPhrase;
use App\Utility\PassPhrase;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class RequirePassPhrase
{
    protected $generator;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(PassPhrase $generator)
    {
        $this->generator = $generator;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // don't need to interrupt the process if the user
        // logged in with remember token
         if (auth()->viaRemember()){
             return;
         }

         $passphrase = $this->generator->passPhrase(3);
         Session::put('passphrase',$passphrase);
         Session::put('passphrase_expiry',now()->addMinutes(15)->timestamp);

         $event->user->notify(new AdvisePassPhrase($passphrase));


    }
}
