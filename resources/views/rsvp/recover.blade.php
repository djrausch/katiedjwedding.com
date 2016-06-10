@extends('app')

@section('script_extras')
    <script type="text/javascript" src="{{asset('js/rsvp.js')}}"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1 header-hero shadow">
            <img src="{{asset('img/hero_rsvp.jpg')}}" width="100%">

            <div class="header-hero-text">
                <h1 class="text-center title oxygen">RSVP Recovery</h1>
                <h4 class="text-center oxygen">Lost your RSVP email? No problem!</h4>
            </div>
            <hr>
            @include('errors.list')
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <p class="center-block">To find your RSVP, simply enter your email and press find. If this is a recognized device, you will be shown the edit RSVP page. Either way, an email will
                        be sent with
                        directions to update your RSVP</p>
                    {!! Form::open() !!}
                    {{csrf_field()}}
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email">
                    <br>
                    <button class="btn btn-lg btn-primary col-md-10 col-md-offset-1" type="submit">Find!</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
@endsection
