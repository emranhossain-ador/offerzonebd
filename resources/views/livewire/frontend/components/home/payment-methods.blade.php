<section class="section-container">

    <!-- Section Header -->
    <div class="mx-auto mb-12 max-w-2xl text-center">
        <span
            class="inline-flex items-center gap-2 rounded-full border border-border bg-card/70 px-3 py-1 text-xs font-medium backdrop-blur">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-sparkles h-3.5 w-3.5 text-primary" aria-hidden="true">
                <path
                    d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z">
                </path>
                <path d="M20 2v4"></path>
                <path d="M22 4h-4"></path>
                <circle cx="4" cy="20" r="2"></circle>
            </svg>

            Payment Methods
        </span>
        <h2 class="mt-4 text-3xl font-bold sm:text-4xl font-heading">
            Pay with your <span class="gradient-text">favorite wallet</span>
        </h2>
        <p class="mt-3 text-muted-foreground">
            Securely pay through Bangladesh's most trusted mobile financial services — fast, easy and 100% reliable.
        </p>
    </div>

    <div class="space-y-8">
        <!-- Payment Method Card -->
        <div class="relative mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">

            @php
                $bgClass = [
                    'bkash' => 'from-pink-500 via-rose-500 to-pink-600',
                    'nagad' => 'from-orange-500 via-amber-500 to-orange-600',
                    'rocket' => 'from-fuchsia-500 via-purple-500 to-violet-600',
                    'upay' => 'from-cyan-500 via-sky-500 to-blue-600',
                ];

                $badgeClass = [
                    'bkash' => 'bg-pink-500/15 text-pink-600',
                    'nagad' => 'bg-orange-500/15 text-orange-600',
                    'rocket' => 'bg-fuchsia-500/15 text-fuchsia-600',
                    'upay' => 'bg-cyan-500/15 text-cyan-600',
                ];
            @endphp

            @foreach ($paymentMethod as $method)
                <div
                    class="group relative overflow-hidden rounded-3xl border border-border bg-card/80 backdrop-blur transition-all hover:-translate-y-1 hover:border-primary/40 hover:shadow-2xl hover:shadow-primary/10">
                    <div class="relative bg-linear-to-br {{ $bgClass[$method->name] }} p-5 text-white">

                        <div
                            class="pointer-events-none absolute -right-8 -top-8 h-28 w-28 rounded-full bg-white/20 blur-2xl">
                        </div>
                        <div
                            class="pointer-events-none absolute -bottom-10 -left-10 h-28 w-28 rounded-full bg-black/20 blur-2xl">
                        </div>

                        <div class="relative flex items-start justify-between">
                            <div>
                                <div class="font-display text-2xl font-bold font-heading drop-shadow capitalize">
                                    {{ $method->name }}</div>
                                <div class="text-xs font-medium opacity-90">Personal</div>
                            </div>
                            <div
                                class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/20 backdrop-blur">
                                <i class="ri-wallet-line text-2xl text-white"></i>
                            </div>
                        </div>

                    </div>
                    <div class="space-y-2 p-5">

                        <div class="text-[11px] font-semibold uppercase tracking-wider text-muted-foreground">Send Money
                            To</div>
                        <div class="font-display text-lg font-bold tracking-wide font-heading">+88
                            {{ $method->pay_number }}</div>
                        <span
                            class="inline-flex items-center gap-1 rounded-full px-2.5 py-1 text-xs font-semibold tracking-wide uppercase {{ $badgeClass[$method->name] }}">
                            <i class="ri-verified-badge-line"></i>
                            {{ $method->name }}
                        </span>

                    </div>
                </div>
            @endforeach

        </div>

        <!-- Payment Roles -->
        <div
            class="relative mt-10 overflow-hidden rounded-3xl border border-border/60 bg-card/80 p-6 backdrop-blur md:p-10">
            <div class="relative flex flex-col gap-6 lg:flex-row lg:items-start">

                <div class="flex items-center gap-3 md:w-72 md:shrink-0">
                    <div
                        class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-500/15 text-emerald-500">
                        <i class="ri-shield-line text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="font-display text-xl font-bold">How to pay?</h3>
                        <p class="text-xs text-muted-foreground">4 simple steps</p>
                    </div>
                </div>

                <ol class="flex-1 grid gap-4 sm:grid-cols-2">
                    <li class="flex items-start gap-3 rounded-2xl border border-border/40 bg-background/40 p-4">
                        <span
                            class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-linear-to-br from-primary to-fuchsia-500 text-sm font-bold text-primary-foreground shadow-lg shadow-primary/30">2</span>
                        <span class="pt-1 text-sm">Save the Transaction ID securely </span>
                    </li>
                    <li class="flex items-start gap-3 rounded-2xl border border-border/40 bg-background/40 p-4">
                        <span
                            class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-linear-to-br from-primary to-fuchsia-500 text-sm font-bold text-primary-foreground shadow-lg shadow-primary/30">3</span>
                        <span class="pt-1 text-sm">Submit your pay number & Transaction ID</span>
                    </li>
                    <li class="flex items-start gap-3 rounded-2xl border border-border/40 bg-background/40 p-4">
                        <span
                            class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-linear-to-br from-primary to-fuchsia-500 text-sm font-bold text-primary-foreground shadow-lg shadow-primary/30">4</span>
                        <span class="pt-1 text-sm">Your balance will be add instantly</span>
                    </li>
                    <li class="flex items-start gap-3 rounded-2xl border border-border/40 bg-background/40 p-4">
                        <span
                            class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-linear-to-br from-primary to-fuchsia-500 text-sm font-bold text-primary-foreground shadow-lg shadow-primary/30">4</span>
                        <span class="pt-1 text-sm">Face any problems contact us</span>
                    </li>
                </ol>

            </div>

            <div
                class="relative mt-6 flex flex-wrap items-center gap-4 border-t border-border/40 pt-5 text-xs text-muted-foreground">

                <span class="inline-flex items-center gap-1.5">
                    <i class="ri-verified-badge-fill text-emerald-400 text-lg"></i>
                    Payments are safe &amp; encrypted
                </span>

                <span class="inline-flex items-center gap-1.5">
                    <i class="ri-shield-check-fill text-primary text-lg"></i>
                    Your info stays private
                </span>

                <span class="inline-flex items-center gap-1.5">
                    <i class="ri-flashlight-line text-amber-400 text-lg"></i>
                    Instant service activation
                </span>
            </div>
        </div>

    </div>



</section>
