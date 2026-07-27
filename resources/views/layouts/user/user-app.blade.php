<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="scroll-smooth {{ ($_COOKIE['dark_mode'] ?? 'true') === 'true' ? 'dark' : '' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">

    <!-- Remix icons -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/remixicon.css') }}">

    <title>{{ $title ?? config('app.name') }}</title>

    <!-- jQuery -->
    <script type="text/javascript" src="{{ asset('assets/js/jquery.main.js') }}"></script>

    @vite(['resources/css/frontend.css', 'resources/js/frontend.js'])

    @livewireStyles
</head>

<body class="relative scrollbar-thin scrollbar-thumb-primary scrollbar-track-primary/10 bg-secondary ">
    <div x-data="{ openSidebar: false }" class="relative min-h-screen overflow-hidden">
        @include('layouts.user.user-top-menu')
        @include('layouts.user.user-sidebar')

        {{ $slot }}

        @include('layouts.user.user-bottom-menu')
    </div>


    <livewire:message />

    @livewireScriptConfig

</body>

</html>
