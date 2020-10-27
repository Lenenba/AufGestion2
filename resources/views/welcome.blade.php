<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/css/main.css">
    </head>
    <body>
        <header class="bg-white px-6 py-2 mx-5">
            @include("partials._nav")
        </header>
        <main class="bg-gray-100">
            @yield('content')
        </main>
        <footer>
        </footer>
    </body>
</html>
