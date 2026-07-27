<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth ">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/fontawesome/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/fontawesome/fontawesome.min.css') }}">

        <!-- Remix icons -->
        <link rel="stylesheet" href="{{ asset('assets/fonts/remixicon.css') }}">

        <title>{{ $title ?? config('app.name') }}</title>

        <!-- jQuery -->
        <script type="text/javascript" src="{{ asset('assets/js/jquery.main.js') }}"></script>

        @vite(['resources/css/frontend.css', 'resources/js/frontend.js'])

        @livewireStyles
    </head>
    <body class="relative scrollbar-thin scrollbar-thumb-primary scrollbar-track-primary/10">
        <div class="relative min-h-screen overflow-hidden">
            <!-- Style shape -->
            <div class="pointer-events-none fixed inset-0 -z-10">
                <div class="absolute -top-40 -left-40 h-120 w-120 rounded-full bg-primary/20 blur-3xl animate-blob"></div>
                <div class="absolute top-1/3 -right-40 h-130 w-130 rounded-full bg-accent/20 blur-3xl animate-blob [animation-delay:-4s]"></div>
                <div class="absolute bottom-0 left-1/3 h-105 w-105 rounded-full bg-primary-glow/20 blur-3xl animate-blob [animation-delay:-8s]"></div>
                <div class="absolute inset-0 grid-bg opacity-40"></div>
            </div>
            <!-- Style shape -->

            @include('layouts.top-menu')

            {{ $slot }}

        </div>


        <livewire:message />

        @livewireScriptConfig
    </body>
</html>
