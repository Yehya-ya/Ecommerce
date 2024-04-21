<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ config('app.name', 'MyWebsite') }} - @yield('title')</title>

    <!-- Global Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Page Scripts -->
    @yield('header-scripts')

    <!-- Global Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&amp;display=swap"
        rel="stylesheet">
    <!-- Page Fonts -->
    @yield('fonts')

    <!-- Global Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/x-icon">


    <!-- Page Styles -->
    @stack('styles')
</head>

<body>
    <div id="app">
        @include('parts.sidebar')

        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                @include('parts.navbar')
                @yield('header')
            </header>
            <div id="main-content">

                @yield('content')

                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>{{ now()->year }} &copy; {{ config('app.name', 'MyWebsite') }}</p>
                        </div>
                        <div class="float-end">
                            <div class="d-none d-sm-inline">
                                Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span>
                            </div>
                            by <a href="https://www.linkedin.com/in/yehya-yasser">Yehya Yasser</a>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <!-- Global Scripts -->
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- page Scripts -->
    @stack('scripts')
</body>

</html>
