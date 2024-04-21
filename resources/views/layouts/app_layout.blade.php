<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Global Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Global Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&amp;display=swap"
        rel="stylesheet">

    <!-- Global Styles -->
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app-dark.css') }}">

    <!-- Page Styles -->
    @stack('styles')
    @livewireStyles()
</head>

<body>
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
    <div id="app">
        @include('parts.sidebar')

        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                @include('parts.navbar')
            </header>
            <div id="main-content">

                @yield('content')

                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>{{ now()->year }} &copy; {{ config('app.name') }}</p>
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
    <script src="{{ asset('assets/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/compiled/js/app.js') }}"></script>

    <!-- page Scripts -->
    @stack('scripts')
    @livewireScripts()
</body>

</html>
