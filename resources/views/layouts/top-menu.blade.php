<header class="relative lg:fixed left-0 w-full top-0 z-50 glass backdrop-blur-lg">
    <div x-data="{ open: false }"
        class="mx-auto flex max-w-7xl items-center justify-between gap-2 px-4 py-1 sm:px-5 sm:py-2">

        <a class="flex items-center gap-2 group" href="{{ route('home') }}" wire:navigate>
            <img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="w-11 h-11 object-contain">
            <span class="font-display text-lg font-bold sm:text-xl font-heading">
                <span class="gradient-text hidden md:block">OfferZone</span>
            </span>
        </a>

        <nav class="hidden md:flex items-center gap-1">
            <a href="{{ route('home') }}"
                class="p-1.5 text-sm font-semibold transition-colors font-sans {{ request()->routeIs('home') ? 'text-primary' : 'hover:text-primary text-muted-foreground' }}"
                data-status="active" aria-current="page" wire:navigate>Home</a>

            <a href="{{ route('aboutus') }}"
                class="p-1.5 text-sm font-semibold text-muted-foreground transition-colors hover:text-primary font-sans {{ request()->routeIs('aboutus') ? 'text-primary' : 'hover:text-primary text-muted-foreground' }}"
                wire:navigate>About Us</a>

            <a href="{{ route('privacy-policy') }}"
                class="p-1.5 text-sm font-semibold text-muted-foreground transition-colors hover:text-primary font-sans {{ request()->routeIs('privacy-policy') ? 'text-primary' : 'hover:text-primary text-muted-foreground' }}"
                wire:navigate>Privacy Policy</a>

            <a href="{{ route('refund-policy') }}"
                class="p-1.5 text-sm font-semibold text-muted-foreground transition-colors hover:text-primary font-sans {{ request()->routeIs('refund-policy') ? 'text-primary' : 'hover:text-primary text-muted-foreground' }}"
                wire:navigate>Refund Policy</a>

        </nav>

        <div class="flex items-center gap-2">

            @if (auth()->check())
                @if (auth()->user()->role == 'admin')
                    <a href="{{ route('admin.dashboard') }}"
                        class="group hidden md:flex items-center justify-center gap-2 overflow-hidden rounded-xl gradient-bg px-4 py-2 text-sm font-bold text-primary-foreground transition-all relative"
                        wire:navigate>
                        <span
                            class="absolute inset-0 -translate-x-full bg-linear-to-r from-transparent via-white/30 to-transparent transition-transform duration-700 group-hover:translate-x-full"></span>
                        <i class="fa-solid fa-arrow-right-to-bracket"></i> Login
                    </a>
                @else
                    <a href="{{ route('user.home', 'emran') }}"
                        class="group hidden md:flex items-center justify-center gap-2 overflow-hidden rounded-xl gradient-bg px-4 py-2 text-sm font-bold text-primary-foreground transition-all relative"
                        wire:navigate>
                        <span
                            class="absolute inset-0 -translate-x-full bg-linear-to-r from-transparent via-white/30 to-transparent transition-transform duration-700 group-hover:translate-x-full"></span>
                        <i class="fa-solid fa-arrow-right-to-bracket"></i> Login
                    </a>
                @endif
            @else
                <a href="{{ route('login') }}"
                    class="group hidden md:flex items-center justify-center gap-2 overflow-hidden rounded-xl gradient-bg px-4 py-2 text-sm font-bold text-primary-foreground transition-all relative"
                    wire:navigate>
                    <span
                        class="absolute inset-0 -translate-x-full bg-linear-to-r from-transparent via-white/30 to-transparent transition-transform duration-700 group-hover:translate-x-full"></span>
                    <i class="fa-solid fa-arrow-right-to-bracket"></i> Login
                </a>
            @endif


            <button type="button" @click=" open = ! open "
                class="md:hidden w-10 h-10 shrink-0 rounded-md border border-border bg-card transition-colors hover:bg-secondary cursor-pointer flex items-center justify-center">
                <i class="ri-menu-line text-xl text-muted-foreground"></i>
            </button>

            <!-- Theme Toggle -->
            <div x-data="{ dark: false }" x-init="dark = localStorage.getItem('theme') === 'dark';
            document.documentElement.classList.toggle('dark', dark)">
                <button
                    @click="dark = !dark;
                    localStorage.setItem('theme', dark ? 'dark' : 'light');
                    document.documentElement.classList.toggle('dark', dark)"
                    class="grid h-10 w-10 place-items-center rounded-full border border-border bg-card transition-colors hover:bg-secondary cursor-pointer">
                    <!-- Moon icon for light mode -->
                    <i x-show="!dark" x-cloak class="ri-moon-line text-lg"></i>
                    <!-- Sun icon for dark mode -->
                    <i x-show="dark" x-cloak class="ri-sun-line text-orange-400 text-lg"></i>
                </button>
            </div>

        </div>

        <!-- Only For Mobile -->
        <nav x-show="open" x-collapse.duration.500ms
            class="flex md:hidden flex-col items-start gap-1.5 absolute left-0 top-[53px] w-full bg-card backdrop-blur-lg p-4  md:relative">
            <a href="{{ route('home') }}"
                class="p-1.5 text-sm font-semibold transition-colors font-sans {{ request()->routeIs('home') ? 'text-primary' : 'hover:text-primary text-muted-foreground' }}"
                data-status="active" aria-current="page" wire:navigate>Home</a>

            <a href="{{ route('aboutus') }}"
                class="p-1.5 text-sm font-semibold text-muted-foreground transition-colors hover:text-primary font-sans {{ request()->routeIs('aboutus') ? 'text-primary' : 'hover:text-primary text-muted-foreground' }}"
                wire:navigate>About Us</a>

            <a href="{{ route('privacy-policy') }}"
                class="p-1.5 text-sm font-semibold text-muted-foreground transition-colors hover:text-primary font-sans {{ request()->routeIs('privacy-policy') ? 'text-primary' : 'hover:text-primary text-muted-foreground' }}"
                wire:navigate>Privacy Policy</a>

            <a href="{{ route('refund-policy') }}"
                class="p-1.5 text-sm font-semibold text-muted-foreground transition-colors hover:text-primary font-sans {{ request()->routeIs('refund-policy') ? 'text-primary' : 'hover:text-primary text-muted-foreground' }}"
                wire:navigate>Refund Policy</a>

            <!-- Login Btn -->
            <div class="mt-3 md:hidden w-full">
                <a href="{{ route('login') }}"
                    class="group md:hidden flex w-full items-center justify-center gap-2 overflow-hidden rounded-xl gradient-bg px-4 py-3 text-sm font-bold text-primary-foreground transition-all relative"
                    wire:navigate>
                    <span
                        class="absolute inset-0 -translate-x-full bg-linear-to-r from-transparent via-white/30 to-transparent transition-transform duration-700 group-hover:translate-x-full"></span>
                    <i class="fa-solid fa-arrow-right-to-bracket"></i> Login
                </a>
            </div>
        </nav>

    </div>

</header>
