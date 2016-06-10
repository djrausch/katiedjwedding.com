<?php

namespace App\Events;

use App\Events\Event;
use App\Rsvp;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class RsvpSaved extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @param Rsvp $rsvp
     */
    public function __construct(Rsvp $rsvp)
    {
        $this->rsvp = $rsvp;
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
