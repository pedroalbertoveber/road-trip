<?php

namespace App\Listeners;

use App\Events\TripRegistered;
use App\Mail\TripRegistered as TripMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TripRegisteredListener
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
    public function handle(TripRegistered $event)
    {
        $email = new TripMail(
                Auth::user()->name,
                $event->where_to,
                $event->id,
        );

        Mail::to(Auth::user())->queue($email);
    }
}
