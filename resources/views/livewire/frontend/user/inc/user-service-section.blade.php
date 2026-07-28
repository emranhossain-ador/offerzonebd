<section class="rounded-2xl border border-border bg-card px-2 md:px-4 py-4 backdrop-blur-xl"
    style="opacity: 1; transform: none">
    <div class="grid grid-cols-4 gap-x-3 gap-y-5">

        <a href="{{ route('mobile-recharge', ['username' => _auth()->username]) }}"
            class="group flex flex-col items-center gap-2 " wire:navigate>
            <span
                class="grid h-14 w-14 shrink-0 place-items-center rounded-3xl tile-gradient text-white transition-transform duration-500 group-hover:-translate-y-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-smartphone h-6 w-6" aria-hidden="true">
                    <rect width="14" height="20" x="5" y="2" rx="2" ry="2"></rect>
                    <path d="M12 18h.01"></path>
                </svg>
            </span>
            <span class="text-center text-[11px] font-medium text-foreground/85">Recharge</span>
        </a>

        <a href="{{ route('regular-package', ['username' => _auth()->username]) }}"
            class="group flex flex-col items-center gap-2" wire:navigate>
            <span
                class="grid h-14 w-14 shrink-0 place-items-center rounded-3xl tile-gradient text-white transition-transform duration-500 group-hover:-translate-y-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-gift h-6 w-6" aria-hidden="true">
                    <path d="M12 7v14"></path>
                    <path d="M20 11v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-8"></path>
                    <path d="M7.5 7a1 1 0 0 1 0-5A4.8 8 0 0 1 12 7a4.8 8 0 0 1 4.5-5 1 1 0 0 1 0 5"></path>
                    <rect x="3" y="7" width="18" height="4" rx="1"></rect>
                </svg>
            </span>
            <span class="text-center text-[11px] font-medium text-foreground/85">Regular Pack</span>
        </a>

        <a href="{{ route('drive-package', ['username' => _auth()->username]) }}"
            class="group flex flex-col items-center gap-2" wire:navigate>
            <span
                class="grid h-14 w-14 shrink-0 place-items-center rounded-3xl tile-gradient text-white transition-transform duration-500 group-hover:-translate-y-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-badge-percent h-6 w-6" aria-hidden="true"
                    data-tsd-source="/src/components/app/ServiceTile.tsx:14:9">
                    <path
                        d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z">
                    </path>
                    <path d="m15 9-6 6"></path>
                    <path d="M9 9h.01"></path>
                    <path d="M15 15h.01"></path>
                </svg>
            </span>
            <span class="text-center text-[11px] font-medium text-foreground/85">Drive Pack</span>
        </a>

        <a href="{{ route('bill-payment', ['username' => _auth()->username]) }}"
            class="group flex flex-col items-center gap-2" wire:navigate>
            <span
                class="grid h-14 w-14 shrink-0 place-items-center rounded-3xl tile-gradient text-white transition-transform duration-500 group-hover:-translate-y-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-receipt w-6.5 h-6.5">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2m4 -14h6m-6 4h6m-2 4h2" />
                </svg>
            </span>
            <span class="text-center text-[11px] font-medium text-foreground/85">Bill Pay</span>
        </a>

        <a href="{{ route('brilliant-recharge', ['username' => _auth()->username]) }}"
            class="group flex flex-col items-center gap-2" wire:navigate>
            <span
                class="grid h-14 w-14 shrink-0 place-items-center rounded-3xl tile-gradient text-white transition-transform duration-500 group-hover:-translate-y-1 ">
                <img src="{{ asset('assets/images/bri-icon.png') }}" alt="Brilliant" class="h-11 w-11 object-cover">
            </span>
            <span class="text-center text-[11px] font-medium text-foreground/85">Brilliant</span>
        </a>

        <a href="{{ route('free-fire', ['username' => _auth()->username]) }}"
            class="group flex flex-col items-center gap-2" wire:navigate>
            <span
                class="grid h-14 w-14 shrink-0 place-items-center rounded-3xl tile-gradient text-white transition-transform duration-500 group-hover:-translate-y-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    aria-hidden="true">
                    <line x1="6" x2="10" y1="11" y2="11"></line>
                    <line x1="8" x2="8" y1="9" y2="13"></line>
                    <line x1="15" x2="15.01" y1="12" y2="12"></line>
                    <line x1="18" x2="18.01" y1="10" y2="10"></line>
                    <path
                        d="M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604 9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z">
                    </path>
                </svg>
            </span>
            <span class="text-center text-[11px] font-medium text-foreground/85 ">Free Fire</span>
        </a>

        {{-- <a href="/menu" class="group flex flex-col items-center gap-2">
            <span
                class="grid h-14 w-14 shrink-0 place-items-center rounded-3xl tile-gradient text-primary-foreground transition-transform duration-500 group-hover:-translate-y-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="lucide lucide-circle-play h-6 w-6" aria-hidden="true">
                    <path
                        d="M9 9.003a1 1 0 0 1 1.517-.859l4.997 2.997a1 1 0 0 1 0 1.718l-4.997 2.997A1 1 0 0 1 9 14.996z">
                    </path>
                    <circle cx="12" cy="12" r="10"></circle>
                </svg>
            </span>
            <span class="text-center text-[11px] font-medium text-foreground/85">Video Tutorials</span>
        </a> --}}

        <a href="{{ route('contact', ['username' => _auth()->username]) }}"
            class="group flex flex-col items-center gap-2" wire:navigate>
            <span
                class="grid h-14 w-14 shrink-0 place-items-center rounded-3xl tile-gradient text-white transition-transform duration-500 group-hover:-translate-y-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="lucide lucide-headphones h-6 w-6" aria-hidden="true">
                    <path
                        d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3">
                    </path>
                </svg>
            </span>
            <span class="text-center text-[11px] font-medium text-foreground/85">Support</span>
        </a>

    </div>
</section>
