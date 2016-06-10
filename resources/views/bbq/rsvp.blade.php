@extends('app')

@section('content')
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1 header-hero shadow">
            <img src="{{asset('img/hero_bbq.jpg')}}" width="100%">

            <div class="header-hero-text">
                <h1 class="text-center title oxygen">Family BBQ RSVP</h1>
            </div>
            <hr>
            <div class="col-md-10 col-md-offset-1">
                <div>
                    <a name="info"><h2>Info</h2></a>

                    <p>
                        We will be holding a family BBQ the day after the wedding -- Sunday April 3rd at 12:00PM. The food will be
                        catered by Brushfire BBQ.<br>
                        There will be pulled pork and shredded chicken, and sides of mac & cheese, sweet potatoes, and
                        caesar salad.
                    </p>

                    <p>
                    <h3>Where</h3>
                    Brandi Fenton Memorial Park - Ramada G (See map below)<br>
                    3482 East River Road<br>
                    Tucson, AZ 85718
                    </p>
                    <a href="{{asset('/img/FamilyBBQmap.png')}}"><img width="100%" src="{{asset('/img/FamilyBBQmap.png')}}"></a>
                </div>
                <hr>
                <div>
                    <a name="bring"><h2>What To Bring</h2></a>
                    <p>If you would like to bring something, we could use the following:</p>
                    <ul>
                        <li>Drinks</li>
                        <li>Desserts</li>
                    </ul>
                    <b>Please let us know if you plan on bringing something so we can make sure there are not
                        duplicates</b>
                </div>
            </div>
        </div>
    </div>
@endsection