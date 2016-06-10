<!DOCTYPE html>
<html>
<!-- Website created by DJ Rausch -->
<head>
    @yield('head_extras')

            <!-- Standard Meta -->
    <link href="{{asset('/img/favicon.ico')}}" rel="icon" type="image/x-icon" />
    <meta name="theme-color" content="#4a3867">
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta property="og:image" content="{{url('/img/hero_index.jpg')}}"/>

    <!-- Site Properities -->
    <title>Katie & DJ</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">


    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                        (i[r].q = i[r].q || []).push(arguments)
                    }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-61128908-1', 'auto');
        ga('send', 'pageview');

    </script>
    <style type="text/css">
        body {
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .navbar {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
<div class="container">
{{--
    @if(Auth::user() != null && Auth::user()->admin)
--}}
        @include('partials.header')
        @include('partials.navbar')
{{--
    @endif
--}}
    @include('flash::message')
    @yield('content')
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

@yield('script_extras')
</body>
</html>
