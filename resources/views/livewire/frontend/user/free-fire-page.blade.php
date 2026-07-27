<div class="main-content">

    <div
        class="relative overflow-hidden rounded-b-3xl bg-linear-to-r from-violet-600 via-indigo-600 to-cyan-500 p-5 shadow-2xl">
        <!-- Blur Circles -->
        <div class="absolute -right-5 -top-12 w-30 h-30 bg-white/20 rounded-full">
        </div>
        <div class="absolute right-5 -bottom-10 w-24 h-24 bg-white/10 rounded-full">
        </div>
        <!-- Content -->
        <div class="flex items-center gap-4">
            <!-- Icon -->
            <a href="{{ route('user.home', ['username' => $username]) }}"
                class="w-14 h-14 shrink-0 rounded-xl bg-white/10 border border-white/20 transition-all hover:bg-white/20 backdrop-blur-xl flex items-center justify-center shadow-lg"
                wire:navigate="">

                <div class="w-9 h-9 shrink-0 rounded-full bg-white/20 flex items-center justify-center text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-arrow-left h-5 w-5" aria-hidden="true"
                        data-tsd-source="/src/components/app/PageHero.tsx:15:13">
                        <path d="m12 19-7-7 7-7"></path>
                        <path d="M19 12H5"></path>
                    </svg>
                </div>
            </a>

            <!-- Text -->
            <div>
                <h2 class="text-white text-lg font-bold">
                    Free Fire Diamonds
                </h2>
                <p class="text-white/80 text-sm">
                    Choose your package
                </p>
            </div>
        </div>
        <!-- Dotted Decoration -->
        <div class="absolute right-30 top-4 grid grid-cols-4 gap-2 opacity-30">

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



    <main class="px-1.5 md:px-3.5 py-4 space-y-3">

        @if ($packages->isEmpty())
            <div class="flex items-center justify-center h-full">
                <div class="text-center">
                    <i class="ri-search-line text-4xl text-gray-500"></i>
                    <p class="mt-2 text-gray-600">No packages found</p>
                </div>
            </div>
        @else
            <!-- package List -->
            <div class="space-y-3">
                @foreach ($packages as $key => $package)
                    <button type="button" wire:click="selectPackage({{ $package->id }})"
                        class="flex items-center w-full gap-3.5 cursor-pointer rounded-2xl border border-border p-3 transition hover:border-primary/40 shadow-sm hover:shadow-none bg-card/70 animate-fade-up"
                        style="animation-delay: {{ $key * 100 }}ms;">
                        <div class="h-12 w-12 shrink-0 rounded-xl border border-border/80 bg-border/30">
                            <img src="{{ asset('assets/images/icon-diamond.png') }}" alt="diamond"
                                class="h-full w-full object-cover rounded-lg drop-shadow-[0_0_8px_#00a9ff]">
                        </div>

                        <div class="flex-1 text-left">
                            <p class="truncate font-display text-sm font-semibold">{{ $package->title }}</p>
                            <p class="font-display text-lg font-bold tabular-nums text-primary tracking-wide">৳
                                {{ number_format($package->price, 2) }}</p>
                        </div>
                    </button>
                @endforeach
            </div>

        @endif

    </main>



    <!--============= Modal Area =============-->

    <div x-data x-cloak x-show="$wire.showSelectedOffer" x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex items-center justify-center p-4 h-full">
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
            <div class="relative overflow-hidden bg-linear-to-r from-violet-600 via-indigo-600 to-cyan-500 p-3 md:p-5">
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
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-diamond w-6 h-6 text-white">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M6 5h12l3 5l-8.5 9.5a.7 .7 0 0 1 -1 0l-8.5 -9.5l3 -5" />
                            <path d="M10 12l-2 -2.2l.6 -1" />
                        </svg>
                    </div>

                    <!-- Title -->
                    <div class="min-w-0 flex-1">
                        <h3 class="line-clamp-1 text-base font-semibold text-white">
                            Free Fire Diamond Package
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
                <div class="block p-3 md:p-4 space-y-7 w-full!">

                    <!-- Offer Info -->
                    <div
                        class="flex items-center w-full gap-3.5 rounded-2xl border border-border bg-background/80 backdrop-blur-md p-3">
                        <div class="h-12 w-12 shrink-0 rounded-xl border border-border/80 bg-border/30">
                            <img src="{{ asset('assets/images/icon-diamond.png') }}" alt="diamond"
                                class="h-full w-full object-cover rounded-lg drop-shadow-[0_0_8px_#00a9ff]">
                        </div>

                        <div class="flex-1 text-left">
                            <p class="truncate font-display text-sm font-semibold text-foreground/90">
                                {{ $selectedpackage?->title }}</p>
                            <p class="font-display text-lg font-bold tabular-nums text-primary tracking-wide">৳
                                {{ number_format($selectedpackage?->price, 2) }}</p>
                        </div>
                    </div>
                    <!-- Offer Info -->

                    <div class="space-y-4">
                        <div class="block">
                            <span class="mb-1.5 text-sm pl-1.5 block font-normal text-muted-foreground">
                                Game Name <span class="text-red-500 font-bold text-sm">*</span>
                            </span>
                            <input type="text" class="input text-foreground" wire:model="game_name"
                                placeholder="Enter your game name...">

                            @error('game_name')
                                <span class="text-red-500 font-medium text-xs mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="block">
                            <span class="mb-1.5 text-sm pl-1.5 block font-normal text-muted-foreground">
                                Player ID <span class="text-red-500 font-bold text-sm">*</span>
                            </span>
                            <input type="text" class="input text-foreground" wire:model="player_id"
                                placeholder="Enter your player id...">

                            @error('player_id')
                                <span class="text-red-500 font-medium text-xs mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


                <!-- Footer -->
                <div
                    class="flex items-center justify-end border-t border-border bg-card/50  px-3 md:px-5 py-2.5 md:py-4">
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
        x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex items-center justify-center p-4">
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
            <div class="relative overflow-hidden bg-linear-to-r from-violet-600 via-indigo-600 to-cyan-500 p-3 md:p-5">
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
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-diamond w-6 h-6 text-white">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M6 5h12l3 5l-8.5 9.5a.7 .7 0 0 1 -1 0l-8.5 -9.5l3 -5" />
                            <path d="M10 12l-2 -2.2l.6 -1" />
                        </svg>
                    </div>

                    <!-- Title -->
                    <div class="min-w-0 flex-1">
                        <h3 class="line-clamp-1 text-base font-semibold text-white">
                            Veryfy Number
                        </h3>
                        <p class="text-sm font-medium text-white/90">Review details before confirming</p>
                    </div>

                    <!-- Close -->
                    <button type="button" wire:click="closeOrderConfirmModal"
                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg border border-white/20 bg-white/10 text-white transition-all hover:bg-white/20 cursor-pointer">
                        <i class="ri-close-line text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Body -->
            <div class="block p-3 md:p-4 space-y-7 w-full!">

                <!-- Offer Info -->
                <div
                    class="flex items-center w-full gap-3.5 rounded-2xl border border-border bg-background/80 backdrop-blur-md p-3">
                    <div class="h-12 w-12 shrink-0 rounded-xl border border-border/80 bg-border/30">
                        <img src="{{ asset('assets/images/icon-diamond.png') }}" alt="diamond"
                            class="h-full w-full object-cover rounded-lg drop-shadow-[0_0_8px_#00a9ff]">
                    </div>

                    <div class="flex-1 text-left">
                        <p class="truncate font-display text-sm font-semibold text-foreground/90">
                            {{ $selectedpackage?->title }}</p>
                        <p class="font-display text-lg font-bold tabular-nums text-primary tracking-wide">৳
                            {{ number_format($selectedpackage?->price, 2) }}</p>
                    </div>
                </div>
                <!-- Offer Info -->

                <div class="bg-background/60 rounded-2xl border border-border px-4 py-3">
                    <ul class="divide-y divide-border/70">
                        <li class="flex items-center justify-between py-2.5">
                            <span class="text-xs font-normal text-foreground/80 tracking-wide">Game
                                Name</span>
                            <span class="text-sm font-semibold text-foreground">{{ $game_name }}</span>
                        </li>
                        <li class="flex items-center justify-between py-2.5">
                            <span class="text-xs font-normal text-foreground/80 tracking-wide">Player
                                ID</span>
                            <span class="text-sm font-semibold text-foreground">{{ $player_id }}</span>
                        </li>
                        <li class="flex items-center justify-between py-2.5">
                            <span class="text-xs font-normal text-foreground/80 tracking-wide">Package</span>
                            <span class="text-sm font-semibold text-foreground">
                                {{ $selectedpackage?->title }}</span>
                        </li>
                        <li class="flex items-center justify-between py-2.5">
                            <span class="text-sm font-bold text-foreground">Total</span>
                            <span class="text-sm font-bold text-primary">
                                ৳{{ number_format($selectedpackage?->price, 2) }}</span>
                        </li>
                    </ul>
                </div>
            </div>


            <!-- Footer -->
            <div class="flex items-center gap-3 border-t border-border bg-card/50 px-3 md:px-5 py-2.5 md:py-4">
                <button type="submit" wire:click="backToSelectedOffer"
                    class="flex items-center justify-center gap-2 w-fit rounded-md bg-gray-100 dark:bg-gray-500/20 px-5 py-3 text-sm font-bold text-foreground border border-border transition-transform opacity-100 cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-500/40">
                    <i class="ri-arrow-left-line font-black!"></i>
                    <span>Back</span>
                </button>
                <button type="button" wire:click="confirmPurchase"
                    class="flex items-center justify-center gap-2 w-full rounded-md gradient-bg px-5 py-3 text-sm font-bold text-primary-foreground shadow-md transition-transform opacity-100 cursor-pointer hover:scale-[1.02] ">
                    <span>Confirm Purchase</span>
                    <i class="ri-arrow-right-line font-black!"></i>
                </button>
            </div>
        </div>
    </div>






</div>
