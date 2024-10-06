<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fav icon -->
    <link rel="icon" href="{{ asset('images/logos/logo.svg') }}" type="image/x-icon"/>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/frontend.css','resources/js/frontend.js',])

    @stack('styles')
</head>
<body class="font-sans antialiased overflow-x-hidden lg:overflow-x-hidden">
<x-frontend.header></x-frontend.header>

<div class="h-screen">
    @yield('content')
</div>

<x-frontend.footer></x-frontend.footer>

<!-- Jquery -->
<script src="{{ asset('js/jquery-3.7.1.min.js' )}}"></script>

<!-- Scripts -->
@stack('scripts')
</body>
</html>
