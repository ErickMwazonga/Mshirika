<?php

namespace App\Listeners;

use App\Events\SendMail;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendMailFired
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendMail  $event
     * @return void
     */
    public function handle(SendMail $event)
    {
        $user = User::findOrFail($event->name);

        Mail::send('institutions.mails', [ 'institution'=>$user ], function ($message2) {

            $message2->from('dianneprinsescah@gmail.com', 'Welcome message');

            $message2->to('Email@mailtrap.io')->subject('Thank you for registering with this company.');
        });
    }
}
