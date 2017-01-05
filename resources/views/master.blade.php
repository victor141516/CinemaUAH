<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link href="{{ url('favicon/favicon.ico') }}" rel="icon" type="image/x-icon" />

    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <style type="text/css" media="screen">
        body {
            padding-top: 70px;
        }
        a {
            color: #424242;
        }
        .film {
            min-height: 340px;
        }

        /* Add/Edit film */
        #holder {
            border: 10px dashed #ccc;
            width: 300px;
            min-height: 400px;
            margin: 20px auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        #holder.hover {
            border: 10px dashed #0c0;
        }
        #holder img {
            display: block; margin: 10px auto;
        }
        #holder p {
            margin: 10px; font-size: 14px;
        }
        .fail {
            background: #c00; padding: 2px; color: #fff;
        }
    </style>
    @yield('extra-css')
</head>
<body>
    @yield('navbar')
    <div class="container">
        @yield('content')
    </div>

    <script type="text/javascript" src="/js/app.js"></script>
    @if ( Config::get('app.debug') )
        <script type="text/javascript">
            document.write('<script src="//localhost:35729/livereload.js?snipver=1" type="text/javascript"><\/script>')
        </script>
    @endif
    @yield('extra-js')
</body>
</html>
