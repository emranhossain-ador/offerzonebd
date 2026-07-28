<div class="main-content">
    <div class="sticky z-20 top-0 w-full">
        <div class="w-full border-b border-border bg-card py-3.5 md:py-5 px-2 md:px-4 shadow-sm">

            <div class="flex items-center gap-1.5 justify-evenly pb-5">

                <button wire:click="filterByOperator('gp')" type="button"
                    class="w-14 h-14 md:w-16 md:h-16 shrink-0 rounded-md border p-1.5 md:p-2 cursor-pointer flex justify-center items-center {{ $operator == 'gp' ? 'border-primary bg-primary/10' : 'border-border hover:border-primary' }}">
                    <img src="{{ asset('assets/images/gp-filter.png') }}" alt="logo"
                        class="w-full h-full object-contain">
                </button>

                <button wire:click="filterByOperator('robi')" type="button"
                    class="w-14 h-14 md:w-16 md:h-16 shrink-0 rounded-md border p-1.5 md:p-2 cursor-pointer flex justify-center items-center shadow-md {{ $operator == 'robi' ? 'border-primary bg-primary/10' : 'border-border hover:border-primary' }}">
                    <img src="{{ asset('assets/images/robi.png') }}" alt="logo"
                        class="w-full h-full object-contain">
                </button>

                <button wire:click="filterByOperator('airtel')" type="button"
                    class="w-14 h-14 md:w-16 md:h-16 shrink-0 rounded-md border p-1.5 md:p-2 cursor-pointer flex justify-center items-center shadow-md {{ $operator == 'airtel' ? 'border-primary bg-primary/10' : 'border-border hover:border-primary' }}">
                    <img src="{{ asset('assets/images/airtel-filter.png') }}" alt="logo"
                        class="w-full h-full object-cover">
                </button>

                <button wire:click="filterByOperator('bl')" type="button"
                    class="w-14 h-14 md:w-16 md:h-16 shrink-0 rounded-md border p-1.5 md:p-2 cursor-pointer flex justify-center items-center shadow-md {{ $operator == 'bl' ? 'border-primary bg-primary/10' : 'border-border hover:border-primary' }}">
                    <img src="{{ asset('assets/images/bl-filter.png') }}" alt="logo"
                        class="w-full h-full object-contain">
                </button>

                <button wire:click="filterByOperator('teletalk')" type="button"
                    class="w-14 h-14 md:w-16 md:h-16 shrink-0 rounded-md border p-1.5 md:p-2 cursor-pointer flex justify-center items-center shadow-md {{ $operator == 'teletalk' ? 'border-primary bg-primary/10' : 'border-border hover:border-primary' }}">
                    <img src="{{ asset('assets/images/tt-filter.png') }}" alt="logo"
                        class="w-full h-full object-contain">
                </button>

            </div>

            <div class="border-t border-border block"></div>

            <div
                class="flex items-center justify-between md:justify-center gap-1 md:gap-2 p-1 md:p-1.5 mt-5 bg-card rounded-md border border-border md:w-fit mx-auto shadow-sm divide-x divide-border dark:divide-gray-700 overflow-x-auto w-full whitespace-nowrap scrollbar-none">

                <button wire:click="filterByType('all')"
                    class="flex justify-center w-full md:w-fit md:items-center gap-1 flex-row p-1.5 md:px-2.5 py-1 cursor-pointer text-sm {{ $type == 'all' ? 'bg-primary text-primary-foreground rounded-md' : 'bg-card text-foreground transition-all hover:text-primary ' }}">
                    <i class="ri-stack-line"></i>
                    <span>All</span>
                </button>

                <button wire:click="filterByType('internet')"
                    class="flex justify-center w-full md:w-fit md:items-center gap-1 flex-row  p-1.5 md:px-2.5 py-1  cursor-pointer text-sm {{ $type == 'internet' ? 'bg-primary text-primary-foreground rounded-md' : 'bg-card text-foreground transition-all hover:text-primary ' }}">
                    <i class="ri-wifi-line"></i>
                    <span>Internet</span>
                </button>

                <button wire:click="filterByType('minute')"
                    class="flex justify-center w-full md:w-fit md:items-center gap-1 flex-row  p-1.5 md:px-2.5 py-1 cursor-pointer text-sm {{ $type == 'minute' ? 'bg-primary text-primary-foreground rounded-md' : 'bg-card text-foreground transition-all hover:text-primary ' }}">
                    <i class="ri-phone-line"></i>
                    <span>Minutes</span>
                </button>

                <button wire:click="filterByType('bundle')"
                    class="flex justify-center w-full md:w-fit md:items-center gap-1 flex-row  p-1.5 md:px-2.5 py-1 cursor-pointer text-sm {{ $type == 'bundle' ? 'bg-primary text-primary-foreground rounded-md' : 'bg-card text-foreground transition-all hover:text-primary ' }}">
                    <i class="ri-color-filter-ai-line"></i>
                    <span>Bundle</span>
                </button>

            </div>

        </div>
    </div>



    <main class="px-1.5 md:px-3.5 py-4 space-y-3">
        @if (_adminSettingById(1)->is_drive_active == true)

            @if ($packages->isEmpty())
                <div class="flex items-center justify-center h-full">
                    <div class="text-center">
                        <i class="ri-search-line text-4xl text-gray-500"></i>
                        <p class="mt-2 text-gray-600">No packages found</p>
                    </div>
                </div>
            @endif

            @foreach ($packages as $key => $package)
                <button wire:click="selectedPack({{ $package->id }})"
                    class="flex items-center w-full gap-2 md:gap-3.5 cursor-pointer rounded-2xl border border-border bg-card/70 p-1.5 md:p-3 backdrop-blur-xl transition hover:border-primary/40 shadow-sm hover:shadow-none animate-fade-up"
                    style="animation-delay: {{ $key * 100 }}ms;">
                    <div class="h-12 w-12 shrink-0 rounded-xl border border-border/80 bg-border/30">
                        <img src="{{ asset('assets/images/operator/' . $package->operator . '.webp') }}"
                            alt="{{ $package->operator }}" class="h-full w-full object-cover rounded-lg">
                    </div>

                    <div class="flex-1 text-left flex flex-col">
                        <p class="font-display text-sm font-semibold line-clamp-1">{{ $package->title }}</p>

                        <div class="mt-1 flex w-full justify-between items-center gap-1.5 text-xs">
                            <div class="flex items-center gap-2">
                                <span
                                    class="rounded-full font-medium bg-gray-200/70 dark:bg-gray-300/10 px-2 py-1 text-foreground/60">{{ $package->validity }}
                                    দিন</span>
                                <span
                                    class="rounded-full bg-primary-glow/15 px-2 py-0.5 font-semibold text-primary-glow truncate">{{ ucfirst($package->type) }}</span>

                            </div>
                            <p
                                class="font-display text-base md:text-lg font-bold tabular-nums text-primary tracking-wide">
                                ৳
                                {{ $package->price }}</p>
                        </div>
                    </div>

                </button>
            @endforeach
        @else
            <div class="py-10 text-center">
                <h1 class="text-lg text-foreground/90"><i
                        class="ri-prohibited-line text-3xl! font-black! text-red-500"></i> Drive
                    Package Now Deactivated</h1>
            </div>
        @endif

    </main>



    <!--============= Modal Area =============-->

    <div x-data x-cloak x-show="$wire.showSelectedOffer" x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center p-1 md:p-4 h-full">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-gray-950/60 backdrop-blur-md" wire:click="closeSelectedOffer"></div>

        <!-- Modal -->
        <div x-show="$wire.showSelectedOffer" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-6 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 scale-95"
            class="relative z-10 w-full max-w-lg overflow-hidden rounded-2xl border border-border bg-card text-left shadow-2xl">

            <!-- Header -->
            <div class="relative overflow-hidden bg-linear-to-r from-violet-600 via-indigo-600 to-cyan-500 p-2 md:p-4">
                <!-- Decorative Circles -->
                <div class="absolute -right-8 -top-10 h-28 w-28 rounded-full bg-white/10"></div>
                <div class="absolute -bottom-12 right-12 h-24 w-24 rounded-full bg-white/10"></div>
                <!-- Header Content -->
                <div class="relative flex items-center gap-3">
                    <!-- Icon -->
                    <div
                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl border border-white/20 bg-white/15 text-white shadow-lg backdrop-blur-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-gift h-6 w-6 text-white" aria-hidden="true">
                            <path d="M12 7v14"></path>
                            <path d="M20 11v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-8"></path>
                            <path d="M7.5 7a1 1 0 0 1 0-5A4.8 8 0 0 1 12 7a4.8 8 0 0 1 4.5-5 1 1 0 0 1 0 5"></path>
                            <rect x="3" y="7" width="18" height="4" rx="1"></rect>
                        </svg>
                    </div>

                    <!-- Title -->
                    <div class="min-w-0 flex-1">
                        <h3 class="line-clamp-1 text-base font-semibold text-white">
                            Drive Package Recharge
                        </h3>
                    </div>

                    <!-- Close -->
                    <button type="button" wire:click="closeSelectedOffer"
                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg border border-white/20 bg-white/10 text-white transition-all hover:bg-white/20 cursor-pointer">
                        <i class="ri-close-line text-xl"></i>
                    </button>
                </div>
            </div>

            <form wire:submit="selectPackageSave">
                <!-- Body -->
                <div class="block p-2 md:p-4 space-y-3 md:space-y-7 w-full!">

                    <!-- Offer Info -->
                    <div
                        class="flex items-center w-full gap-3.5 rounded-2xl border border-border bg-background/80 backdrop-blur-md p-1 md:p-3">
                        <div
                            class="grid h-12 w-12 shrink-0 place-items-center rounded-xl overflow-hidden border border-border/80 bg-border/30 p-1">
                            <img src="{{ asset('assets/images/operator/' . $selectedpackage?->operator . '.webp') }}"
                                alt="GR" class="h-full w-full object-cover  rounded-lg">
                        </div>

                        <p class="font-display text-sm font-semibold">{{ $selectedpackage?->title }}</p>

                    </div>
                    <!-- Offer Info -->

                    <div class="block">
                        <span class="mb-1.5 text-sm pl-1.5 block font-normal text-muted-foreground">
                            Mobile Number
                        </span>
                        <input type="text" wire:model="mobile_number" class="input text-foreground"
                            placeholder="01xxxxxxxxx" minlength="11" maxlength="11"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 11)">
                        @error('mobile_number')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <!-- Footer -->
                <div class="flex items-center justify-end border-t border-border bg-card/50 p-2 md:p-4">
                    <button type="submit"
                        class="flex items-center justify-center gap-2 w-full rounded-md gradient-bg px-5 py-3 text-sm font-bold text-primary-foreground shadow-md transition-transform opacity-100 cursor-pointer hover:scale-[1.02] ">
                        <span>Next</span>
                        <i class="ri-arrow-right-line font-black!"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>


    <!-- Order Confirm modal -->
    <div x-data x-cloak x-show="$wire.orderConfirmModal" x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex items-center justify-center p-1 md:p-4">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-gray-950/60 backdrop-blur-md" wire:click="closeOrderConfirmModal"></div>

        <!-- Modal -->
        <div x-show="$wire.orderConfirmModal" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-6 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 scale-95"
            class="relative z-10 w-full max-w-lg overflow-hidden rounded-2xl border border-border bg-card text-left shadow-2xl">

            <!-- Header -->
            <div class="relative overflow-hidden bg-linear-to-r from-violet-600 via-indigo-600 to-cyan-500 p-2 md:p-4">
                <!-- Decorative Circles -->
                <div class="absolute -right-8 -top-10 h-28 w-28 rounded-full bg-white/10"></div>
                <div class="absolute -bottom-12 right-12 h-24 w-24 rounded-full bg-white/10"></div>
                <!-- Header Content -->
                <div class="relative flex items-center gap-3">
                    <!-- Icon -->
                    <div
                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl border border-white/20 bg-white/15  shadow-lg backdrop-blur-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-gift h-6 w-6 text-white" aria-hidden="true">
                            <path d="M12 7v14"></path>
                            <path d="M20 11v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-8"></path>
                            <path d="M7.5 7a1 1 0 0 1 0-5A4.8 8 0 0 1 12 7a4.8 8 0 0 1 4.5-5 1 1 0 0 1 0 5"></path>
                            <rect x="3" y="7" width="18" height="4" rx="1"></rect>
                        </svg>
                    </div>

                    <!-- Title -->
                    <div class="min-w-0 flex-1">
                        <h3 class="line-clamp-1 text-sm md:text-base font-semibold text-white">
                            Veryfy Number
                        </h3>
                        <p class="text-xs md:text-sm font-medium text-white/90">Review details before confirming</p>
                    </div>

                    <!-- Close -->
                    <button type="button" wire:click="closeOrderConfirmModal"
                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg border border-white/20 bg-white/10 text-white transition-all hover:bg-white/20 cursor-pointer">
                        <i class="ri-close-line text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Body -->
            <div class="block md:p-4 p-2 space-y-5 md:space-y-7 w-full!">

                <!-- Offer Info -->
                <div
                    class="flex items-center w-full gap-3.5 rounded-2xl border border-border bg-background/80 backdrop-blur-md p-1 md:p-3">
                    <div
                        class="grid h-12 w-12 shrink-0 place-items-center rounded-xl overflow-hidden border border-border/80 bg-border/30 p-1">
                        <img src="{{ asset('assets/images/operator/' . $selectedpackage?->operator . '.webp') }}"
                            alt="GR" class="h-full w-full object-cover  rounded-lg">
                    </div>

                    <p class="font-display text-sm font-semibold">{{ $selectedpackage?->title }}</p>
                </div>
                <!-- Offer Info -->

                <div class="mb-3.5 rounded-xl bg-background/80 border border-border divide-y divide-border">
                    <div class="flex items-center justify-between gap-3 p-3">
                        <p class="shrink-0 text-xs text-foreground/70">Mobile Number</p>
                        <div class="min-w-0 text-right">
                            <p class="text-sm font-bold text-foreground/90">{{ $mobile_number }}</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between gap-3 p-3">
                        <p class="shrink-0 text-xs text-foreground/70">Operator</p>
                        <div class="min-w-0 text-right">
                            <div class="flex items-center justify-end gap-1.5">
                                <img src="{{ asset('assets/images/operator/' . $selectedpackage?->operator . '.webp') }}"
                                    alt="{{ $selectedpackage?->operator }}" class="h-4.5 w-4.5 object-cover">
                                <p class="text-sm font-semibold text-foreground/90">
                                    {{ ucfirst($selectedpackage?->operator) }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between gap-3 p-3">
                        <p class="shrink-0 text-xs text-foreground/70">Type</p>
                        <div class="min-w-0 text-right">
                            <p class="line-clamp-2 text-sm font-semibold text-foreground/90">
                                {{ ucfirst($selectedpackage?->type) }}</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between gap-3 p-3">
                        <p class="shrink-0 text-xs text-foreground/70">Validity</p>
                        <div class="min-w-0 text-right">
                            <p class="line-clamp-2 text-sm font-semibold text-foreground/90">
                                {{ $selectedpackage?->validity }} দিন </p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between  p-3">
                        <p class="text-xs font-bold text-foreground/70">Amount</p>
                        <p class="text-[15px] font-bold text-primary-glow">{{ $selectedpackage?->price }} Taka</p>
                    </div>

                </div>
            </div>


            <!-- Footer -->
            <div class="flex items-center gap-3 border-t border-border bg-card/50 p-2 md:p-4">
                <button type="submit" wire:click="backToSelectedOffer"
                    class="flex items-center justify-center gap-2 w-fit rounded-md bg-gray-100 dark:bg-gray-500/20 px-5 py-3 text-sm font-bold text-foreground border border-border transition-transform opacity-100 cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-500/40">
                    <i class="ri-arrow-left-line font-black!"></i>
                    <span>Back</span>
                </button>
                <button type="button" wire:click="confirmPurchase"
                    class="flex items-center justify-center gap-2 w-full rounded-md gradient-bg px-2 md:px-5 py-3 text-sm font-bold text-primary-foreground shadow-md transition-transform opacity-100 cursor-pointer hover:scale-[1.02] ">
                    <span>Confirm Purchase</span>
                    <i class="ri-arrow-right-line font-black!"></i>
                </button>
            </div>
        </div>
    </div>

</div>
