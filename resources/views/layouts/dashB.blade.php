<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts and Styles -->
    <!-- <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"> -->

    @vite(['resources/css/app.css', 'resources/js/app.js', 'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js'])

</head>

<body>
    <div id="app">

        {{-- Left Sidebar --}}
        <div class="container-fluid">
            <div class="row flex-nowrap" style="overflow: hidden;">
                <nav id="sidebar" class="col-md-2 col-lg-2 d-none d-md-block sidebar vh-90 position-sticky"
                    style="background: #212832; width: 305px; max-height: 100vh; min-height: 100vh; overflow: hidden;">
                    <div class="sidebar-sticky">
                        <div class="tw-flex tw-items-center tw-justify-center tw-py-2 tw-pt-6 tw-pb-10">
                            <img src="{{ asset('img/flash 1.png') }}" alt="logo" class="tw-w-9 tw-h-9">
                                <h5 class="sidebar-heading text-white text-center tw-mt-3 tw-font-semibold tw-text-1xl">
                                    Electric Cooperative <span style="display: block; text-align: center;">System</span>
                                </h5>
                        </div>
                        <ul class="nav flex-column">
                            @if (Auth::user()->role === 'admin')
                                <li class="nav-item" style="margin-top: 15px; margin-bottom: 15px; font-size: 17px">
                                    <a class="nav-link d-flex align-items-center text-white rounded"
                                        style="{{ Request::is('dashboard') ? 'background-color: #161A20;' : 'background-color: #212832;' }}"
                                        href="{{ url('/dashboard') }}">
                                        <img src="{{ asset('img/dashboard-icon.png') }}" alt="Dashboard" class="me-1"
                                            style="width: 20px; height: 20px;">
                                        Dashboard
                                    </a>
                                </li>
                                <li class="nav-item" style="margin-top: 10px; margin-bottom: 10px; font-size: 15px">
                                    <a class="nav-link d-flex align-items-center text-white rounded"
                                        style="{{ Request::is('users') ? 'background-color: #161A20;' : 'background-color: #212832;' }}"
                                        href="{{ url('/users') }}">
                                        <img src="{{ asset('img/users-icon.png') }}" alt="Users" class="me-2"
                                            style="width: 20px; height: 20px;">
                                        Users
                                    </a>
                                </li>
                                <li class="nav-item" style="margin-top: 10px; margin-bottom: 10px; font-size: 15px">
                                    <a class="nav-link d-flex align-items-center text-white rounded"
                                        style="{{ Request::is('reports') ? 'background-color: #161A20;' : 'background-color: #212832;' }}"
                                        href="{{ url('/reports') }}">
                                        <img src="{{ asset('img/reports-icon.png') }}" alt="Reports" class="me-2"
                                            style="width: 20px; height: 20px;">
                                        Reports
                                    </a>
                                </li>
                                <li class="nav-item" style="margin-top: 10px; margin-bottom: 10px; font-size: 15px">
                                    <a class="nav-link d-flex align-items-center text-white rounded"
                                        style="{{ Request::is('admin/tickets') ? 'background-color: #161A20;' : 'background-color: #212832;' }}"
                                        href="{{ url('/admin/tickets') }}">
                                        <img src="{{ asset('img/tickets-icon.png') }}" alt="Tickets" class="me-2"
                                            style="width: 20px; height: 20px;">
                                        Tickets
                                    </a>
                                </li>
                            @endif

                            @if (Auth::user()->role === 'lineman')
                                <li class="nav-item" style="margin-top: 10px; margin-bottom: 10px; font-size: 15px">
                                    <a class="nav-link d-flex align-items-center text-white rounded"
                                        style="{{ Request::is('tickets') ? 'background-color: #161A20;' : 'background-color: #212832;' }}"
                                        href="{{ url('/tickets') }}">
                                        <img src="{{ asset('img/tickets-icon.png') }}" alt="Tickets" class="me-2"
                                            style="width: 20px; height: 20px;">
                                        Tickets
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </nav>

                {{-- Main Content --}}
                <main class="col-md-8 col-lg-10 flex-grow position-relative d-block p-0">
                    @yield('header-nav')
                    <div class="px-md-5 py-4">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
    </div>

    @yield('scripts')
</body>

</html>
