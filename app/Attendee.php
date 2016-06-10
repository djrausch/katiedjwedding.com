<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Attendee extends Model
{
    use SearchableTrait;

    protected $fillable = [
        'name',
        'phone_number',
        'attending',
        'email'
    ];

    protected $searchable = [
        'columns' => [
            'attendees.first_name' => 10,
            'attendees.last_name' => 10,
            'attendees.email' => 10,
            'attendees.phone_number' => 10,
        ]
    ];

    public function rsvp()
    {
        return $this->belongsTo('App\Rsvp');
    }

    public function scopeAttending($query)
    {
        $query->where('attending', 1);
    }

    public function scopeNotAttending($query)
    {
        $query->where('attending', 0);
    }

    public function meal()
    {
        return $this->hasOne('App\Meal');
    }

    public function bbqResponse()
    {
        return $this->hasOne('App\BbqResponse');
    }

    public function scopeBbq($query)
    {
        $query->where('bbq', 1);
    }

    public function scopeBbqEmailed($query)
    {
        $query->where('bbq_response', 1);
    }

    public function scopeBbqNotEmailed($query)
    {
        $query->where('bbq_response', 0);
    }
}
