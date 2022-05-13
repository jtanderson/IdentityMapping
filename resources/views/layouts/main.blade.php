<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-eqiuv="Content-Security-Policy" content="default-src *  data: blob: 'unsafe-inline' 'unsafe-eval';">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="">


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CIRCLES | Salisbury University</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        @yield('css')

    </style>
</head>
<body>

    <div class="progress" style="margin-bottom: 30px;">
        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $progress }}%;">
            <span class="sr-only">{{ $progress }}% Complete</span>
        </div>
    </div>

    <div id="app" class="container">

        @yield('content')

        <br><br>
        <div class="row">
            <div class="col-sm-4">
                <div class="text text-left">
                    @if ($prevURL != '')
                    <h4><a href="{{ $prevURL }}">&larr;&nbsp; Previous</a></h4>
                    @endif
                </div>
            </div>
            <div class="col-sm-4">
                <div class="text text-center">
                    @if ($progress > 0 && $progress < 100) <a class="btn btn-danger" name="button-1" value="button-1" href="/abort">Abort</a>
                        @endif
                </div>
            </div>
            <div class="col-sm-4">
                <div class="text text-right">
                    @if ($nextURL !== '')
                    <h4><a href="{{ $nextURL }}">Next &rarr;</a></h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <br><br>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>
    @yield('javascript')
</body>
</html>
