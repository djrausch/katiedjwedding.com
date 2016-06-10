@extends('app')

@section('script_extras')
    <script type="text/javascript" src="{{asset('js/rsvp.js')}}"></script>
@endsection

@section('content')
    <h2 class="text-center">RSVP</h2>
    <div class="alert alert-success" role="alert">
{{--
        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
--}}
        <span class="sr-only">Success:</span>
        Your RSVP was received. Please review it below. If you need to edit your RSVP at anytime before X, use this link: {{url('/rsvp/'.$rsvp->id.'/edit/'.$rsvp->edit_key)}}
    </div>
@endsection
