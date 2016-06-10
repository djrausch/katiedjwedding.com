@extends('app')

@section('content')
    <table class="table table-striped table-bordered table-hover">
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
                <td><a href="{{url('/admin/attendees/'.$foodEntry->attendee->id)}}">{{$foodEntry->attendee->first_name." ".$foodEntry->attendee->last_name}}</a></td>
                <td>{{$foodEntry->notes}}</td>
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

    {!! $food->render() !!}

@endsection

