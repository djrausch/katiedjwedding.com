@foreach($rsvps as $rsvp)
    @foreach($rsvp->attendees as $attendee)
        <b>{{$attendee->first_name.' '.$attendee->last_name}}</b>:@if($attendee->attending) Attending @else Not Attending@endif
    @endforeach
    <br><br>
@endforeach