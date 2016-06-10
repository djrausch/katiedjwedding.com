Thank you so much for RSVPing for the family BBQ.
<br>
Here are your BBQ RSVP details:<br>
@foreach($rsvp->attendees as $attendee)
    <b>{{$attendee->first_name.' '.$attendee->last_name}}: </b>
    @if($attendee->bbqResponse->attending)
        Attending!
    @else
        Not Attending
    @endif
    <br>
@endforeach
<br><br>
Thanks,<br>
Katie & DJ