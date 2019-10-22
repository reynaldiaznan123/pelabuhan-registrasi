<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/css/bootstrap.min.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('vendors/material-icons.min.css') }}" crossorigin="anonymous">
    @stack('library-styles')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @stack('styles')
</head>
<body>
    <div class="app">
        @includeIf('layouts.wrapper')
    </div>

    <script src="{{ asset('vendors/jquery/jquery.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('vendors/popper.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('vendors/bootstrap/js/bootstrap.min.js') }}" crossorigin="anonymous"></script>
    @stack('library-scripts')
    <script src="{{ mix('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
