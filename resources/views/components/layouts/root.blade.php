<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('dist/webfont/tabler-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('js/chart.js/Chart.css') }}">
    @livewireStyles
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <title>{{ $title ?? 'HYDRONET' }}</title>
</head>

<body class="bg-dark">


    <nav class="navbar navbar-expand-md navbar-dark sticky-top bg-success shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Hydr<span class="ti ti-plant-2 text-dark"></span>net
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                @auth
                <ul class="navbar-nav me-auto">
                    <li><a class="nav-link" href="{{ route('home') }}">Dashboard</a></li>
                    <li><a class="nav-link" href="{{ route('hydrophonics') }}">Hydrophonics</a></li>
                    <li><a class="nav-link" href="{{ route('types') }}">Types</a></li>

                </ul>
                @endauth
               

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
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
    <main class="py-5">
        <div class="container  ">
            {{ $slot }}

        </div>
    </main>

    <nav class="navbar sticky-bottom navbar-dark  bg-success">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <a class="navbar-brand" href="#">Hydr<span class="ti ti-plant-2 text-dark"></span>net</a>
                <a class="navbar-brand" href="#">MicroMek</a>
                <a class="navbar-brand text-dark " href="#">Techlink360</a>
        
            </div>
            

        </div>
    </nav>



    @livewireScripts
    <x-livewire-alert::scripts />
    <script src="{{ asset('js/sweetalert2@11.min.js') }}"></script>
    @stack('scripts')

</body>

</html>
