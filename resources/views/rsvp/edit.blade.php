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
            </div>
            <hr>
            @include('errors.list')
            {!! Form::open() !!}
            {{csrf_field()}}
            <input type="hidden" name="rsvp_id" value="{{$rsvp->id}}">
            <input type="hidden" name="rsvp_key" value="{{$rsvp->edit_key}}">
            @if($rsvp->attendees[0]->meal == null)
                <input type="hidden" name="first_run" value="1">
            @endif
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading"><h3 class="panel-title">Guest Details</h3></div>
                        <div class="panel-body">
                            @for($i = 0; $i< count($rsvp->attendees); $i++)
                                <div id="guest">
                                    @if(!$rsvp->attendees[$i]->child)
                                        <div class="col-md-3">
                                            <label for="firstName">First Name</label>
                                            <input type="text" class="form-control"
                                                   name="firstName[{{$rsvp->attendees[$i]->id}}]"
                                                   value="{{$rsvp->attendees[$i]->first_name}}"
                                                   required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="lastName">Last Name</label>
                                            <input type="text" class="form-control"
                                                   name="lastName[{{$rsvp->attendees[$i]->id}}]"
                                                   value="{{$rsvp->attendees[$i]->last_name}}"
                                                   required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control"
                                                   name="email[{{$rsvp->attendees[$i]->id}}]"
                                                   value="{{$rsvp->attendees[$i]->email}}"
                                                   @if($i == 0) required @endif
                                            >
                                        </div>
                                        <div class="col-md-2">
                                            <label for="phone">Cell Number</label>
                                            <input type="text" class="form-control"
                                                   name="phone_number[{{$rsvp->attendees[$i]->id}}]"
                                                   value="{{$rsvp->attendees[$i]->phone_number}}"
                                                   @if($i == 0) required @endif
                                            >
                                        </div>
                                        <div class="col-md-1">
                                            <label for="phone">Attending</label>
                                            <input type="checkbox" class="form-control"
                                                   name="attending[{{$rsvp->attendees[$i]->id}}]"
                                                   @if($rsvp->attendees[$i]->attending == 1) checked @endif>
                                        </div>
                                    @else
                                        <div class="col-md-5">
                                            <label for="firstName">First Name</label>
                                            <input type="text" class="form-control"
                                                   name="firstName[{{$rsvp->attendees[$i]->id}}]"
                                                   value="{{$rsvp->attendees[$i]->first_name}}"
                                                   required>
                                        </div>
                                        <div class="col-md-5 col-md-offset-1">
                                            <label for="lastName">Last Name</label>
                                            <input type="text" class="form-control"
                                                   name="lastName[{{$rsvp->attendees[$i]->id}}]"
                                                   value="{{$rsvp->attendees[$i]->last_name}}"
                                                   required>
                                        </div>
                                        <div class="col-md-1">
                                            <label for="phone">Attending</label>
                                            <input type="checkbox" class="form-control"
                                                   name="attending[{{$rsvp->attendees[$i]->id}}]"
                                                   @if($rsvp->attendees[$i]->attending == 1) checked @endif>
                                        </div>
                                    @endif
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading"><h3 class="panel-title">Food Options</h3></div>
                        <div class="panel-body">
                            <h4>All meals include the following sides: Calabacitas and Green Chile Au Gratin
                                Potatoes</h4><br>
                            @foreach($rsvp->attendees as $attendee)
                                <div class="panel panel-default" @if(!$attendee->attending) style="display: none"@endif>
                                    <!-- Default panel contents -->
                                    <div class="panel-heading"><h3
                                                class="panel-title">{{$attendee->first_name}} {{$attendee->last_name}}</h3>
                                    </div>
                                    <div class="panel-body">
                                        @if(!$attendee->child)
                                            <div class="row">
                                                <label class="col-sm-6 col-md-4">
                                                    <div>
                                                        <div class="thumbnail">
                                                            <div class="caption">
                                                                <h4>Charbroiled Stuffed Breast of Chicken</h4>
                                                                <p>Stuffed with a chipotle basil pesto, pancetta
                                                                    ham,
                                                                    and
                                                                    topped with
                                                                    jack cheese</p>
                                                                <input type="radio" name="food[{{$attendee->id}}]"
                                                                       value="1"
                                                                       @if($attendee->meal!= null && $attendee->meal->meal == 1)checked
                                                                       @endif required> {{$attendee->first_name}}
                                                                wants
                                                                Chicken!
                                                            </div>
                                                        </div>
                                                    </div>

                                                </label>
                                                <label class="col-sm-6 col-md-4">
                                                    <div>
                                                        <div class="thumbnail">
                                                            <div class="caption">
                                                                <h4>Garlic Grilled Shrimp</h4>
                                                                <p>Served with roasted red peppers, corn & potato
                                                                    hash,
                                                                    and
                                                                    topped
                                                                    with a tarragon crème</p>
                                                                <input type="radio" name="food[{{$attendee->id}}]"
                                                                       value="2"
                                                                       @if($attendee->meal!= null && $attendee->meal->meal == 2)checked @endif> {{$attendee->first_name}}
                                                                wants
                                                                Shrimp!
                                                            </div>
                                                        </div>
                                                    </div>
                                                </label>
                                                <label class="col-sm-6 col-md-4">
                                                    <div>
                                                        <div class="thumbnail">
                                                            <div class="caption">
                                                                <h4>Grilled Vegetable Palette</h4>
                                                                <p>Poblano chili cheese relleno with a
                                                                    Portabello-mushroom,
                                                                    summer-squash, Bermuda-onion, asparagus,
                                                                    roasted-pepper,
                                                                    and black-bean pico de gallo, with a roasted
                                                                    tomato
                                                                    vinaigrette</p>
                                                                <input type="radio" name="food[{{$attendee->id}}]"
                                                                       value="3"
                                                                       @if($attendee->meal!= null && $attendee->meal->meal == 3)checked @endif> {{$attendee->first_name}}
                                                                wants
                                                                Veggies!
                                                            </div>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        @else
                                            <div class="row">
                                                <label class="col-sm-6 col-md-6">
                                                    <div>
                                                        <div class="thumbnail">
                                                            <div class="caption">
                                                                <h4>Children's Meal</h4>
                                                                <p>Chicken Tenders with Fruit Cup</p>
                                                                <input type="radio" name="food[{{$attendee->id}}]"
                                                                       value="4"
                                                                       @if($attendee->meal!= null && $attendee->meal->meal == 4)checked @endif> {{$attendee->first_name}}
                                                                needs a children's meal!
                                                            </div>
                                                        </div>
                                                    </div>

                                                </label>
                                                <label class="col-sm-6 col-md-6">
                                                    <div>
                                                        <div class="thumbnail">
                                                            <div class="caption">
                                                                <h4>No Children's Meal</h4>
                                                                <input type="radio" name="food[{{$attendee->id}}]"
                                                                       value="5"
                                                                       @if($attendee->meal!= null && $attendee->meal->meal == 5)checked @endif> {{$attendee->first_name}}
                                                                does not need a children's meal!
                                                            </div>
                                                        </div>
                                                    </div>

                                                </label>
                                            </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-md-10 col-md-offset-1">
                                                <label for="notes">Notes (Allegeries, Requests, etc.)</label>
                                                <input class="form-control" type="text"
                                                       value="@if($attendee->meal != null){{$attendee->meal->notes}}@endif"
                                                       name="notes[{{$attendee->id}}]"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button id="nextStep"
                            class="btn btn-lg btn-primary col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1"
                            type="submit">
                        Save!
                    </button>
                </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
@endsection
