<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- General CSS Files -->
        <link rel="stylesheet" href="{{ asset('backend/assets/modules/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/modules/fontawesome/css/all.min.css') }}">

        <!-- CSS Libraries -->
        <link rel="stylesheet" href="{{ asset('backend/assets/modules/jqvmap/dist/jqvmap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/modules/weather-icon/css/weather-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/modules/weather-icon/css/weather-icons-wind.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/modules/summernote/summernote-bs4.css') }}">

        <!-- Template CSS -->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/css/components.css') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
{{--    @include('layouts.navigation')--}}
    @yield('content');

        <!-- General JS Scripts -->
        <script src="{{ asset('backend/assets/modules/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/assets/modules/popper.js') }}"></script>
        <script src="{{ asset('backend/assets/modules/tooltip.js') }}"></script>
        <script src="{{ asset('backend/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('backend/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
        <script src="{{ asset('backend/assets/modules/moment.min.js') }}"></script>
        <script src="{{ asset('backend/assets/js/stisla.js') }}"></script>

        <!-- JS Libraies -->
        <script src="{{ asset('backend/assets/modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
        <script src="{{ asset('backend/assets/modules/chart.min.js') }}"></script>
        <script src="{{ asset('backend/assets/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('backend/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
        <script src="{{ asset('backend/assets/modules/summernote/summernote-bs4.js') }}"></script>
        <script src="{{ asset('backend/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

        <!-- Page Specific JS File -->
        <script src="{{ asset('backend/assets/js/page/index-0.js') }}"></script>

        <!-- Template JS File -->
        <script src="{{ asset('backend/assets/js/scripts.js') }}"></script>
        <script src="{{ asset('backend/assets/js/custom.js') }}"></script>
    </body>
</html>
