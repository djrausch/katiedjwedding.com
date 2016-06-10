@extends('app')

@section('content')
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1 header-hero shadow">
            <img src="{{asset('img/hero_photos.png')}}" width="100%">

            <div class="header-hero-text">
                <h1 class="text-center title oxygen">Photos</h1>
                <h4 class="text-center oxygen">LOOK HOW CUTE WE ARE!!</h4>
            </div>
            <hr>

            <h3>Wedding Photos</h3>
            <p>Coming Soon!!!</p>

            <h3>Engagement Pictures</h3>
            <a href="https://goo.gl/photos/UwvTSHiKhrGwquKj7" target="_blank">Click to view the entire album on Google Photos</a>
        </div>
    </div>
@endsection