<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    //

    public function scopeChicken($query)
    {
        $query->where('meal', 1);
    }

    public function scopeShrimp($query)
    {
        $query->where('meal', 2);
    }

    public function scopeVeggies($query)
    {
        $query->where('meal', 3);
    }

    public function scopeChildren($query)
    {
        $query->where('meal', 4);
    }

    public function scopeNoMeal($query)
    {
        $query->where('meal', 5);
    }

    public function scopeAttendeeAttending($query)
    {
        $query->whereHas('attendee', function ($query) {
            $query->where('attending', 1);
        });
    }

    public function attendee()
    {
        return $this->belongsTo('App\Attendee');
    }

    public function getMealName()
    {
        return self::convertFromIdToName($this->meal);
    }

    public static function convertFromIdToName($id)
    {
        switch ($id) {
            case 1:
                return "Chicken";
            case 2:
                return "Shrimp";
            case 3:
                return "Veggies";
            case 4:
                return "Kids Meal";
            case 5:
                return "No Meal";

        }
    }
}
