<section
    class="relative -mx-4 overflow-hidden rounded-b-[2.5rem] px-4 pb-20 pt-4 sm:-mx-5 sm:rounded-b-[3rem] sm:px-8 sm:pb-28 sm:pt-10 md:pb-32 md:pt-14">

    <!-- Background decorative elements -->
    <div class="pointer-events-none absolute inset-0 -z-10">
        <div class="absolute -left-40 -top-20 h-130 w-130 rounded-full conic-bg opacity-30 blur-3xl animate-aurora">
        </div>
        <div
            class="absolute -right-32 top-1/4 h-115 w-115 rounded-full conic-bg opacity-25 blur-3xl animate-aurora [animation-delay:-7s]">
        </div>
        <div
            class="absolute left-1/2 -bottom-20 h-95 w-190 -translate-x-1/2 rounded-full bg-linear-to-r from-primary/25 via-accent/15 to-primary-glow/25 blur-3xl animate-blob">
        </div>
        <div class="absolute inset-0 grid-bg opacity-60"></div>
        <div class="absolute inset-0 noise-bg opacity-[0.06]"></div>
        <div
            class="absolute left-[6%] top-[14%] hidden h-2 w-2 rounded-full bg-primary shadow-[0_0_22px] shadow-primary animate-float md:block">
        </div>
        <div
            class="absolute right-[10%] top-[22%] hidden h-2 w-2 rounded-full bg-accent shadow-[0_0_22px] shadow-accent animate-float-slow md:block">
        </div>
        <div
            class="absolute left-[18%] bottom-[18%] hidden h-2.5 w-2.5 rounded-full bg-primary-glow shadow-[0_0_22px] shadow-primary-glow animate-float md:block">
        </div>
        <div
            class="absolute right-[22%] bottom-[26%] hidden h-1.5 w-1.5 rounded-full bg-neon shadow-[0_0_22px] shadow-neon animate-float-slow md:block">
        </div>
    </div>

    <!-- Live user counter -->
    <div
        class="relative mx-auto mb-8 flex max-w-fit items-center gap-3 rounded-full border border-border bg-card/70 px-4 py-1.5 backdrop-blur animate-fade-up">
        <span class="relative flex h-2 w-2">
            <span
                class="absolute inline-flex h-full w-full rounded-full bg-emerald-500 opacity-75 animate-pulse-ring"></span>
            <span class="relative inline-flex h-2 w-2 rounded-full bg-emerald-500"></span>
        </span>
        <span class="text-xs font-medium text-muted-foreground uppercase font-sans">
            <span class="text-foreground font-semibold">{{ $users }}</span> users are currently recharging
        </span>
    </div>

    <div class="relative grid items-center gap-12 md:grid-cols-[1.05fr_1fr] md:gap-10 lg:gap-16">
        <!-- Left Content -->
        <div class="order-2 animate-fade-up md:order-1 text-center md:text-start">

            <span
                class="inline-flex items-center gap-2 rounded-full border border-primary/30 bg-primary/10 px-3 py-1 text-xs font-semibold text-primary backdrop-blur">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-sparkles h-3.5 w-3.5" aria-hidden="true">
                    <path
                        d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z">
                    </path>
                    <path d="M20 2v4"></path>
                    <path d="M22 4h-4"></path>
                    <circle cx="4" cy="20" r="2"></circle>
                </svg>
                Special Offer - 15% Cashback
            </span>

            <h1
                class="mt-5 font-display text-[2.5rem] font-bold leading-[1.02] tracking-tight md:text-5xl lg:text-[4rem]">
                <span class="block">Recharge Now</span>
                <span class="relative inline-block mb-2 lg:mb-0">
                    <span class="gradient-text">More Smart</span>
                    <svg class="absolute -bottom-2 left-0 w-full" height="10" viewBox="0 0 200 10"
                        preserveAspectRatio="none">
                        <path d="M2 7 Q 50 1 100 5 T 198 4" stroke="url(#g1)" stroke-width="3" stroke-linecap="round"
                            fill="none"></path>
                        <defs>
                            <linearGradient id="g1" x1="0" x2="1">
                                <stop offset="0%" stop-color="var(--color-primary)"></stop>
                                <stop offset="50%" stop-color="var(--color-accent)"></stop>
                                <stop offset="100%" stop-color="var(--color-primary-glow)"></stop>
                            </linearGradient>
                        </defs>
                    </svg>
                </span>
                <span class="block">in 30 seconds.</span>
            </h1>

            <p class="mt-6 w-[90%] mx-auto md:w-full max-w-xl text-base leading-relaxed text-foreground/90 md:text-lg">
                All operators
                <span class="font-semibold text-foreground">MB · Minutes · Packages</span>
                offers, plus
                <span class="font-semibold text-foreground">Free Fire</span>
                top-ups — best deals, instant delivery guarantee.
            </p>


            <div
                class="mt-6 flex flex-wrap justify-center md:justify-start items-center gap-x-5 gap-y-2 text-sm text-foreground/90">
                <span class="inline-flex items-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-zap size-4 text-[#ff49ba]!" aria-hidden="true"
                        data-tsd-source="/src/components/hero/Hero.tsx:96:15">
                        <path
                            d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z">
                        </path>
                    </svg>
                    Instant Delivery
                </span>

                <span class="inline-flex items-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-headphones size-4 text-[#36dede]"
                        aria-hidden="true" data-tsd-source="/src/components/hero/Hero.tsx:100:15">
                        <path
                            d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3">
                        </path>
                    </svg>
                    24/7 Support
                </span>
            </div>
        </div>

        <!-- Right Content -->
        <div class="relative order-1 animate-fade-up animate-float [animation-delay:180ms] md:order-2">
            <div class="relative mx-auto aspect-9/16 w-[95%] md:max-w-[320px] lg:max-w-90">

                <div class="absolute -inset-10 rounded-[3rem] conic-bg opacity-35 blur-3xl animate-spin-slow"></div>
                <div class="absolute inset-4 rounded-[3rem] gradient-bg opacity-50 blur-2xl animate-tilt"></div>

                <div
                    class="relative h-full w-full rounded-[2.5rem] border border-border bg-card/90 p-3 shadow-2xl backdrop-blur-xl">
                    <div class="absolute left-1/2 top-3 z-20 h-5 w-24 -translate-x-1/2 rounded-b-2xl bg-background">
                    </div>

                    <div
                        class="relative h-full w-full overflow-hidden rounded-4xl bg-linear-to-br from-background via-secondary/40 to-background overflow-y-auto scrollbar-none">

                        <!-- top Area -->
                        <div class="relative mb-10">
                            <div
                                class="relative overflow-hidden rounded-b-3xl bg-linear-to-r from-violet-600 via-indigo-600 to-cyan-500 px-5 pt-7 pb-16 shadow-2xl">
                                <!-- Blur Circles -->
                                <div class="absolute -right-6 -top-12 w-36 h-36 bg-white/20 rounded-full">
                                </div>
                                <div class="absolute right-5 -bottom-4 w-28 h-28 bg-white/10 rounded-full">
                                </div>
                                <!-- Content -->
                                <div class="relative flex items-center gap-4">
                                    <div class="relative">
                                        <div
                                            class="relative grid h-16 w-16 shrink-0 place-items-center rounded-full border-2 border-white/60">
                                            <img src="{{ asset('assets/images/avatar.png') }}" alt="avatar"
                                                class="w-full h-full object-cover rounded-full">
                                        </div>
                                    </div>
                                    <div class="">
                                        <p
                                            class="truncate font-display text-base md:text-lg font-semibold text-white capitalize">
                                            Emran Khan</p>
                                        <p class="truncate text-sm text-white/80">example@gmail.com</p>
                                    </div>
                                </div>

                                <!-- Dotted Decoration -->
                                <div class="absolute right-32 top-4 grid grid-cols-4 gap-1 opacity-30">

                                    <span class="w-1 h-1 rounded-full bg-white"></span>
                                    <span class="w-1 h-1 rounded-full bg-white"></span>
                                    <span class="w-1 h-1 rounded-full bg-white"></span>
                                    <span class="w-1 h-1 rounded-full bg-white"></span>

                                    <span class="w-1 h-1 rounded-full bg-white"></span>
                                    <span class="w-1 h-1 rounded-full bg-white"></span>
                                    <span class="w-1 h-1 rounded-full bg-white"></span>
                                    <span class="w-1 h-1 rounded-full bg-white"></span>

                                    <span class="w-1 h-1 rounded-full bg-white"></span>
                                    <span class="w-1 h-1 rounded-full bg-white"></span>
                                    <span class="w-1 h-1 rounded-full bg-white"></span>
                                    <span class="w-1 h-1 rounded-full bg-white"></span>

                                    <span class="w-1 h-1 rounded-full bg-white"></span>
                                    <span class="w-1 h-1 rounded-full bg-white"></span>
                                    <span class="w-1 h-1 rounded-full bg-white"></span>
                                    <span class="w-1 h-1 rounded-full bg-white"></span>

                                </div>
                            </div>

                            <div
                                class="absolute -bottom-13.75 left-[50%] translate-[-50%] w-[98%] flex items-center gap-5">

                                <div
                                    class="w-full flex items-center gap-3 rounded-2xl border border-border bg-card p-2">
                                    <span
                                        class="grid h-9 w-9 shrink-0 place-items-center rounded-xl bg-primary-glow/15 text-primary-glow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-wallet h-5 w-5" aria-hidden="true">
                                            <path
                                                d="M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1">
                                            </path>
                                            <path d="M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4"></path>
                                        </svg>
                                    </span>
                                    <div class="min-w-0">
                                        <p class="text-xs text-muted-foreground">Balance</p>
                                        <p
                                            class="truncate font-display text-base font-semibold text-foreground tabular-nums">
                                            ৳ 0.00</p>
                                    </div>
                                </div>

                                <div
                                    class="group w-full flex items-center gap-3 rounded-2xl border border-border bg-card p-2 text-left backdrop-blur-sm">
                                    <span
                                        class="grid h-9 w-9 shrink-0 place-items-center rounded-xl bg-success/15 text-success transition group-hover:scale-105"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-plus h-5 w-5" aria-hidden="true">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5v14"></path>
                                        </svg>
                                    </span>
                                    <div class="min-w-0">
                                        <p class="text-xs text-muted-foreground">Add</p>
                                        <p class="truncate font-display text-base font-semibold text-foreground">
                                            Balance</p>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- top area end -->

                        <!-- service area -->
                        <section class="rounded-2xl border border-border bg-card p-2.5 backdrop-blur-xl"
                            style="opacity: 1; transform: none">
                            <div class="grid grid-cols-3 md:grid-cols-4 gap-x-3 gap-y-5">

                                <div class="group flex flex-col items-center gap-2 ">
                                    <span
                                        class="grid h-12 w-12 shrink-0 place-items-center rounded-3xl tile-gradient text-white transition-transform duration-500 group-hover:-translate-y-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-smartphone h-5 w-5" aria-hidden="true">
                                            <rect width="14" height="20" x="5" y="2" rx="2"
                                                ry="2"></rect>
                                            <path d="M12 18h.01"></path>
                                        </svg>
                                    </span>
                                    <span
                                        class="text-center text-[11px] font-medium text-foreground/85">Recharge</span>
                                </div>

                                <div class="group flex flex-col items-center gap-2">
                                    <span
                                        class="grid h-12 w-12 shrink-0 place-items-center rounded-3xl tile-gradient text-white transition-transform duration-500 group-hover:-translate-y-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-gift h-5 w-5" aria-hidden="true">
                                            <path d="M12 7v14"></path>
                                            <path d="M20 11v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-8"></path>
                                            <path
                                                d="M7.5 7a1 1 0 0 1 0-5A4.8 8 0 0 1 12 7a4.8 8 0 0 1 4.5-5 1 1 0 0 1 0 5">
                                            </path>
                                            <rect x="3" y="7" width="18" height="4" rx="1"></rect>
                                        </svg>
                                    </span>
                                    <span class="text-center text-[11px] font-medium text-foreground/85">Regular
                                        Pack</span>
                                </div>

                                <div class="group flex flex-col items-center gap-2">
                                    <span
                                        class="grid h-12 w-12 shrink-0 place-items-center rounded-3xl tile-gradient text-white transition-transform duration-500 group-hover:-translate-y-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-badge-percent h-5 w-5" aria-hidden="true"
                                            data-tsd-source="/src/components/app/ServiceTile.tsx:14:9">
                                            <path
                                                d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z">
                                            </path>
                                            <path d="m15 9-6 6"></path>
                                            <path d="M9 9h.01"></path>
                                            <path d="M15 15h.01"></path>
                                        </svg>
                                    </span>
                                    <span class="text-center text-[11px] font-medium text-foreground/85">Drive
                                        Pack</span>
                                </div>

                                <div class="group flex flex-col items-center gap-2">
                                    <span
                                        class="grid h-12 w-12 shrink-0 place-items-center rounded-3xl tile-gradient text-white transition-transform duration-500 group-hover:-translate-y-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-receipt w-5.5 h-5.5">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2m4 -14h6m-6 4h6m-2 4h2" />
                                        </svg>
                                    </span>
                                    <span class="text-center text-[11px] font-medium text-foreground/85">Bill
                                        Pay</span>
                                </div>

                                <div class="group flex flex-col items-center gap-2">
                                    <span
                                        class="grid h-12 w-12 shrink-0 place-items-center rounded-3xl tile-gradient transition-transform duration-500 group-hover:-translate-y-1">
                                        <img src="{{ asset('assets/images/bri-icon.png') }}" alt="Brilliant"
                                            class="h-10 w-10 object-cover">
                                    </span>
                                    <span
                                        class="text-center text-[11px] font-medium text-foreground/85">Brilliant</span>
                                </div>

                                <div class="group flex flex-col items-center gap-2">
                                    <span
                                        class="grid h-12 w-12 shrink-0 place-items-center rounded-3xl tile-gradient text-white transition-transform duration-500 group-hover:-translate-y-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            aria-hidden="true">
                                            <line x1="6" x2="10" y1="11" y2="11">
                                            </line>
                                            <line x1="8" x2="8" y1="9" y2="13">
                                            </line>
                                            <line x1="15" x2="15.01" y1="12" y2="12">
                                            </line>
                                            <line x1="18" x2="18.01" y1="10" y2="10">
                                            </line>
                                            <path
                                                d="M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604 9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="text-center text-[11px] font-medium text-foreground/85">Free
                                        Fire</span>
                                </div>

                                <div class="group flex flex-col items-center gap-2">
                                    <span
                                        class="grid h-12 w-12 shrink-0 place-items-center rounded-3xl tile-gradient text-white transition-transform duration-500 group-hover:-translate-y-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-headphones h-5 w-5" aria-hidden="true">
                                            <path
                                                d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="text-center text-[11px] font-medium text-foreground/85">Support</span>
                                </div>

                            </div>
                        </section>
                        <!-- service area end -->


                        <!-- transcation area -->
                        <section class="rounded-2xl border border-border bg-card p-2 backdrop-blur-xl mt-3">
                            <header class="mb-3 flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <h3 class="font-display text-sm md:text-base font-semibold">Recent Transactions
                                    </h3>
                                    <i class="ri-refresh-line text-muted-foreground"></i>
                                </div>
                            </header>


                            <div class="space-y-3">

                                <button type="button"
                                    class="w-full rounded-xl border border-border p-2.5 text-left bg-background/30 transition-colors animate-fade-up">
                                    <div class="flex items-center gap-2.5">
                                        <div
                                            class="flex h-9 w-9 md:h-10 md:w-10 shrink-0 items-center justify-center overflow-hidden rounded-lg bg-transparent">
                                            <img src="{{ asset('assets/images/pay-methods/bkash.webp') }}"
                                                alt="" class="h-full w-full rounded-lg object-cover">
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <div class="flex items-center justify-between gap-1">
                                                <span
                                                    class="text-left text-sm font-normal md:font-bold text-foreground/90 capitalize">Bkash
                                                    Send Money</span>
                                                <label
                                                    class="text-xs font-semibold tracking-wide text-emerald-500">Success</label>
                                            </div>
                                            <!-- Amount -->
                                            <div class="flex items-center justify-between mt-1">
                                                <span class="text-xs md:text-sm font-semibold text-foreground/70">200
                                                    Taka</span>
                                                <span class="text-[11px] md:text-xs font-normal text-foreground/70">20
                                                    July, 2026 06:34 PM </span>
                                            </div>
                                        </div>
                                    </div>
                                </button>

                                <button type="button"
                                    class="w-full rounded-xl border border-border p-2.5 text-left bg-background/30 transition-colors animate-fade-up">
                                    <div class="flex items-center gap-2.5">
                                        <div
                                            class="flex h-9 w-9 md:h-10 md:w-10 shrink-0 items-center justify-center overflow-hidden rounded-lg bg-transparent">
                                            <img src="{{ asset('assets/images/operator/airtel.webp') }}"
                                                alt="" class="h-full w-full rounded-lg object-cover">
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <div class="flex items-center justify-between gap-1">
                                                <span
                                                    class="text-left text-sm font-normal md:font-bold text-foreground/90 capitalize">01612737812</span>
                                                <label
                                                    class="text-xs font-semibold tracking-wide text-sky-500">Pending</label>
                                            </div>
                                            <!-- Amount -->
                                            <div class="flex items-center justify-between mt-1">
                                                <span class="text-xs md:text-sm font-semibold text-foreground/70">300
                                                    Taka</span>
                                                <span class="text-[11px] md:text-xs font-normal text-foreground/70">26
                                                    July, 2026 06:34 PM </span>
                                            </div>
                                        </div>
                                    </div>
                                </button>

                            </div>

                        </section>
                        <!-- transcation area ENd -->

                    </div>

                </div>


            </div>
        </div>
    </div>

    {{-- <div class="relative mt-14 grid grid-cols-2 gap-3 sm:grid-cols-4 sm:gap-4">

        <!-- Happy Users Card -->
        <div class="group relative overflow-hidden rounded-2xl border border-border bg-card/70 p-4 backdrop-blur transition-all hover:-translate-y-1 hover:border-primary hover:shadow-xl animate-fade-up" style="animation-delay: 0ms">
            <div class="absolute -right-6 -top-6 h-16 w-16 rounded-full bg-primary/10 opacity-0 transition-opacity group-hover:opacity-100"></div>

            <div class="relative flex items-center gap-2 text-primary">
                <i class="ri-line-chart-line"></i>
            </div>
            <div class="relative mt-1 text-2xl font-bold gradient-text">50K+</div>
            <div class="relative mt-0.5 text-xs text-muted-foreground">Happy Users</div>
        </div>

        <!-- Recharge Success Card -->
        <div class="group relative overflow-hidden rounded-2xl border border-border bg-card/70 p-4 backdrop-blur transition-all hover:-translate-y-1 hover:border-primary hover:shadow-xl animate-fade-up" tyle="animation-delay: 80ms">
            <div class="absolute -right-6 -top-6 h-16 w-16 rounded-full bg-primary/10 opacity-0 transition-opacity group-hover:opacity-100"></div>
            <div class="relative flex items-center gap-2 text-primary">
                <i class="ri-smartphone-line"></i>
            </div>
            <div class="relative mt-1 text-2xl font-bold gradient-text">5</div>
            <div class="relative mt-0.5 text-xs text-muted-foreground">Operators</div>
        </div>

        <!-- Delivery Count Card -->
        <div class="group relative overflow-hidden rounded-2xl border border-border bg-card/70 p-4 backdrop-blur transition-all hover:-translate-y-1 hover:border-primary hover:shadow-xl animate-fade-up" style="animation-delay: 160ms">
            <div class="absolute -right-6 -top-6 h-16 w-16 rounded-full bg-primary/10 opacity-0 transition-opacity group-hover:opacity-100"></div>
            <div class="relative flex items-center gap-2 text-primary">
                <i class="ri-line-chart-line"></i>
            </div>
            <div class="relative mt-1 text-2xl font-bold gradient-text">100</div>
            <div class="relative mt-0.5 text-xs text-muted-foreground">Delivery</div>
        </div>

        <div class="group relative overflow-hidden rounded-2xl border border-border bg-card/70 p-4 backdrop-blur transition-all hover:-translate-y-1 hover:border-primary hover:shadow-xl animate-fade-up" style="animation-delay: 240ms">
            <div class="absolute -right-6 -top-6 h-16 w-16 rounded-full bg-primary/10 opacity-0 transition-opacity group-hover:opacity-100"></div>
            <div class="relative flex items-center gap-2 text-primary">
                <i class="ri-star-line"></i>
            </div>
            <div class="relative mt-1 text-2xl font-bold gradient-text">4.9★</div>
            <div class="relative mt-0.5 text-xs text-muted-foreground">Rating</div>
        </div>

    </div> --}}

</section>
