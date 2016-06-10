@extends('app')

@section('content')
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>RSVP # (Total: {{$rsvpCount}})</th>
                <th>Attendees (Total: {{$attendeeCount}})</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rsvps as $rsvp)
                <tr>
                    <td><a href="{!! url('/admin/rsvps/'.$rsvp->id) !!}">{{$rsvp->id}}</a></td>
                    <td>
                        @foreach($rsvp->attendees as $attendee)
                            <a href="{!! url('/admin/attendees/'.$attendee->id) !!}">{{$attendee->first_name." ".$attendee->last_name}}</a><br>
                        @endforeach
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
@endsection

