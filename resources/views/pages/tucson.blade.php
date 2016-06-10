@extends('app')

@section('content')
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1 header-hero shadow">
            <img src="{{asset('img/hero_tucson.png')}}" width="100%">

            <div class="header-hero-text">
                <h1 class="text-center title oxygen">Information</h1>
                <h4 class="text-center oxygen">
                    <a href="#activities">Outdoor Activities</a> | <a href="#urban">Urban Activities</a> | <a
                            href="#food">Tucson Food</a>
                </h4>
            </div>
            <hr>
            <div class="col-md-10 col-md-offset-1">
                <div>
                    <a name="activities"><h2>Outdoor Activities</h2></a>

                    <p>

                    <h3>Arizona Sonora Desert Museum</h3>
                    <blockquote>The Desert Museum is ranked on TripAdvisor.com as one of the Top 10 Museums in the
                        country and
                        the #1 Tucson attraction. Unlike most museums, about 85% of the experience is outdoors.
                    </blockquote>
                    <b>The couple’s favorite activities:</b>
                    <ul>
                        <li>Cat Canyon (obviously)- see the bobcats, the noteable silly ocelot, and also not-so-feline
                            creatures like the grey fox and the porcupine
                        </li>
                        <li>Mountain Woodland- meet the mountain lion, black bear, and mexican wolf.</li>
                        <li>Riparian Corridor- Otters! Beavers! Coati! Oh my!</li>
                        <li>The Aviaries</li>
                        <li>Reptile, Amphibian & Invertebrate Hall- Katie loves it, DJ doesn’t. It gives him
                            nightmares.
                        </li>
                    </ul>
                    <b>Let Katie or DJ know that you’d like to go to the Desert Museum. They can set up a special rate
                        for admission and tours! </b>
                    </p>

                    <p>

                    <h3>Seven Falls</h3>
                    <ul>
                        <li>Best hike in all of Tucson area
                        <li>8 miles round trip, 3-4 hours. But don’t be intimidate by the numbers, it’s really quite
                            manageable. Moderate level.
                        </li>
                        <li>There are seven water crossings (hence the name) by stepping stones, so semi-amphibious
                            shoes
                            are
                            helpful. Katie and DJ have both been able to do the hike without getting wet.
                        </li>
                        <li>Bring lunch, snacks, lots of water, and something to swim in! There are natural pools at the
                            end
                            of
                            the hike. This makes for a great place to jump in, cool off, and picnic.
                        </li>
                    </ul>
                    </p>

                </div>
                <hr>
                <div>
                    <a name="urban"><h2>Urban Activities</h2></a>
                    <p>
                    <h3>Fourth Avenue/Congress</h3>
                    Want to do some shopping? Get some tasty food? Have a brewski? Take a pop onto Fourth Ave and enjoy
                    the surroundings. But don’t be surprised if a vagrant approaches you asking for a cigarette or
                    money.
                    <h3>University of Arizona- Main Campus</h3>
                    There’s plenty to do at the U! Take a walk around, visit the bookstore, stop by Tri Delta for a
                    photo ;) , or visit one of UA’s various museums.
                    </p>
                </div>
                <hr>
                <div>
                    <a name="food"><h2>Tucson Food</h2></a>
                    <h4>These our some of our favorite restaurants!</h4>
                    <ul>
                        <li>Guadalajara</li>
                        <li>Mi Nidito</li>
                        <li>El Guero Canelo</li>
                        <li>Taqueria Pico de Gallo</li>
                        <li>Reilly Craft Pizza and Beer</li>
                        <li>B Line</li>
                        <li>Goodness</li>
                        <li>Roccos</li>
                        <li>Tavolino</li>
                        <li>Brushfire</li>
                        <li>Bobos</li>
                        <li>Pasco</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
@endsection