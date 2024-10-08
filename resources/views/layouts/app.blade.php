<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts and Styles -->
        <!-- <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"> -->

        @vite(['resources/css/app.css', 'resources/js/app.js', 'node_modules/bootstrap/dist/js/bootstrap.bundle.js'])

    </head>
    <body>
        <div id="app" class="">
            <main class="py-10">
                @yield('content')
            </main>
        </div>

    </body>
</html>
