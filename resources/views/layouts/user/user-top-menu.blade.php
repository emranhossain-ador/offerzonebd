<header class="w-full sticky top-0 z-30 border-b border-border bg-background/70 backdrop-blur-xl">
    <div
        class="w-full md:max-w-115 lg:max-w-140 mx-auto grid grid-cols-[auto_1fr_auto_auto] items-center gap-2 px-4 py-3 ">

        <button @click.prevent.stop=" openSidebar = !openSidebar "
            class="grid h-10 w-10 place-items-center rounded-xl border border-border bg-surface/60 text-foreground/80 transition hover:text-foreground hover:scale-105 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-menu h-5 w-5" aria-hidden="true">
                <path d="M4 5h16"></path>
                <path d="M4 12h16"></path>
                <path d="M4 19h16"></path>
            </svg>
        </button>

        <a class="flex min-w-0 items-center justify-center gap-2 active"
            href="{{ route('user.home', ['username' => _auth()->username]) }}" data-status="active" aria-current="page">
            <span class="truncate gradient-text font-bold text-xl tracking-tight">Offer Zone
                BD</span>
        </a>

        <livewire:notification-bell />

    </div>
</header>
