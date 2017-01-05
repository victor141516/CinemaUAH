<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link href="{{ url('favicon/favicon.ico') }}" rel="icon" type="image/x-icon" />

    <style type="text/css" media="screen">
        body {
            padding-top: 70px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    @yield('extra-css')
</head>
<body>
    @yield('navbar')
    <div class="container">
        @yield('content')
    </div>

    <script type="text/javascript" src="/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    @if ( Config::get('app.debug') )
        <script type="text/javascript">
            document.write('<script src="//localhost:35729/livereload.js?snipver=1" type="text/javascript"><\/script>')
        </script>
    @endif
    @yield('extra-js')
</body>
</html>
