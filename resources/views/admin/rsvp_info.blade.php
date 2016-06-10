@extends('app')

@section('content')
    <div>
        <h2>RSVP</h2>
        <b>Created:</b> {{$rsvp->created_at}}<br>
        @if($rsvp->created_at != $rsvp->updated_at)
            <b>Updated:</b> {{$rsvp->updated_at}}<br>
        @endif
        <h3>Attendees</h3>
        <ul>
            @foreach($rsvp->attendees as $attendee)
                <li><a href="{!! url('/admin/attendees/'.$attendee->id) !!}">{{$attendee->first_name." ".$attendee->last_name}}</a></li>
            @endforeach
        </ul>
        <a href="{{url('/rsvp/'.$rsvp->id.'/edit/'.$rsvp->edit_key)}}">Edit RSVP</a>
    </div>
@endsection
