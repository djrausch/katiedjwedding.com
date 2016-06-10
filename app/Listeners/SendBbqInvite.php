<?php

namespace App\Listeners;

use App\Events\BbqInvite;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class SendBbqInvite
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
     * @param  BbqInvite $event
     * @return void
     */
    public function handle(BbqInvite $event)
    {
        $attendee = $event->attendee;
        if (!App::environment('local')) {
            if ($attendee->email != null && $attendee->email != '') {
                Mail::send('emails.bbq_invite', ['attendee' => $attendee], function ($message) use ($attendee) {
                    $message->to($attendee->email)->subject('You\'re invited to a family BBQ!')->replyTo('djrausch3@gmail.com', 'DJ Rausch');
                });
                $attendee->bbq_response = 1;
                $attendee->save();
            }
        }
    }
}
