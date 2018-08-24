<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        @include('includes.head') {{-- Load head element --}}
    <meta name="description" content="Riztafi Laundry">
    <meta name="keywords" content="" />
    <meta name="author" content="Asvicode.com">
    <meta name="robots" content="noindex, nofollow"> {{-- Hide web in search engine --}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @if(View::hasSection('title_web'))
            @yield('title_web') - Riztafi Laundry
        @else
            Riztafi Laundry
        @endif        
    </title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">

    <!-- Styles -->
    @include('includes.admin.css') {{-- Load css element --}} 
    <link href="{{ asset('backend/css/custom.css') }}" rel="stylesheet">
    @yield('css')
    
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    @include('common.preload') {{-- Load preload loading pages element --}}

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            @include('includes.admin.header') {{-- Load header element --}}

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    @include('includes.admin.sidebar') {{-- Load sidebar menu element --}}
                    <div class="pcoded-content">
                        @include('includes.admin.headerPage') {{-- Load header element --}}
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                       @yield('content')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- Scripts -->
    @include('includes.admin.js') {{-- Load css element --}}
	@yield('scripts')
	@stack('scripts')
</body>
</html>
