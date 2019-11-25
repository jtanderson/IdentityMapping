<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta http-eqiuv="Content-Security-Policy" content="default-src *  data: blob: 'unsafe-inline' 'unsafe-eval';">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Identity Mapping') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">  
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            @yield('content')
        </div>

        <!-- Scripts -->
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        @yield('javascript')
    </body>
</html>
