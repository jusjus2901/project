<!-- resources/views/layouts/dashB.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts and Styles -->
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Bootstrap CSS (optional) -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            {{-- Upper Navbar --}}
           {{-- <nav class="navbar navbar-expand-md navbar-light bg-success shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('img/logo.png') }}" alt="{{ config('app.name', 'Laravel') }}" class="navbar-brand-img">
                        <span>{{ config('app.name', 'Laravel') }}</span>
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
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}">{{ __('Logout') }}</a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
            </nav> --}}

            {{-- Left Sidebar --}}
            <div class="container-fluid">
                <div class="row">
                    <nav id="sidebar" class="col-md-2 d-none d-md-block sidebar vh-100" style="background: #212832">
                        <div class="position-sticky">
                            <div class="sidebar-sticky" style="">
                                <h5 class="sidebar-heading text-white" style="vertical-align: middle; padding-top: 30px; padding-bottom: 30px" href="{{ url('/dashboard') }}">
                                    <img src="{{ asset('img/flash 1.png') }}" alt="" class="me-2" style="width: 13px; height: 17px;">
                                    Electric Cooperative System
                                </h5>
                                <ul class="nav flex-column">
                                    <li class="nav-item" style="margin-top: 10px; margin-bottom: 10px;">
                                        <a class="nav-link d-flex align-items-center text-white" href="{{ url('/dashboard') }}">
                                            <img src="{{ asset('img/dashboard-icon.png') }}" alt="Dashboard" class="me-1" style="width: 25px; height: 25px;">
                                            Dashboard
                                        </a>
                                    </li>
                                    <li class="nav-item" style="margin-top: 10px; margin-bottom: 10px;">
                                        <a class="nav-link d-flex align-items-center text-white" href="{{ url('/users') }}">
                                            <img src="{{ asset('img/users-icon.png') }}" alt="Users" class="me-2" style="width: 20px; height: 20px;">
                                            Users
                                        </a>
                                    </li>
                                    <li class="nav-item" style="margin-top: 10px; margin-bottom: 10px;">
                                        <a class="nav-link d-flex align-items-center text-white" href="{{ url('/tickets') }}">
                                            <img src="{{ asset('img/tickets-icon.png') }}" alt="Tickets" class="me-2" style="width: 20px; height: 20px;">
                                            Tickets
                                        </a>
                                    </li>
                                    <li class="nav-item" style="margin-top: 10px; margin-bottom: 10px;">
                                        <a class="nav-link d-flex align-items-center text-white" href="{{ url('/reports') }}">
                                            <img src="{{ asset('img/reports-icon.png') }}" alt="Reports" class="me-2" style="width: 20px; height: 20px;">
                                            Reports
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>


                    {{-- Main Content --}}
                    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS (optional) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
