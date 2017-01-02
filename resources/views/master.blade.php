<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no" />
    @yield('meta')

    <title>@yield('title')</title>

    <link href="{{ url('favicon/favicon.ico') }}" rel="icon" type="image/x-icon" />

    <style type="text/css" media="screen">
        body {
            padding-top: 70px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}">
    @yield('extra-css')
</head>
<body>
    @yield('navbar')
    <div class="container">
        @yield('content')
    </div>

    <script type="text/javascript" src="{{ url('js/jquery-3.1.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
    @yield('extra-js')
</body>
</html>
