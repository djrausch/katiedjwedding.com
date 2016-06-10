@extends('app')

@section('content')
    <h1>BBQ</h1>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Attending</th>
            <th>Last Update</th>
            <th>RSVP</th>
        </tr>
        </thead>
        <tbody>
        @foreach($invited as $attendee)
            @if($attendee->bbqResponse == null)
                <tr>
            @else
                <tr class="{{$attendee->bbqResponse->attending?'success':'danger'}}">
                    @endif
                    <td>
                        <a href="{{url('/admin/attendees/'.$attendee->id)}}">{{$attendee->first_name." ".$attendee->last_name}}</a>
                    </td>
                    <td>{{$attendee->phone_number}}</td>
                    <td><a href="mailto:{{$attendee->email}}">{{$attendee->email}}</a></td>
                    @if($attendee->bbqResponse !=null)
                        <td>{{$attendee->bbqResponse->attending?'Yes':'No'}}</td>
                        <td>{{$attendee->bbqResponse->updated_at}}</td>
                    @else
                        <td>No Response</td>
                        <td>N/A</td>
                    @endif

                    <td>
                        <a href="{{url('/admin/rsvps/'.$attendee->rsvp_id)}}">{{$attendee->rsvp_id}}</a>
                    </td>

                </tr>
                @endforeach
        </tbody>
        {{--            <tfoot>
                    <tr><th colspan="3">
                            <div class="ui right floated pagination menu">
                                <a class="icon item">
                                    <i class="left chevron icon"></i>
                                </a>
                                <a class="item">1</a>
                                <a class="item">2</a>
                                <a class="item">3</a>
                                <a class="item">4</a>
                                <a class="icon item">
                                    <i class="right chevron icon"></i>
                                </a>
                            </div>
                        </th>
                    </tr></tfoot>--}}
    </table>

    {!! $invited->render() !!}

@endsection

