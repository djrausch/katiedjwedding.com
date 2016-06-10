@extends('app')
@section('script_extras')
    <script type="text/javascript" src="{{asset('js/rsvp.js')}}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1 header-hero shadow">
            <img src="{{asset('img/hero_rsvp.jpg')}}" width="100%">

            <div class="header-hero-text">
                <h1 class="text-center title oxygen">RSVP</h1>
                <h4 class="text-center oxygen">Please let us know if you will be able to attend!</h4>
                <h5 class="text-center oxygen"><a href="{{url('/rsvp/recover')}}">Already RSVP'd and need to update? Click here!</a></h5>
            </div>
            <hr>
            @include('errors.list')
            {!! Form::open(['url' => 'rsvp','id'=>'rsvp_form']) !!}
            {{csrf_field()}}
            <input type="hidden" id="guestNumber" name="guestNumber" value="0">

            <div class="row">
                <div id="guestList" class="well col-md-10 col-md-offset-1">
                    <div id="guest-1">
                        <div class="row">
                            <h4>Guest 1</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control" name="firstName[0]"
                                       placeholder="First Name"
                                       required>
                            </div>
                            <div class="col-md-3">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" name="lastName[0]"
                                       placeholder="Last Name"
                                       required>
                            </div>
                            <div class="col-md-3">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email[0]"
                                       placeholder="Email"
                                       required>
                            </div>
                            <div class="col-md-3">
                                <label for="phone">Cell Number</label>
                                <input type="text" class="form-control" name="phone_number[0]"
                                       placeholder="Cell Phone #"
                                       required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 text-center" data-toggle="buttons">
                                <label class="btn btn-not-attending col-md-4 col-md-offset-1 col-xs-12">
                                    <input type="radio" name="attending[0]" value="off" id="option2" autocomplete="off">
                                    Not Attending :(
                                </label>
                                <div class="col-md-2"></div>
                                <label class="btn btn-attending col-md-4 col-xs-12">
                                    <input type="radio" name="attending[0]" value="on" id="option3" autocomplete="off"
                                           required> Attending!
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div id="additionalGuests"></div>

                </div>
            </div>
            <div class="row">
                <button class="btn btn-lg btn-primary col-md-10 col-md-offset-1 col-xs-8 col-xs-offset-2" type="button"
                        id="addGuestButton">Add
                    Guest
                </button>
            </div>
            <br>
            <div class="row">
                <button class="btn btn-lg btn-primary col-md-10 col-md-offset-1 col-xs-8 col-xs-offset-2" type="button"
                        id="addChildButton">Add
                    Child (12 & Under)
                </button>
            </div>

            <br>
            <div>
                <center>
                    {!! Recaptcha::render() !!}
                </center>
            </div>
            <br>
            <div class="row">
                <button id="nextStep" class="btn btn-lg btn-primary col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1"
                        type="submit">
                    Continue!
                </button>
            </div>
            {!! Form::close() !!}
                    <!-- What? -->
        </div>
    </div>
@endsection
