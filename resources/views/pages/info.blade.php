@extends('app')

@section('content')
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1 header-hero shadow">
            <img src="{{asset('img/hero_info.jpg')}}" width="100%">

            <div class="header-hero-text">
                <h1 class="text-center title oxygen">Information</h1>
                <h4 class="text-center oxygen"><a href="#events">Wedding Events</a> |
                    <a href="#attire">Attire</a> |
                    <a href="#transportation">Transportation</a> |
                    <a href="#accommodations">Accommodations</a>
                </h4>
            </div>
            <hr>
            <div class="col-md-10 col-md-offset-1">
                <div>
                    <a name="events"><h2>Wedding Events</h2></a>

                    <p>

                    <h3>Ceremony and Reception</h3>
                    April 2, 2016<br>
                    5:00 pm to 10:00 pm
                    </p>

                    <p>
                        The Arizona Sonora Desert Museum<br>
                        2021 North Kinney Road<br>
                        Tucson, AZ 85743
                    </p>
                </div>
                <hr>
                <div>
                    <a name="attire"><h2>Wedding Attire</h2></a>
                    <p>Dressy casual- keep in mind that the ceremony and cocktail hour will be outdoors.</p>
                    <p><b>Ladies</b> - Dresses/skirts/slacks, similar to an outfit suitable for church</p>
                    <p><b>Gentlemen</b>- Khakis/slacks, nice-ish shirt</p>
                </div>
                <hr>
                <div>
                    <a name="transportation"><h2>Transportation</h2></a>
                    <p>DJ and Katie will not be providing transportation to the venue. You could take a taxi, but it is
                        a roughly 45 minute drive from central Tucson. Don’t plan on using Uber or Lyft.</p>
                    <p class="text-center"><b style="color: red">Disclaimer</b><br>
                        <b>Nurse Katie wants to warn everyone that, since we are not providing transportation, there is to
                        be no driving under the influence. Gates Pass is a very dark and winding road. If you cannot
                        ensure that you won’t get plastered, find yourself a DD or plan to take a taxi. Getting drunk
                        and then planning to drive will not get you a fun and enjoyable night, only a very upset bride.</b>
                    </p>
                </div>
                <hr>
                <div>
                    <a name="accommodations"><h2>Accommodations</h2></a>
                    <p>Airbnb/VRBO/Homeaway, etc: If you really want to get to know Tucson and would like an economical
                        option, we suggest Airbnb-ing a place or renting through vrbo.com. You can pair up with friends
                        and family members and split the cost. Plus you get to experience what life looks like while
                        living in a Tucson neighborhood!</p>
                    <b>Tucson neighborhoods that we recommend for airbnb or vrbo:</b>
                    <ul>
                        <li>Catalina Foothills
                        <li>Gates Pass/Starr Pass/A-Mountain/Mountain Park neighborhoods, east of Silverbell (stay away
                            from Barrio Hollywood)
                        </li>
                        <li>Sam Hughes</li>
                        <li>Blenman-Elm</li>
                        <li>Broadmoor-Broadway/Arroyo Chico</li>
                        <li>El Conquistador/Montevideo</li>
                        <li>Armory Park</li>
                        <li>Barrio Viejo</li>
                        <li>Iron Horse</li>
                    </ul>

                    <p>Wedding planner extraordinaire, Meagan Crain, has secured some rooms with a discounted rate at
                        two
                        hotels for the out of towners who prefer hotels:</p>

                    <p><b>Homewood Suites by Hilton (semi-fancypants, $$)</b><br>
                        4250 N Campbell Ave, Tucson, AZ 85718<br>
                        (520) 577-0007<br></p>
                    <p>$139/night- special rate for our wedding guests, use the code HRW when booking!
                        This option is right next door to our condo. It is nestled behind St. Phillips Plaza, a quaint
                        shopping center with independent, family operated businesses. This corner has clothing, art,
                        wine
                        and olive oil stores with frequent tastings, restaurants, cafes, a dance studio, a salon,
                        pilates
                        studio, a bike shop, and much more. The hotel also provides access to the river run, a paved
                        walking/cycling path that DJ and Katie like to use for walks and runs.</p>

                    <p><b>JW Marriott Tucson Starr Pass (more fancypants, $$$)</b><br>
                        3800 W Starr Pass Blvd, Tucson, AZ 85745<br></p>
                    <p>$239/night- also a special rate for our guests
                        We don’t really know much about JW Marriott other than that it’s pretty lux. It’s the closest
                        hotel
                        to the Desert Museum.
                        To book, visit https://resweb.passkey.com/go/HerrmannandRausch or call 1-877-622-3140 by March
                        4,
                        2016</p>
                </div>
            </div>
        </div>
    </div>
@endsection