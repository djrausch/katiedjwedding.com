@extends('app')
@section('head_extras')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({menubar: false, selector: 'textarea.wysiwyg'});</script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            {!! Form::open(['url' => '/admin/search', 'method' => 'get']) !!}
            <label for="q">Attendee Search</label>
            <input type="text" class="form-control" name="q" autocomplete="off"
                   placeholder="Attendee Name, Email, or Phone Number">
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row" style="margin-top: 20px">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Quick Message
                </div>
                <div class="panel-body">
                    <div class="well">
                        {!! Form::open(['url' => '/admin/email/quick', 'method' => 'post']) !!}
                        <h4>Email</h4>
                        <hr>
                        <div class="form-group">
                            <label for="emailToSimple">To</label>
                            <select name="emailToSimple" class="form-control">
                                <option value="0">All</option>
                                <option value="1">Attending</option>
                                <option value="2">Not Attending</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="emailSubject">Subject</label>
                            <input type="text" class="form-control" name="emailSubject" id="emailSubject"
                                   placeholder="Subject">
                        </div>

                        <div class="form-group">
                            <label for="emailBody">Body</label>
                            <textarea name="emailBody" class="form-control wysiwyg" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Send Email</button>
                        {!! Form::close() !!}

                    </div>
                    <div class="well">
                        {!! Form::open(['url' => '/admin/sms/quick', 'method' => 'post']) !!}
                        <h4>SMS</h4>
                        <hr>
                        <div class="form-group">
                            <label for="smsToSimple">To</label>
                            <select name="smsToSimple" class="form-control">
                                <option value="0">All</option>
                                <option value="1">Attending</option>
                                <option value="2">Not Attending</option>
                                <option value="3">DJ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="smsBody">Message</label>
                            <textarea name="smsBody" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Send SMS</button>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Most Recent Attendees
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        @foreach($latestAttendees as $attendee)
                            <a href="{{url('/admin/attendees/'.$attendee->id)}}"
                               class="list-group-item {{$attendee->attending?'list-group-item-success':'list-group-item-danger'}}">
                                <i class="fa fa-comment fa-fw"></i> {{$attendee->first_name." ".$attendee->last_name}}
                                <span class="pull-right text-muted small"><em>{{$attendee->updated_at->diffForHumans()}}</em>
                                    </span>
                            </a>
                        @endforeach
                    </div>
                    <a href="{{url('/admin/attendees')}}" class="btn btn-default btn-block">View All Attendees</a>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Most Recent BBQ RSVPs
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        @foreach($latestBbq as $bbq)
                            <a href="{{url('/admin/attendees/'.$bbq->attendee->id)}}"
                               class="list-group-item {{$bbq->attending?'list-group-item-success':'list-group-item-danger'}}">
                                <i class="fa fa-comment fa-fw"></i> {{$bbq->attendee->first_name." ".$bbq->attendee->last_name}}
                                <span class="pull-right text-muted small"><em>{{$bbq->updated_at->diffForHumans()}}</em>
                                    </span>
                            </a>
                        @endforeach
                    </div>
                    <a href="{{url('/admin/bbq')}}" class="btn btn-default btn-block">View All BBQ RSVPs</a>
                </div>
            </div>
        </div>
    </div>
@endsection
