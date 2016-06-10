<!-- Static navbar -->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        {{--<div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>--}}
        <div id="navbar" class="navbar-collapse">
            <ul class="nav navbar-nav">
                {{--<li class="{{ Request::is('info') ? 'active' : '' }}"><a href="{{url('/info')}}">Info</a></li>
                <li class="{{ Request::is('tucson') ? 'active' : '' }}"><a href="{{url('/tucson')}}">Tucson</a></li>
                <li class="{{ Request::is('registry') ? 'active' : '' }}"><a href="{{url('/registry')}}">Registry</a></li>--}}
                <li class="{{ Request::is('story') ? 'active' : '' }}"><a href="{{url('/story')}}">Story</a></li>
                <li class="{{ Request::is('photos') ? 'active' : '' }}"><a href="{{url('/photos')}}">Photos</a></li>

                {{--
                                <li class="{{ Request::is('details') ? 'active' : '' }}"><a href="#">Details</a></li>
                --}}
{{--
                <li class="{{ Request::is('rsvp') ? 'active' : '' }}"><a href="{{url('/rsvp')}}">RSVP</a></li>
--}}

                @if(Auth::user() != null && Auth::user()->admin)
                    <li class="dropdown {{ Request::is('admin*') ? 'active' : '' }}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Admin <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="{{ Request::is('admin') ? 'active' : '' }}"><a
                                        href="{{url('/admin')}}">Dashboard</a></li>
                            <li class="{{ Request::is('admin/rsvps') ? 'active' : '' }}"><a
                                        href="{{url('/admin/rsvps')}}">RSVPs</a></li>
                            <li class="{{ Request::is('admin/bbq') ? 'active' : '' }}"><a
                                        href="{{url('/admin/bbq')}}">BBQ</a></li>
                            <li class="{{ Request::is('admin/attendees') ? 'active' : '' }}"><a
                                        href="{{url('/admin/attendees')}}">Attendees</a></li>
                            <li class="{{ Request::is('admin/meals') ? 'active' : '' }}"><a
                                        href="{{url('/admin/meals')}}">Meals</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Messaging</li>
                            <li class="{{ Request::is('admin/email') ? 'active' : '' }}"><a
                                        href="{{url('/admin/email')}}">Email</a></li>
                            <li class="{{ Request::is('admin/sms') ? 'active' : '' }}"><a href="{{url('/admin/sms')}}">Text</a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
            {{--<ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="./">Default <span class="sr-only">(current)</span></a></li>
                <li><a href="../navbar-static-top/">Static top</a></li>
                <li><a href="../navbar-fixed-top/">Fixed top</a></li>
            </ul>--}}
        </div>
        <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
</nav>