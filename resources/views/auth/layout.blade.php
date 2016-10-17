<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title') | {{ config('site.title','Birch') }}</title>
        <link href="/css/login.css" rel="stylesheet">
    </head>

    <body>
        <div class="login-clean">
                <div class="illustration"><i class="fa fa-tree"></i></div>
                @yield('content')
        </div>
        <script src="/js/app.js"></script>
    </body>

</html>