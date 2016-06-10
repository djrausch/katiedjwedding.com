@foreach($attendees as $attendee)
{{$attendee->first_name}} {{$attendee->last_name}} - {{$attendee->meal->getMealName()}}<br>
@endforeach