<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BbqResponse extends Model
{

    public function scopeAttending($query)
    {
        $query->where('attending', '=', 1);
    }

    public function scopeNotAttending($query)
    {
        $query->where('attending', '=', 0);
    }

    public function scopeFindByAttendeeId($query, $id)
    {
        $query->where('attendee_id', '=', $id);
    }

    public function attendee()
    {
        return $this->belongsTo('App\Attendee');
    }
}
