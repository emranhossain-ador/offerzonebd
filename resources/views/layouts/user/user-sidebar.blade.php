<div :class="openSidebar ? 'opacity-100 z-40' : 'opacity-0 -z-40'"
    class="fixed inset-0 -z-40 bg-background/70 backdrop-blur-sm opacity-0"></div>
<aside :class="openSidebar ? 'translate-x-0' : '-translate-x-full'" @click.outside="openSidebar = false"
    class="fixed inset-y-0 left-0 -translate-x-full transition-all duration-300 z-50 flex w-[86%] max-w-[360px] flex-col border-r border-border bg-surface">
    <div class="relative gradient-primary px-5 pb-12 pt-6 text-primary-foreground mb-12">
        <button @click="openSidebar = false"
            class="absolute right-4 top-4 grid h-9 w-9 shrink-0 cursor-pointer place-items-center rounded-full bg-white/15 hover:bg-white/25">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-x h-4 w-4" aria-hidden="true"
                data-tsd-source="/src/components/app/AppShell.tsx:147:17">
                <path d="M18 6 6 18"></path>
                <path d="m6 6 12 12"></path>
            </svg>
        </button>

        <div class="flex items-center gap-3">
            <div
                class="grid h-14 w-14 shrink-0 place-items-center rounded-full border border-white/90 shadow-[0_4px_10px] shadow-primary">
                <img src="{{ asset('assets/images/avatar.png') }}" alt="avatar"
                    class="w-full h-full rounded-full object-cover">
            </div>
            <div class="min-w-0">
                <p class="truncate font-display text-base font-semibold">{{ _auth()->name }}</p>
                <p class="truncate text-sm text-muted">{{ _auth()->email }}</p>
            </div>
        </div>

        <div
            class="absolute -bottom-20 left-[50%] translate-[-50%] w-[92%] flex items-center gap-3 rounded-xl bg-background p-3 border border-border">
            <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-primary-glow/10 text-primary-glow">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-wallet h-5 w-5" aria-hidden="true">
                    <path
                        d="M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1">
                    </path>
                    <path d="M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4"></path>
                </svg>
            </span>
            <div class="min-w-0">
                <p class="text-[11px] text-foreground">Balance</p>
                <p class="truncate font-display text-base font-semibold text-foreground tabular-nums">৳
                    {{ number_format(_auth()->balance, 2) }}</p>
            </div>
        </div>
    </div>

    <div class="flex-1 space-y-6 px-3 py-4 overflow-y-auto scrollbar-thin" style="max-height:calc(100vh - 210px)">
        <div>
            <p class="px-3 pb-1 text-[10px] font-semibold uppercase tracking-widest text-primary-glow/80">Main</p>

            <a class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm {{ request()->routeIs('user.home') ? 'bg-primary-glow/5 text-primary-glow' : 'text-foreground/85 hover:bg-muted/50 dark:hover:bg-white/5' }}"
                href="{{ route('user.home', ['username' => _auth()->username]) }}" data-status="active"
                aria-current="page" wire:navigate>
                <span class="grid h-9 w-9 shrink-0 place-items-center rounded-lg bg-primary-glow/10 text-primary-glow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-house h-4 w-4" aria-hidden="true">
                        <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"></path>
                        <path
                            d="M3 10a2 2 0 0 1 .709-1.528l7-6a2 2 0 0 1 2.582 0l7 6A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z">
                        </path>
                    </svg>
                </span>

                <span class="flex-1">Home</span>

                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-chevron-right h-4 w-4 text-muted-foreground group-hover:text-foreground"
                    aria-hidden="true">
                    <path d="m9 18 6-6-6-6"></path>
                </svg>
            </a>

            <a href="{{ route('mobile-recharge', ['username' => _auth()->username]) }}"
                class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm {{ request()->routeIs('mobile-recharge') ? 'bg-primary-glow/5 text-primary-glow' : 'text-foreground/85 hover:bg-muted/50 dark:hover:bg-white/5' }}"
                wire:navigate>
                <span class="grid h-9 w-9 shrink-0 place-items-center rounded-lg bg-primary-glow/10 text-primary-glow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-smartphone h-4 w-4" aria-hidden="true"
                        data-tsd-source="/src/components/app/AppShell.tsx:178:25">
                        <rect width="14" height="20" x="5" y="2" rx="2" ry="2"></rect>
                        <path d="M12 18h.01"></path>
                    </svg>
                </span>

                <span class="flex-1">Recharge</span>

                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-chevron-right h-4 w-4 text-muted-foreground group-hover:text-foreground"
                    aria-hidden="true">
                    <path d="m9 18 6-6-6-6"></path>
                </svg>
            </a>

            <a href="{{ route('drive-package', ['username' => _auth()->username]) }}"
                class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm {{ request()->routeIs('drive-package') ? 'bg-primary-glow/5 text-primary-glow' : 'text-foreground/85 hover:bg-muted/50 dark:hover:bg-white/5' }}"
                wire:navigate>
                <span class="grid h-9 w-9 shrink-0 place-items-center rounded-lg bg-primary-glow/10 text-primary-glow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-badge-percent h-4 w-4" aria-hidden="true">
                        <path
                            d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z">
                        </path>
                        <path d="m15 9-6 6"></path>
                        <path d="M9 9h.01"></path>
                        <path d="M15 15h.01"></path>
                    </svg>
                </span>
                <span class="flex-1">Drive Package</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"
                    class="lucide lucide-chevron-right h-4 w-4 text-muted-foreground group-hover:text-foreground"
                    aria-hidden="true">
                    <path d="m9 18 6-6-6-6"></path>
                </svg>
            </a>

            <a href="{{ route('transactions', ['username' => _auth()->username]) }}"
                class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm {{ request()->routeIs('transactions') ? 'bg-primary-glow/5 text-primary-glow' : 'text-foreground/85 hover:bg-muted/50 dark:hover:bg-white/5' }}"
                wire:navigate>
                <span class="grid h-9 w-9 shrink-0 place-items-center rounded-lg bg-primary-glow/10 text-primary-glow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-arrow-left-right h-4 w-4" aria-hidden="true">
                        <path d="M8 3 4 7l4 4"></path>
                        <path d="M4 7h16"></path>
                        <path d="m16 21 4-4-4-4"></path>
                        <path d="M20 17H4"></path>
                    </svg>
                </span>
                <span class="flex-1">Transactions</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"
                    class="lucide lucide-chevron-right h-4 w-4 text-muted-foreground group-hover:text-foreground"
                    aria-hidden="true">
                    <path d="m9 18 6-6-6-6"></path>
                </svg>
            </a>

        </div>

        <div>
            <p class="px-3 pb-1 text-[10px] font-semibold uppercase tracking-widest text-primary-glow/80">Support</p>

            <a href="{{ route('contact', ['username' => _auth()->username]) }}"
                class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm {{ request()->routeIs('contact') ? 'bg-primary-glow/5 text-primary-glow' : 'text-foreground/85 hover:bg-muted/50 dark:hover:bg-white/5' }}"
                wire:navigate>
                <span class="grid h-9 w-9 shrink-0 place-items-center rounded-lg bg-primary-glow/10 text-primary-glow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-headphones h-4 w-4" aria-hidden="true"
                        data-tsd-source="/src/components/app/AppShell.tsx:178:25">
                        <path
                            d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3">
                        </path>
                    </svg>
                </span>
                <span class="flex-1">Support</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"
                    class="lucide lucide-chevron-right h-4 w-4 text-muted-foreground group-hover:text-foreground"
                    aria-hidden="true">
                    <path d="m9 18 6-6-6-6"></path>
                </svg>
            </a>

            <a href="{{ route('faq-page', ['username' => _auth()->username]) }}"
                class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm {{ request()->routeIs('faq-page') ? 'bg-primary-glow/5 text-primary-glow' : 'text-foreground/85 hover:bg-muted/50 dark:hover:bg-white/5' }}"
                wire:navigate>
                <span class="grid h-9 w-9 shrink-0 place-items-center rounded-lg bg-primary-glow/10 text-primary-glow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-circle-question-mark h-4 w-4"
                        aria-hidden="true">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                        <path d="M12 17h.01"></path>
                    </svg>
                </span>
                <span class="flex-1">FAQ</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"
                    class="lucide lucide-chevron-right h-4 w-4 text-muted-foreground group-hover:text-foreground"
                    aria-hidden="true">
                    <path d="m9 18 6-6-6-6"></path>
                </svg>
            </a>
        </div>
    </div>

    <div class="border-t border-border p-3">

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="flex w-full items-center gap-3 rounded-xl px-3 py-2.5 border border-red-500/30 text-sm text-red-500 hover:bg-red-500/5 cursor-pointer">
                <span class="grid h-9 w-9 shrink-0 place-items-center rounded-lg bg-destructive/15">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-log-out h-4 w-4" aria-hidden="true">
                        <path d="m16 17 5-5-5-5"></path>
                        <path d="M21 12H9"></path>
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                    </svg>
                </span>
                Logout
            </button>
        </form>

    </div>

</aside>
