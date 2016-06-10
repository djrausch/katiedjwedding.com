<?php

namespace App\Http\Controllers;

use App\Attendee;
use App\BbqResponse;
use App\Http\Requests;
use App\Meal;
use App\Rsvp;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $latestAttendees = Attendee::orderBy('created_at', 'desc')->take(10)->get();
        $latestBbq = BbqResponse::orderBy('updated_at', 'desc')->take(10)->get();
        return view('admin.index', compact('latestAttendees', 'latestBbq'));
    }

    public function rsvps()
    {
        $rsvps = Rsvp::with('attendees')->get();
        $rsvpCount = Rsvp::count();
        $attendeeCount = Attendee::count();
        return view('admin.rsvps', compact('rsvps', 'rsvpCount', 'attendeeCount'));
    }

    public function rsvpInfo($id)
    {
        $rsvp = Rsvp::with('attendees')->find($id);
        return view('admin.rsvp_info', compact('rsvp'));
    }

    public function attendees()
    {
        $attending = Input::get('attending');

        if (isset($attending) && $attending == '1') {
            $attendees = Attendee::attending()->paginate(25);
        } else if (isset($attending) && $attending == '0') {
            $attendees = Attendee::notAttending()->paginate(25);
        } else {
            $attendees = Attendee::paginate(25);
        }
        return view('admin.attendee_list', compact('attendees'));
    }

    public function attendeesInfo($id)
    {
        $attendee = Attendee::find($id);
        return view('admin.attendee_info', compact('attendee'));
    }

    public function food()
    {
        $food = Meal::attendeeAttending()->paginate(25);
        return view('admin.food_list', compact('food'));
    }

    public function foodCount()
    {
        $chicken = Meal::chicken()->attendeeAttending()->count();
        $shrimp = Meal::shrimp()->attendeeAttending()->count();
        $veggies = Meal::veggies()->attendeeAttending()->count();
        $children = Meal::children()->attendeeAttending()->count();
        $noChildMeal = Meal::noMeal()->attendeeAttending()->count();

        $guestCount = Attendee::attending()->count();
        return view('admin.food_count', compact('chicken', 'shrimp', 'veggies', 'children', 'noChildMeal', 'guestCount'));
    }

    public function foodRaw()
    {
        $food = Meal::attendeeAttending()->get();
        return view('admin.food_raw', compact('food'));
    }

    public function search()
    {
        $q = Input::get('q');
        $results = Attendee::search($q)->get();
        return view('admin.search_results', compact('results'));
    }

    public function bbqList()
    {
        //$attending = Input::get('attending');
        $invited = Attendee::bbq()->paginate(25);

        /*if (isset($attending) && $attending == '1') {
            $bbqResponses = BbqResponse::attending()->paginate(25);
        } else if (isset($attending) && $attending == '0') {
            $bbqResponses = BbqResponse::notAttending()->paginate(25);
        } else {
            $bbqResponses = BbqResponse::paginate(25);
        }*/

        return view('admin.bbq_attendee_list', compact('invited'));
    }

    public function verify(){
        $attendees = Attendee::attending()->orderBy('last_name')->get();
        return view('admin.verify',compact('attendees'));
    }
}
