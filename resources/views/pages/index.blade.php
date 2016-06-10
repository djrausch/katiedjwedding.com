@extends('app')

@section('content')
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1 header-hero shadow">
            <img src="{{asset('img/hero_index.jpg')}}" width="100%">

            <div class="header-hero-text">
                <h1 class="text-center title cursive">Katie & DJ</h1>
                <h3 class="text-center oxygen">April 2, 2016 at the Arizona Sonora Desert Museum</h3>
                <h5 class="text-center oxygen">{{$daysUntil}} days from today!</h5>
            </div>
        </div>
    </div>
@endsection