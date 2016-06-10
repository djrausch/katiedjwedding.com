@extends('app')
@section('content')
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1 header-hero shadow">
            <img src="{{asset('img/hero_bbq.jpg')}}" width="100%">

            <div class="header-hero-text">
                <h1 class="text-center title oxygen">Family BBQ RSVP</h1>
                <h4 class="text-center oxygen">Please let us know who will be attending!</h4>
            </div>
            <hr>
            @include('errors.list')
            {!! Form::open(['url' => '/bbq/rsvp/'.$attendee->email,'id'=>'rsvp_form']) !!}
            {{csrf_field()}}

            <div class="row">
                @if($rsvp->attendees[0]->bbqResponse != null)
                    <div class="text-center">Last
                        updated {{$rsvp->attendees[0]->bbqResponse->updated_at->diffForHumans()}}</div>
                @endif
                @foreach($rsvp->attendees as $attendee)
                    <div id="guestList" class="well col-md-10 col-md-offset-1">
                        <div class="row text-center">
                            <h3>{{$attendee->first_name}} {{$attendee->last_name}}</h3>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 text-center" data-toggle="buttons">
                                <label class="btn btn-not-attending col-md-4 col-md-offset-1 col-xs-12 @if($attendee->bbqResponse != null && !$attendee->bbqResponse->attending) active @endif">
                                    <input type="radio" name="attending[{{$attendee->id}}]" value="off" id="option2"
                                           autocomplete="off" @if($attendee->bbqResponse != null && !$attendee->bbqResponse->attending) checked @endif>
                                    Not Attending :(
                                </label>
                                <div class="col-md-2"></div>
                                <label class="btn btn-attending col-md-4 col-xs-12 @if($attendee->bbqResponse != null && $attendee->bbqResponse->attending) active @endif">
                                    <input type="radio" name="attending[{{$attendee->id}}]" value="on" id="option3"
                                           autocomplete="off" @if($attendee->bbqResponse != null && $attendee->bbqResponse->attending) checked @endif
                                           required> Attending!
                                </label>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <br>
            <br>
            <div class="row">
                <button id="nextStep" class="btn btn-lg btn-primary col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1"
                        type="submit">
                    Save!
                </button>
            </div>
            {!! Form::close() !!}
                    <!-- What? -->
        </div>
    </div>
@endsection
