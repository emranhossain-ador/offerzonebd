<section class="section-container">
    <div class="mb-6 md:mb-14 flex items-end justify-between">
        <h2 class="text-xl font-bold text-foreground sm:text-2xl">What do you want to buy today?</h2>
    </div>

    <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6">

        <button type="button" class="group relative flex flex-col items-center rounded-2xl bg-card/70 backdrop-blur-sm border border-border px-4 py-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-[#c466ff] focus:outline-none focus-visible:ring-2 focus-visible:ring-ring animate-fade-up" style="--card-glow: #c466ff">
            <span aria-hidden="true" class="pointer-events-none absolute -top-8 left-1/2 h-24 w-24 -translate-x-1/2 rounded-full opacity-30 blur-3xl transition-opacity duration-300 group-hover:opacity-60 bg-[#c466ff]"></span>

            <div class="relative mb-4 flex h-20 w-20 items-center justify-center">
                <img src="{{ asset('assets/images/icon-internet.png') }}" alt="" width="160" height="160" loading="lazy" class="h-20 w-20 object-contain drop-shadow-[0_0_18px_#c466ff] transition-transform duration-300 group-hover:scale-110"/>
            </div>
            <h3 class="text-sm font-semibold text-foreground sm:text-base">Internet Offer</h3>
            <p class="mt-1 text-xs text-muted-foreground">Best Internet Packs</p>
        </button>

        <button type="button" class="group relative flex flex-col items-center rounded-2xl bg-card/70 backdrop-blur-sm border border-border px-4 py-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-[#ff6a43] focus:outline-none focus-visible:ring-2 focus-visible:ring-ring animate-fade-up"style="--card-glow: #ff6a43">
            <span aria-hidden="true" class="pointer-events-none absolute -top-8 left-1/2 h-24 w-24 -translate-x-1/2 rounded-full opacity-30 blur-3xl transition-opacity duration-300 group-hover:opacity-60 bg-[#ff6a43]"></span>
            <div class="relative mb-4 flex h-20 w-20 items-center justify-center">
                <img src="{{ asset('assets/images/icon-minute.png') }}" alt="" width="160" height="160" loading="lazy" class="h-20 w-20 object-contain drop-shadow-[0_0_18px_#ff6a43] transition-transform duration-300 group-hover:scale-110"/>
            </div>
            <h3 class="text-sm font-semibold text-foreground sm:text-base">Minute Pack</h3>
            <p class="mt-1 text-xs text-muted-foreground">All Minute Packages</p>
        </button>

        <button type="button" class="group relative flex flex-col items-center rounded-2xl bg-card/70 backdrop-blur-sm border border-border px-4 py-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-[#00cacb] focus:outline-none focus-visible:ring-2 focus-visible:ring-ring animate-fade-up" style="--card-glow: #00cacb">
            <span aria-hidden="true" class="pointer-events-none absolute -top-8 left-1/2 h-24 w-24 -translate-x-1/2 rounded-full opacity-30 blur-3xl transition-opacity duration-300 group-hover:opacity-60 bg-[#00cacb]"></span>
            <div class="relative mb-4 flex h-20 w-20 items-center justify-center">
                <img src="{{ asset('assets/images/icon-wallet.png') }}" alt="" width="160" height="160" loading="lazy" class="h-20 w-20 object-contain drop-shadow-[0_0_18px_#00cacb] transition-transform duration-300 group-hover:scale-110"/>
            </div>
            <h3 class="text-sm font-semibold text-foreground sm:text-base">Flexiload</h3>
            <p class="mt-1 text-xs text-muted-foreground">Balance Topup</p>
        </button>

        <button type="button" class="group relative flex flex-col items-center rounded-2xl bg-card/70 backdrop-blur-sm border border-border px-4 py-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-[#00a9ff] focus:outline-none focus-visible:ring-2 focus-visible:ring-ring animate-fade-up" style="--card-glow: #00a9ff">
            <span aria-hidden="true" class="pointer-events-none absolute -top-8 left-1/2 h-24 w-24 -translate-x-1/2 rounded-full opacity-30 blur-3xl transition-opacity duration-300 group-hover:opacity-60 bg-[#00a9ff]"></span>
            <div class="relative mb-4 flex h-20 w-20 items-center justify-center">
                <img src="{{ asset('assets/images/icon-diamond.png') }}" alt="" width="160" height="160" loading="lazy" class="h-20 w-20 object-contain drop-shadow-[0_0_18px_#00a9ff] transition-transform duration-300 group-hover:scale-110"/>
            </div>
            <h3 class="text-sm font-semibold text-foreground sm:text-base">Free Fire Diamond</h3>
            <p class="mt-1 text-xs text-muted-foreground">Topup Diamonds</p>
        </button>

        <button type="button" class="group relative flex flex-col items-center rounded-2xl bg-card/70 backdrop-blur-sm border border-border px-4 py-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-[#ecaa0b] focus:outline-none focus-visible:ring-2 focus-visible:ring-ring animate-fade-up" style="--card-glow: #ecaa0b">
            <span aria-hidden="true" class="pointer-events-none absolute -top-8 left-1/2 h-24 w-24 -translate-x-1/2 rounded-full opacity-30 blur-3xl transition-opacity duration-300 group-hover:opacity-60 bg-[#ecaa0b]"></span>
            <div class="relative mb-4 flex h-20 w-20 items-center justify-center">
                <img src="{{ asset('assets/images/icon-uc.png') }}" alt="" width="160" height="160" loading="lazy" class="h-20 w-20 object-contain drop-shadow-[0_0_18px_#ecaa0b] transition-transform duration-300 group-hover:scale-110"/>
            </div>
            <h3 class="text-sm font-semibold text-foreground sm:text-base">Package</h3>
            <p class="mt-1 text-xs text-muted-foreground">Offer Combos</p>
        </button>

    </div>
</section>
