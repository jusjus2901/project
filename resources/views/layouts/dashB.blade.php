<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts and Styles -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <!-- Bootstrap CSS (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">

        {{-- Left Sidebar --}}
        <div class="container-fluid">
            <div class="row flex-nowrap" style="overflow: hidden;">
                <nav id="sidebar" class="col-md-3 col-lg-2 d-none d-md-block sidebar vh-100 position-sticky" style="background: #212832; width: 250px; max-height: 100vh; min-height: 100vh; overflow: hidden;">
                    <div class="sidebar-sticky">
                        <h5 class="sidebar-heading text-white text-center" style="padding-top: 30px; padding-bottom: 30px; font-size: 18px">
                            <img src="{{ asset('img/flash 1.png') }}" alt="" class="me-1" style="width: 20px; height: 20px;">
                            Electric Cooperative <span style="display: block; text-align: center;">System</span>
                        </h5>
                        <ul class="nav flex-column">
                            <li class="nav-item" style="margin-top: 10px; margin-bottom: 10px; font-size: 15px">
                                <a class="nav-link d-flex align-items-center text-white" href="{{ url('/dashboard') }}">
                                    <img src="{{ asset('img/dashboard-icon.png') }}" alt="Dashboard" class="me-1" style="width: 20px; height: 20px;">
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item" style="margin-top: 10px; margin-bottom: 10px; font-size: 15px">
                                <a class="nav-link d-flex align-items-center text-white" href="{{ url('/users') }}">
                                    <img src="{{ asset('img/users-icon.png') }}" alt="Users" class="me-2" style="width: 20px; height: 20px;">
                                    Users
                                </a>
                            </li>
                            <li class="nav-item" style="margin-top: 10px; margin-bottom: 10px; font-size: 15px">
                                <a class="nav-link d-flex align-items-center text-white" href="{{ url('/tickets') }}">
                                    <img src="{{ asset('img/tickets-icon.png') }}" alt="Tickets" class="me-2" style="width: 20px; height: 20px;">
                                    Tickets
                                </a>
                            </li>
                            <li class="nav-item" style="margin-top: 10px; margin-bottom: 10px; font-size: 15px">
                                <a class="nav-link d-flex align-items-center text-white" href="{{ url('/reports') }}">
                                    <img src="{{ asset('img/reports-icon.png') }}" alt="Reports" class="me-2" style="width: 20px; height: 20px;">
                                    Reports
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                {{-- Main Content --}}
                <main class="col-md-9 col-lg-10 flex-grow position-relative d-block p-0">
                    @yield('header-nav')
                    <div class="px-md-4 py-4">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
