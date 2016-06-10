@extends('app')

@section('content')
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1 header-hero shadow">
            <img src="{{asset('img/hero_tucson.png')}}" width="100%">

            <div class="header-hero-text">
                <h1 class="text-center title oxygen">Rehearsal Info</h1>
            </div>
            <hr>
            <div class="col-md-10 col-md-offset-1">
                <div>
                    <a name="activities"><h2>Wedding Rehearsal</h2></a>

                    <p>
                    <h3>Arizona Sonora Desert Museum</h3>
                    <b>Time: </b> 3:30PM<br>
                    <p>
                </div>
                <hr>
                <div>
                    <a name="urban"><h2>Rehearsal Dinner</h2></a>
                    <p>
                    <h3>Guadalajara Original Grill</h3>
                    <b>Time: </b> 7:00PM<br>
                    <b>Address: </b> 1220 E Prince Rd, Tucson, AZ 85719
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection