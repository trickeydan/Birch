<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title') | {{ config('site.title','Birch') }}</title>
        <link href="{{asset('css/login.css')}}" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>

    <body>
        <div class="login-clean">
                <div class="illustration"><i class="fa fa-tree"></i></div>
                <h2 class="text-center">{{config('site.title')}}</h2>
                <h3 class="text-center">@yield('title')</h3>
                @yield('content')
        </div>
        <script src="{{asset('js/app.js')}}"></script>
    </body>

</html>