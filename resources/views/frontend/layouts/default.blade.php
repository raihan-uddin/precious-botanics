<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

        <!-- Fav icon -->
        <link rel="icon" href="{{ asset('images/logos/logo.svg') }}" type="image/x-icon" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js',]) 

        <!-- // 'resources/css/frontend.css', 'resources/js/frontend.js' -->


        @stack('styles')
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <div id="page">
                <x-frontend.header></x-frontend.header>
                <div class="mt-8 sm:mt-8 md:mt-8 lg:mt-14 xl:mt-14 2xl:mt-14">
                        @yield('content')
                    </div>

                    <x-frontend.footer></x-frontend.footer>
                </div>
            </div>
        </div>
        <!-- Scripts -->
        @stack('scripts')
    </body>
</html>
