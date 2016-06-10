@extends('app')

@section('content')
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
        @foreach($attendees as $attendee)
            <tr class="{{$attendee->attending?'success':'danger'}}">
                <td><a href="{{url('/admin/attendees/'.$attendee->id)}}">{{$attendee->first_name." ".$attendee->last_name}}</a></td>
                <td>{{$attendee->phone_number}}</td>
                <td><a href="mailto:{{$attendee->email}}">{{$attendee->email}}</a></td>
                <td>{{$attendee->attending==1?'Yes':'No'}}</td>
                <td>{{$attendee->updated_at}}</td>
                <td><a href="{{url('/admin/rsvps/'.$attendee->rsvp_id)}}">{{$attendee->rsvp_id}}</a></td>

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

    {!! $attendees->render() !!}

@endsection

