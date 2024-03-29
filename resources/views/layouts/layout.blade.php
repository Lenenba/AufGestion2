<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        <link rel="icon" href="{{ url('/images/logo.png') }}">

        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    </head>
    <body>
        <div id="app">
            <header class="bg-white px-6 py-2 mx-5">
                @include("partials._nav")
            </header>
            <div class="section">
                <main class="bg-gray-100 px-8 py-4 ">
                    @yield('content')
                </main>
            </div>
            <footer>
            <main class="bg-gray-100 px-8 py-4 h-64">
                    @yield('footer')
                </main>
            </footer>
        </div>
    </body>
</html>
