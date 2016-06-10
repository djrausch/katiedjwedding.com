<?php
namespace App\Http\Controllers;

use App\Attendee;
use App\Events\SendSms;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Laracasts\Flash\Flash;
use Services_Twilio;
use Bugsnag;

class MessagingController extends Controller
{
    public function __construct()
    {
        /*$this->middleware('auth');
        $this->middleware('admin');*/
    }

    public function smsDashboard()
    {
        return view('admin.messaging.sms_dashboard');
    }

    public function emailDashboard()
    {
        return view('admin.messaging.email_dashboard');
    }

    public function smsQuick(Request $request)
    {
        if ($request->smsToSimple == 0) {
            //All
            foreach (Attendee::all() as $attendee) {
                if (!empty($attendee->phone_number)) {
                    event(new SendSms($attendee, $request->smsBody));
                }
            }
        } else if ($request->smsToSimple == 1) {
            //Attending
            foreach (Attendee::attending()->get() as $attendee) {
                if (!empty($attendee->phone_number)) {
                    event(new SendSms($attendee, $request->smsBody));
                }
            }
        } else if ($request->smsToSimple == 2) {
            //Not Attending
            foreach (Attendee::notAttending()->get() as $attendee) {
                if (!empty($attendee->phone_number)) {
                    event(new SendSms($attendee, $request->smsBody));
                }
            }
        } else if($request->smsToSimple == 3){
            //BBQ
            $attendee = Attendee::find(1);
            event(new SendSms($attendee,'An automated message from Katie & DJ: Please RSVP to the family bbq by 3/25. Check you email for directions or visit http://ktdj.us/bbq'));
        }
        Flash::success('SMS Sent!');
        return redirect('/admin');
    }

    public
    function emailQuick(Request $request)
    {
        $emails = [];
        if ($request->emailToSimple == 0) {
            //All
            foreach (Attendee::all() as $attendee) {
                if (!empty($attendee->email)) {
                    array_push($emails, $attendee->email);
                }
            }
        } else if ($request->emailToSimple == 1) {
            //Attending
            foreach (Attendee::attending()->get() as $attendee) {
                if (!empty($attendee->email)) {
                    array_push($emails, $attendee->email);
                }
            }
        } else if ($request->emailToSimple == 2) {
            //Not Attending
            foreach (Attendee::notAttending()->get() as $attendee) {
                if (!empty($attendee->email)) {
                    array_push($emails, $attendee->email);
                }
            }
        }
        Mail::send('emails.mass_email', ['body' => $request->emailBody], function ($message) use ($emails, $request) {
            $message->bcc($emails)->subject($request->emailSubject);
        });

        Flash::success('Email Sent!');
        return redirect('/admin');
    }

    public
    function sms(Request $request)
    {
        dd($request);
    }

    public
    function email(Request $request)
    {
        dd($request);
    }
}