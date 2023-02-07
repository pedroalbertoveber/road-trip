<?php

namespace App\Listeners;

use App\Events\NewUser;
use App\Mail\UserSignedUp;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class NewUserWelcomeEmail
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
     * @param  object  $event
     * @return void
     */
    public function handle(NewUser $event)
    {
        $email = new UserSignedUp(
            $event->name,
        );

        Mail::to(Auth::user())->queue($email);
    }
}
