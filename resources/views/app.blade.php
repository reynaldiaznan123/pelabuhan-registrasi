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
    <style>
        .app-side-drawer--heading {
            padding: 0 22px;
            margin-top: 18px;
        }
        .sidebar-left {
            width: 30%
        }
        .sidebar-left > .sidebar-img {
            width: 100%;
            border-radius: 100%;
            padding: 2px;
            border: 2px solid #f2f2f2;
        }
        .sidebar-right {
            width: 70%;
            padding: 8px 12px 0 12px;
        }
        .sidebar-right > .sidebar-name,
        .sidebar-right > .sidebar-email,
        .sidebar-right > .sidebar-status {
            color: #f2f2f2;
            font-size: 15px;
            font-weight: 600;
        }

        .sidebar-right > .sidebar-email {
            font-size: 13px;
        }
    </style>
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
