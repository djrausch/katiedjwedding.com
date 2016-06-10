Totals
<br>
<b>Chicken: </b>{{$food->where('meal',1)->count()}}<br>
<b>Shrimp: </b>{{$food->where('meal',2)->count()}}<br>
<b>Veggies: </b>{{$food->where('meal',3)->count()}}<br>
<b>Child Meal: </b>{{$food->where('meal',4)->count()}}<br>
<b>No Meal: </b>{{$food->where('meal',5)->count()}}<br>

<br>
<table border="1" style="width:100%">
    <thead>
    <tr>
        <th>Item</th>
        <th>Attendee</th>
        <th>Notes</th>
    </tr>
    </thead>
    <tbody>
    @foreach($food as $foodEntry)
        <tr>
            <td>{{$foodEntry->getMealName()}}</td>
            <td>{{$foodEntry->attendee->first_name." ".$foodEntry->attendee->last_name}}</td>
            <td>{{$foodEntry->notes}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
