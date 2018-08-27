<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        @include('admin.includes.head') {{-- Load head element --}}
    <meta name="description" content="Riztafi Laundry">
    <meta name="keywords" content="" />
    <meta name="author" content="Asvicode.com">
    <meta name="robots" content="noindex, nofollow"> {{-- Hide web in search engine --}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login {{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/waves.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">    
</head>
<body  themebg-pattern="theme1">
    @include('admin.common.preload') {{-- Load preload loading pages element --}}
        @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/waves.min.js') }}"></script>
    <script src="{{ asset('backend/js/modernizr.js') }}"></script>
    <script src="{{ asset('backend/js/common-pages.js') }}"></script>
</body>
</html>
