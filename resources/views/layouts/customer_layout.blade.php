<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ config('app.name', 'MyWebsite') }} - @yield('title')</title>

    <!-- Global Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&amp;display=swap"
        rel="stylesheet">

    <!-- Global Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Page Styles -->
    @stack('styles')

    <!-- Global Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Page Scripts -->
    @yield('header-scripts')
</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            @include('layouts.parts.header_base')

            <div class="content-wrapper container">
                @yield('content')

                @include('layouts.parts.footer')
            </div>
        </div>
    </div>
    <!-- Global Scripts -->
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- page Scripts -->
    @stack('scripts')
</body>

</html>
