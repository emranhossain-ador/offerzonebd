<!DOCTYPE html>
<html lang="en" class="dark scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">

    <title>{{ $title ?? config('app.name') }}</title>

    @include('backend.partials.header')

    @vite(['resources/css/admin.css', 'resources/js/admin.js'])

    @livewireStyles

</head>

<body class="flex h-screen overflow-hidden relative no-scrollbar" x-data="{ sidebarToggle: false }">

    @include('backend.layouts.sidebar')
    <!-- ===== Content Area Start ===== -->
    <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto scrollbar-none">

        @include('backend.layouts.top-header')

        <!-- ===== Main Content Start ===== -->
        <main>
            <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6 space-y-6 md:space-y-10 relative">
                @yield('content')
            </div>
        </main>
        <!-- ===== Main Content End ===== -->

    </div>
    <!-- ===== Content Area End ===== -->

    @include('backend.partials.footer')


    @livewireScriptConfig

    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>

</body>

</html>
