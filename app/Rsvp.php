<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rsvp extends Model
{
    //
    public function attendees()
    {
        return $this->hasMany('App\Attendee');
    }
}
