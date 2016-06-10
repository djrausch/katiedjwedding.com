<?php

namespace App\Http\Controllers;

use App\Attendee;
use App\Events\RsvpRecovered;
use App\Events\RsvpSaved;
use App\Http\Requests;
use App\Http\Requests\RsvpEditRequest;
use App\Http\Requests\RsvpRequest;
use App\Meal;
use App\Rsvp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laracasts\Flash\Flash;

class RsvpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {

        if ($request->cookie('rsvp_id') || $request->cookie('rsvp_token')) {
            return redirect('/rsvp/recover');
        } else {
            return view('rsvp.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RsvpRequest $request
     * @return Response
     */
    public function store(RsvpRequest $request)
    {
        $guestCount = $request->guestNumber + 1;
        $firstNameCount = count($request->firstName);
        if ($guestCount != $firstNameCount) {
            dd('Error!, guestCount: ' . $guestCount . '; firstNameCount: ' . $firstNameCount);
        }

        $rsvp = new Rsvp();
        $editKey = md5(rand() . uniqid(time(), true));
        $rsvp->edit_key = $editKey;
        $rsvp->save();

        $atLeastOneAttending = false;
        $attendeeArray = [];
        for ($i = 0; $i < $guestCount; $i++) {
            $attendee = new Attendee();
            $attendee->first_name = $request->firstName[$i];
            $attendee->last_name = $request->lastName[$i];
            $attendee->phone_number = $request->phone_number[$i];

            if ($request->email[$i] == 'child') {
                $attendee->child = true;
                $attendee->email = "";
            } else {
                $attendee->email = $request->email[$i];
            }

            if ($request->attending[$i] == 'on') {
                $attendee->attending = true;
                $atLeastOneAttending = true;
            } else {
                $attendee->attending = false;
            }
            array_push($attendeeArray, $attendee);
        }


        $rsvp->attendees()->saveMany($attendeeArray);

        if ($atLeastOneAttending) {
            return redirect('/rsvp/' . $rsvp->id . '/edit/' . $editKey)->withCookie(cookie()->forever('rsvp_token', $rsvp->edit_key))->withCookie(cookie()->forever('rsvp_id', $rsvp->id));//view('rsvp.received', compact('rsvp'));
        } else {
            event(new RsvpSaved($rsvp));
            Flash::success('We have received your RSVP and sent a confirmation email!');
            return redirect('/')->withCookie(cookie()->forever('rsvp_token', $rsvp->edit_key))->withCookie(cookie()->forever('rsvp_id', $rsvp->id));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @param $key string edit key
     * @return Response
     */
    public function edit($id, $key)
    {
        $rsvp = Rsvp::findOrFail($id);
        if ($rsvp->edit_key == $key || (Auth::user() != null && Auth::user()->admin)) {
            /*if(Carbon::now()>Carbon::createFromDate(2016,3,12)){

            } else {*/
                return view('rsvp.edit')->with('rsvp', $rsvp);
            //}
            //return "id:" . $id . ";key:" . $key;
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int $id
     * @param $key
     * @return Response
     */
    public function update(RsvpEditRequest $request, $id, $key)
    {
        if ($id != $request->rsvp_id) {
            abort(403);
        }

        $rsvp = Rsvp::find($id);

        if ($key != $request->rsvp_key || $key != $rsvp->edit_key) {
            abort(403);
        }

        $attendees = $rsvp->attendees;
        foreach ($attendees as $attendee) {
            $attendee->first_name = $request->firstName[$attendee->id];
            $attendee->last_name = $request->lastName[$attendee->id];

            if (!$attendee->child) {
                $attendee->email = $request->email[$attendee->id];
                $attendee->phone_number = $request->phone_number[$attendee->id];
            }

            if (array_key_exists($attendee->id, $request->attending) && $request->attending[$attendee->id] == 'on') {
                $attendee->attending = true;
            } else {
                $attendee->attending = false;
            }

            $attendee->save();

            if ($attendee->attending) {
                $meal = $attendee->meal ?: new Meal;
                $meal->meal = $request->food[$attendee->id];
                $meal->notes = $request->notes[$attendee->id];
                $attendee->meal()->save($meal);
            }

        }

        $rsvp->updated_at = Carbon::now();
        $rsvp->save();

        event(new RsvpSaved($rsvp));

        if ($request->first_run == 1) {
            Flash::success('We have received your RSVP and sent a confirmation email!');
            return redirect('/')->withCookie('rsvp_complete', 1);
        } else {
            Flash::success('We have received your updated RSVP and sent a confirmation email!');
            return redirect('/');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function recover()
    {
        return view('rsvp.recover');
    }

    public function resendRsvpEmail(Request $request)
    {
        $attendee = Attendee::where('email', $request->email)->first();
        if (!$attendee) {
            Flash::error('The user with the email, ' . $request->email . ', could not be found!');
            return redirect('/rsvp/recover');
        } else {
            event(new RsvpRecovered($attendee));

            if ($request->cookie('rsvp_token') && $request->cookie('rsvp_id')) {
                //Check if email is part of RSVP
                $rsvp = $attendee->rsvp;
                if ($rsvp->id == $request->cookie('rsvp_id') && $rsvp->edit_key == $request->cookie('rsvp_token')) {
                    Flash::success('This is a recognized device! You may edit your RSVP below.');
                    return redirect('/rsvp/' . $rsvp->id . '/edit/' . $rsvp->edit_key);
                } else {
                    Flash::success('You have been emailed your RSVP edit link. Please check your ' . $attendee->email . ' email!');
                    return redirect('/rsvp/recover');
                }
            } else {
                Flash::success('You have been emailed your RSVP edit link. Please check your ' . $attendee->email . ' email!');
                return redirect('/rsvp/recover');
            }
        }
    }
}
