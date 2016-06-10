<?php

namespace App\Listeners;

use App\Events\RsvpRecovered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class SendRsvpRecoverEmail
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
     * @param  RsvpRecovered  $event
     * @return void
     */
    public function handle(RsvpRecovered $event)
    {
        $attendee = $event->attendee;

        if (!App::environment('local')) {
            Mail::send('emails.rsvp_recover', ['attendee' => $attendee], function ($message) use ($attendee) {
                $message->to($attendee->email)->subject('Your RSVP')->replyTo('djrausch3@gmail.com', 'DJ Rausch');
            });
        }
    }
}
