<?php

namespace App\Events;

use App\Attendee;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class BbqInvite extends Event
{
    use SerializesModels;
    public $attendee;

    /**
     * Create a new event instance.
     *
     * @param Attendee $attendee
     */
    public function __construct(Attendee $attendee)
    {
        $this->attendee = $attendee;
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
