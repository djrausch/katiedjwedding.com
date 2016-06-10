@extends('app')

@section('content')
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1 header-hero shadow">
            <img src="{{asset('img/hero_bbq.jpg')}}" width="100%">

            <div class="header-hero-text">
                <h1 class="text-center title oxygen">Family BBQ</h1>
                <h4 class="text-center oxygen">RSVP for the family BBQ!</h4>
            </div>
            <hr>
            @include('errors.list')
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <p class="center-block">To find your RSVP, simply enter your email you used to RSVP for the wedding and press find.</p>
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
