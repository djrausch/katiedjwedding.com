Hi {{$attendee->first_name}}!<br><br>
Here is your RSVP edit link:<br>
<a href="{{url('/rsvp/'.$attendee->rsvp->id.'/edit/'.$attendee->rsvp->edit_key)}}">{{url('/rsvp/'.$attendee->rsvp->id.'/edit/'.$attendee->rsvp->edit_key)}}</a>