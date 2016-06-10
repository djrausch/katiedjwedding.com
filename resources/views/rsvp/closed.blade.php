@extends('app')

@section('script_extras')
    <script type="text/javascript" src="{{asset('js/rsvp.js')}}"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1 header-hero shadow">
            <img src="{{asset('img/hero_rsvp.jpg')}}" width="100%">

            <div class="header-hero-text">
                <h1 class="text-center title oxygen">RSVP Closed</h1>
            </div>
            <hr>
            @include('errors.list')
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <p class="center-block">RSVPs closed on 3/12/2016</p>
                </div>
            </div>
        </div>

    </div>
@endsection
