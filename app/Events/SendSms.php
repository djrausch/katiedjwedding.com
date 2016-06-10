<?php

namespace App\Events;

use App\Attendee;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SendSms extends Event
{
    use SerializesModels;
    public $attendee;
    public $message;

    /**
     * Create a new event instance.
     *
     * @param Attendee $attendee
     * @param $message
     */
    public function __construct(Attendee $attendee, $message)
    {
        $this->attendee = $attendee;
        $this->message = $message;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
