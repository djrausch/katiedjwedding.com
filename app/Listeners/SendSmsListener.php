<?php

namespace App\Listeners;

use App\Events\SendSms;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Services_Twilio;
use Bugsnag\BugsnagLaravel\BugsnagFacade as Bugsnag;

class SendSmsListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new Services_Twilio(getenv('TWILIO_SID'), getenv('TWILIO_TOKEN'));

    }

    /**
     * Handle the event.
     *
     * @param  SendSms  $event
     * @return void
     */
    public function handle(SendSms $event)
    {
        $attendee = $event->attendee;
        $message = $event->message;
        try {
            $message = $this->client->account->messages->sendMessage(
                getenv('TWILIO_FROM_NUMBER'), // From a valid Twilio number
                $attendee->phone_number, // Text this number
                $message
            );
        } catch (\Exception $e) {
            Bugsnag::notifyException($e);
        }
    }
}
