@extends('app')

@section('content')
    <div class="container">
        <b>Chicken: </b>{{$chicken}}<br>
        <b>Shrimp: </b>{{$shrimp}}<br>
        <b>Veggies: </b>{{$veggies}}<br>
        <b>Child Meal: </b>{{$children}}<br>
        <b>No Child Meal: </b>{{$noChildMeal}}<br>


        <br>
        <b>Total Attending Count: </b>{{$guestCount}}<br>


    </div>
@endsection
