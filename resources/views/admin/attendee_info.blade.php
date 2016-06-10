@extends('app')

@section('content')
    <div class="container">
        <h2>{{$attendee->first_name." ".$attendee->last_name}}</h2>
        <b>Created: </b>{{$attendee->created_at}}<br>
        @if($attendee->created_at != $attendee->updated_at)
            <b>Updated: </b>{{$attendee->updated_at}}<br>
        @endif
        <b>Phone:</b> {{$attendee->phone_number}}<br>
        <b>Email:</b> {{$attendee->email}}<br>
        <b>Attending:</b> @if($attendee->attending)Yes @else No @endif<br>
        <b>RSVP:</b><a href="{!! url('/admin/rsvps/'.$attendee->rsvp->id) !!}">{{$attendee->rsvp->id}}</a><br>
        <b>BBQ Invite: </b> @if($attendee->bbq)Yes @else No @endif<br>
        @if($attendee->bbq)
            <b>BBQ Attending: </b>
            @if($attendee->bbqResponse == null)
                No Response
            @elseif($attendee->bbqResponse)
                Yes
            @else
                No
            @endif
        @endif

        <br>
        <h3>Meal</h3>
        <b>Item: </b>{{$attendee->meal!=null?$attendee->meal->getMealName():"No Meal Picked"}}<br>
        <b>Notes: </b>{{$attendee->meal!=null?$attendee->meal->notes:""}}
    </div>
@endsection
