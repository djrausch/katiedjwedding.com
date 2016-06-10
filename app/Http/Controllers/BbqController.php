<?php

namespace App\Http\Controllers;

use App\Attendee;
use App\BbqResponse;
use App\Events\BbqInvite;
use App\Events\BbqRsvpSaved;
use App\Events\SendSms;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laracasts\Flash\Flash;

class BbqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bbq.index');
    }

    public function rsvpAuth()
    {
        return view('bbq.rsvp_auth');
    }

    public function rsvpAuthPost(Request $request)
    {
        $email = $request->get('email');
        return redirect('/bbq/rsvp/' . $email);
    }

    public function rsvpByEmail($email)
    {
        $attendee = Attendee::search($email)->first();
        if ($attendee == null) {
            //Not found
            Flash::error('Attendee Not Found');
            return redirect('/bbq/rsvp');
        } else if ($attendee->bbq == 0) {
            // Not invited to bbq
            Flash::error('Account not marked as invited. If this is an error, contact DJ or Katie.');
            return redirect('/bbq/rsvp');
        } else {
            $rsvp = $attendee->rsvp;
            return view('bbq.rsvp_select', compact('attendee', 'rsvp'));
        }
    }

    public function rsvpSelectPost(Request $request)
    {
        $attendee = Attendee::where('email', '=', $request->email)->first();
        $rsvp = $attendee->rsvp;
        $responses = $request->attending;
        foreach ($responses as $key => $item) {
            $bbqResponse = BbqResponse::findByAttendeeId($key)->first();
            if ($bbqResponse == null) {
                $bbqResponse = new BbqResponse();
                $bbqResponse->attendee_id = $key;
            }
            if ($item == 'on') {
                $bbqResponse->attending = true;
            } else {
                $bbqResponse->attending = false;
            }
            $bbqResponse->save();
        }
        event(new BbqRsvpSaved($rsvp));
        Flash::success('We have received your BBQ RSVP and sent a confirmation email!');
        return redirect('/bbq');
    }

    public function sendBbqInvites()
    {
        $attendees = Attendee::bbq()->bbqNotEmailed()->get();
        foreach ($attendees as $attendee) {
            event(new BbqInvite($attendee));
        }
        $text = "Sent BBQ Invites to " . count($attendees) . " people";
        return view('admin.bbq_invite_sent', compact('text'));
    }

    public function sendBbqSms()
    {
        dd();
        $numbersUsed = [];
        $attendees = Attendee::bbq()->get();
        foreach ($attendees as $attendee) {
            if ($attendee->bbqResponse == null) {
                if (!in_array($attendee->phone_number, $numbersUsed)) {
                    array_push($numbersUsed, $attendee->phone_number);
                    event(new SendSms($attendee, "An automated message from Katie & DJ: Please RSVP to the family BBQ by 3/25. Check you email for directions or visit http://ktdj.us/bbq"));
                }
            }
        }
        $text = "Sent BBQ SMS Invites to " . count($numbersUsed) . " people";
        return view('admin.bbq_invite_sent', compact('text'));
    }
}
