Thank you so much for RSVPing for our wedding.
<br>
@if($rsvp->attendees[0]->attending)
    We look forward to spending our special day with you.<br>
    Here are your RSVP details:<br>
    @foreach($rsvp->attendees as $attendee)
        <b>{{$attendee->first_name.' '.$attendee->last_name}}: </b>
        @if($attendee->attending)
            Attending!
        @else
            Not Attending
        @endif
        <br>
    @endforeach
@else
    We are sorry you won't be able to attend.
@endif
<br>
If you need to change your RSVP, you can do so by going to the following url: {!!url('/rsvp/'. $rsvp->id . '/edit/' . $rsvp->edit_key)!!}
<br>
RSVP editing will be closed on 3/12/16
<br><br>
Thanks,<br>
Katie & DJ