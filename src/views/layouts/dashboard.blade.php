<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title') | {{config('birch.site_title')}}</title>
        <!-- Styles -->
        <link href="/css/dashboard.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                    'csrfToken' => csrf_token(),
            ]); ?>
        </script>

    </head>

    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand navbar-link" href="{{route('admin.dashboard')}}">{{config('birch.site_title')}}</a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                    @include('birch::layouts.menu')
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="page-header">
                <h1>@yield('title')<small> @yield('description')</small></h1>
                <ol class="breadcrumb">
                    {!!\Trickeydan\Birchcms\Managers\BreadcrumbManager::getHtml(\Request::route()->getName(),'',true)!!}
                </ol>
            </div>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')


        </div>

        <footer class="footer">
            <div class="container">
                Powered By <a href="https://birchcms.com">BirchCMS</a> {{config('birch.version')}}
            </div>
        </footer>

        <script src="/js/app.js"></script>

    </body>
</html>

