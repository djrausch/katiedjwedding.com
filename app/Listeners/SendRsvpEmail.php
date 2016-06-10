<?php

namespace App\Listeners;

use App\Events\RsvpSaved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class SendRsvpEmail
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
     * @param  RsvpSaved  $event
     * @return void
     */
    public function handle(RsvpSaved $event)
    {
        $rsvp = $event->rsvp;
        if (!App::environment('local')) {
            $emailsToSendConfirmation = [];
            foreach ($rsvp->attendees as $attendee) {
                if (!empty($attendee->email) && $attendee->email != 'child') {
                    array_push($emailsToSendConfirmation, $attendee->email);
                }
            }

            Mail::send('emails.rsvp_received', ['rsvp' => $rsvp], function ($message) use ($rsvp, $emailsToSendConfirmation) {
                $message->to($emailsToSendConfirmation)->subject('Thank you for RSVPing!')->replyTo('djrausch3@gmail.com', 'DJ Rausch');
            });
        }
    }
}
