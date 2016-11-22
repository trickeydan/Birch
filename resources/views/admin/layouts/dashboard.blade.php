<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title') | {{config('site.title')}}</title>
        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">

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
                <div class="navbar-header"><a class="navbar-brand navbar-link" href="{{route('admin.dashboard')}}">{{config('site.title')}}</a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                    @include('admin.layouts.menu')
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="page-header">
                <h1>@yield('title')<small> @yield('description')</small></h1>
                <ol class="breadcrumb">
                    {!!\Birch\Managers\BreadcrumbManager::getHtml(\Request::route()->getName(),'',true)!!}
                </ol>
            </div>


            @yield('content')
        </div>

        <script src="/js/app.js"></script>

    </body>
</html>

