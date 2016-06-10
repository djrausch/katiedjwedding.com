@extends('app')

@section('content')
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1 header-hero shadow">
            <ul class="list-group">
                @if(count($results)>0)
                    @foreach($results as $result)
                        <a href="{{url('/admin/attendees/'.$result->id)}}">
                            <li class="list-group-item">{{$result->first_name}} {{$result->last_name}}</li>
                        </a>
                    @endforeach
                @else
                    No results found
                @endif
            </ul>
        </div>
    </div>
@endsection