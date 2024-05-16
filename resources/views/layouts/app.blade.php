<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" id="appNavbar">
            <div class="container-fluid">

                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="https://cdn.thingiverse.com/assets/fb/a1/f1/49/6d/oof.gif" height="24">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/hotel_booking') }}">{{ __('Hotel Booking') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/zoo_booking') }}">{{ __('Zoo Booking') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/attractions') }}">{{ __('Attractions & Facilities') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/about_us') }}">{{ __('About Us') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/contact_us') }}">{{ __('Contact Us') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/accessibility') }}">{{ __('Accessibility') }}</a>
                        </li>
                        <!-- Authentication Links -->
                        @guest

                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end bg-white" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/my_account') }}">
                                    {{ __('My Account') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" id="mainContent" style="min-height: 80vh;">
            @yield('content')
        </main>

        <div class="appFooterColor" style="bottom: 0; width: 100%;">
            <div class="container">
                <footer class="py-3">
                    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                        <li class="nav-item"><a href="{{ url('/home') }}" class="nav-link px-2 text-muted">Home</a></li>
                        <li class="nav-item"><a href="{{ url('/about_us') }}" class="nav-link px-2 text-muted">About Us</a></li>
                    </ul>
                    <p class="text-center text-muted">© 2024 Callum Sims</p>
                </footer>
            </div>
        </div>

    </div>
</body>

</html>