<div class="main-content">

    <div
        class="relative overflow-hidden rounded-b-3xl bg-linear-to-r from-violet-600 via-indigo-600 to-cyan-500 px-2 py-3.5 md:p-5 shadow-2xl">
        <!-- Blur Circles -->
        <div class="absolute -right-5 -top-12 w-30 h-30 bg-white/20 rounded-full">
        </div>
        <div class="absolute right-5 -bottom-10 w-24 h-24 bg-white/10 rounded-full">
        </div>
        <!-- Content -->
        <div class="flex items-center gap-3 md:gap-4">
            <!-- Icon -->
            <div
                class="w-12 h-12 md:w-14 md:h-14 shrink-0 rounded-xl bg-white/10 border border-white/20 transition-all hover:bg-white/20 backdrop-blur-xl flex items-center justify-center shadow-lg">

                <div
                    class="w-8 h-8 md:w-9 md:h-9 shrink-0 rounded-full bg-white/20 flex items-center justify-center text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-truck-loading h-4.5 w-4.5 md:h-5 md:w-5 text-white">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M2 3h1a2 2 0 0 1 2 2v10a2 2 0 0 0 2 2h15" />
                        <path d="M9 9a3 3 0 0 1 3 -3h4a3 3 0 0 1 3 3v2a3 3 0 0 1 -3 3h-4a3 3 0 0 1 -3 -3l0 -2" />
                        <path d="M7 19a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M16 19a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                    </svg>
                </div>
            </div>

            <!-- Text -->
            <div>
                <h2 class="text-white text-base md:text-lg font-bold">
                    Buy History
                </h2>
                <p class="text-white/80 text-sm">
                    History of your purchases
                </p>
            </div>
        </div>
        <!-- Dotted Decoration -->
        <div class="absolute right-30 top-4 grid grid-cols-4 gap-1 md:gap-2 opacity-30">

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

    <main class="px-1.5 md:px-3.5 py-2 md:py-4 space-y-3 md:space-y-5">
        <!-- Filter ARea -->
        <div class="bg-card border border-border rounded-xl p-2 md:p-4 shadow-md">
            <div class="flex items-center gap-2 md:gap-4 overflow-x-auto scrollbar-thin pb-2">
                <button type="button" wire:click="packageFilter('regular')"
                    class="w-full text-left px-2 py-2 md:py-3 whitespace-nowrap rounded-lg text-sm font-semibold border  cursor-pointer flex items-center justify-center gap-2 transition-all {{ $package_type == 'regular' ? 'bg-primary text-white border-primary' : 'text-foreground/80 bg-gray-400/20 border-border hover:bg-primary/10 hover:text-primary hover:border-primary' }}">

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-gift w-4 h-4">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 9a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-16a1 1 0 0 1 -1 -1l0 -2" />
                        <path d="M12 8l0 13" />
                        <path d="M19 12v7a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-7" />
                        <path d="M7.5 8a2.5 2.5 0 0 1 0 -5a4.8 8 0 0 1 4.5 5a4.8 8 0 0 1 4.5 -5a2.5 2.5 0 0 1 0 5" />
                    </svg>

                    Regular Pack
                </button>

                <button type="button" wire:click="packageFilter('drive')"
                    class="w-full text-left px-2 py-2 md:py-3 whitespace-nowrap rounded-lg text-sm font-semibold border  cursor-pointer flex items-center justify-center gap-2 transition-all {{ $package_type == 'drive' ? 'bg-primary text-white border-primary' : 'text-foreground/80 bg-gray-400/20 border-border hover:bg-primary/10 hover:text-primary hover:border-primary' }}">

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

                    Drive Pack
                </button>

                <button type="button" wire:click="packageFilter('gaming_package')"
                    class="w-full text-left px-2 py-2 md:py-3 whitespace-nowrap rounded-lg text-sm font-semibold border  cursor-pointer flex items-center justify-center gap-2 transition-all {{ $package_type == 'gaming_package' ? 'bg-primary text-white border-primary' : 'text-foreground/80 bg-gray-400/20 border-border hover:bg-primary/10 hover:text-primary hover:border-primary' }}">

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-device-gamepad-2 w-4 h-4">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M12 5h3.5a5 5 0 0 1 0 10h-5.5l-4.015 4.227a2.3 2.3 0 0 1 -3.923 -2.035l1.634 -8.173a5 5 0 0 1 4.904 -4.019h3.4" />
                        <path d="M14 15l4.07 4.284a2.3 2.3 0 0 0 3.925 -2.023l-1.6 -8.232" />
                        <path d="M8 9v2" />
                        <path d="M7 10h2" />
                        <path d="M14 10h2" />
                    </svg>

                    Diamond Pack
                </button>
            </div>

        </div>


        <!-- pack list area -->
        <div class="space-y-3">

            @if ($orders->count() == 0)
                <div class="flex items-center justify-center h-full">
                    <div class="text-center">
                        <i class="ri-search-line text-4xl text-gray-500"></i>
                        <p class="mt-2 text-gray-600">No Orders found</p>
                    </div>
                </div>
            @endif

            @foreach ($orders as $key => $order)
                <button type="button" wire:click="orderDetailShow('{{ $order->id }}')"
                    class="w-full text-left p-2 rounded-lg bg-card/80 border border-border cursor-pointer hover:border-primary hover:text-primary transition duration-300 ease-in-out up animate-fade-up"
                    style="animation-delay: {{ $key * 100 }}ms;">

                    <div class="flex items-center justify-between w-full">
                        <div class="flex items-center gap-1.5 md:gap-2">
                            <div class="w-9 h-9 md:w-10 md:h-10 shrink-0 rounded-lg overflow-hidden">
                                @if ($order->order_type === 'sim_package')
                                    <img src="{{ asset('assets/images/operator/' . strtolower($order->operator) . '.webp') }}"
                                        alt="airtel" class="w-full h-full object-cover rounded-lg">
                                @else
                                    <img src="{{ asset('assets/images/icon-diamond.png') }}" alt="airtel"
                                        class="w-full h-full object-cover rounded-lg">
                                @endif
                            </div>
                            <div class="space-y-1">
                                <h3 class="font-semibold text-sm text-foreground/80 line-clamp-1">{{ $order->title }}
                                </h3>
                                <p class="text-xs font-normal text-foreground/60">
                                    {{ $order->created_at->format('d M Y') . ' - ' . $order->created_at->format('h:i A') }}
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between space-y-2 items-end">
                            @if ($order->status == 'pending')
                                <span
                                    class="text-xs font-semibold tracking-wide text-sky-500 capitalize">{{ $order->status }}</span>
                            @elseif ($order->status == 'delivered')
                                <span
                                    class="text-xs font-semibold tracking-wide text-green-500 capitalize">{{ $order->status }}</span>
                            @elseif ($order->status == 'rejected')
                                <span
                                    class="text-xs font-semibold tracking-wide text-rose-500 capitalize">{{ $order->status }}</span>
                            @endif

                            <h6 class="text-sm font-normal text-foreground/70">৳{{ $order->price }}</h6>
                        </div>
                    </div>

                </button>
            @endforeach


        </div>

    </main>



    <!-- Modal Area -->
    <div x-data x-cloak x-show="$wire.showDetails" x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex items-center justify-center p-1 md:p-4">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-gray-950/60 backdrop-blur-md" wire:click="closeDetails"></div>

        <!-- Modal -->
        <div x-show="$wire.showDetails" x-transition:enter="ease-out duration-300"
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
                <div class="relative flex items-center gap-2 md:gap-3">
                    <!-- Icon -->
                    <div
                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl border border-white/20 bg-white/15 shadow-lg backdrop-blur-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-truck-loading w-6 h-6 text-white">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M2 3h1a2 2 0 0 1 2 2v10a2 2 0 0 0 2 2h15" />
                            <path d="M9 9a3 3 0 0 1 3 -3h4a3 3 0 0 1 3 3v2a3 3 0 0 1 -3 3h-4a3 3 0 0 1 -3 -3l0 -2" />
                            <path d="M7 19a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M16 19a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        </svg>

                    </div>

                    <!-- Title -->
                    <div class="min-w-0 flex-1">
                        <h3 class="line-clamp-1 text-base md:text-lg font-semibold text-white">
                            Order Details
                        </h3>
                    </div>

                    <!-- Close -->
                    <button type="button" wire:click="closeDetails"
                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg border border-white/20 bg-white/10 text-white transition-all hover:bg-white/20 cursor-pointer">
                        <i class="ri-close-line text-xl"></i>
                    </button>
                </div>
            </div>


            <!-- Body -->
            <div class="block w-full p-2 md:p-4 space-y-5">

                <!-- Order Item -->
                <div
                    class="flex items-center justify-between w-full p-1.5 md:p-3 bg-background/50 border border-border rounded-lg">
                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 shrink-0 rounded-lg overflow-hidden">
                            @if ($orderDetails?->order_type === 'sim_package')
                                <img src="{{ asset('assets/images/operator/' . $orderDetails?->operator . '.webp') }}"
                                    alt="{{ $orderDetails?->operator }}"
                                    class="w-full h-full object-cover rounded-lg">
                            @else
                                <img src="{{ asset('assets/images/icon-diamond.png') }}" alt="airtel"
                                    class="w-full h-full object-cover rounded-lg">
                            @endif
                        </div>
                        <h3 class="font-semibold text-sm text-foreground/80 ">
                            {{ $orderDetails?->title }}
                        </h3>
                    </div>
                </div>

                <!-- Order Details -->
                <ul class="divide-y divide-border w-full border border-border rounded-2xl bg-background/50">
                    <li class="flex items-center justify-between px-2 py-1.5 md:px-4 md:py-3">
                        <span class="text-sm font-normal text-foreground/80">Order ID</span>
                        <span class="text-sm font-semibold text-emerald-500"># {{ $orderDetails?->order_id }}</span>
                    </li>
                    <li class="flex items-center justify-between px-2 py-1.5 md:px-4 md:py-3">
                        <span class="text-sm font-normal text-foreground/80">Price</span>
                        <span class="text-sm font-semibold text-foreground/90">৳{{ $orderDetails?->price }}</span>
                    </li>
                    <li class="flex items-center justify-between px-2 py-1.5 md:px-4 md:py-3">
                        <span class="text-sm font-normal text-foreground/80">Status</span>
                        @if ($orderDetails?->status == 'pending')
                            <span
                                class="text-xs font-semibold tracking-wide text-sky-500 capitalize">{{ $orderDetails?->status }}</span>
                        @elseif ($orderDetails?->status == 'delivered')
                            <span
                                class="text-xs font-semibold tracking-wide text-green-500 capitalize">{{ $orderDetails?->status }}</span>
                        @elseif ($orderDetails?->status == 'rejected')
                            <span
                                class="text-xs font-semibold tracking-wide text-rose-500 capitalize">{{ $orderDetails?->status }}</span>
                        @endif
                    </li>

                    @if ($orderDetails?->order_type === 'sim_package')
                        <li class="flex items-center justify-between  px-2 py-1.5 md:px-4 md:py-3">
                            <span class="text-sm font-normal text-foreground/80">Number</span>
                            <span
                                class="text-sm font-semibold text-foreground/90">{{ $orderDetails?->offer_number }}</span>
                        </li>

                        <li class="flex items-center justify-between  px-2 py-1.5 md:px-4 md:py-3">
                            <span class="text-sm font-normal text-foreground/80">Package Type</span>
                            <span
                                class="text-sm font-semibold text-foreground/90 capitalize">{{ $orderDetails?->package_type }}</span>
                        </li>

                        <li class="flex items-center justify-between px-2 py-1.5 md:px-4 md:py-3">
                            <span class="text-sm font-normal text-foreground/80">Operator</span>
                            <span class="text-sm font-semibold text-foreground/90 flex items-center gap-2 capitalize">
                                <img src="{{ asset('assets/images/operator/' . $orderDetails?->operator . '.webp') }}"
                                    alt="" class="w-5 h-5 object-cover shrink-0">
                                {{ $orderDetails?->operator }}
                            </span>
                        </li>
                    @endif

                    @if ($orderDetails?->order_type === 'gaming_package')
                        <li class="flex items-center justify-between px-2 py-1.5 md:px-4 md:py-3">
                            <span class="text-sm font-normal text-foreground/80">Game Name</span>
                            <span
                                class="text-sm font-semibold text-foreground/90">{{ $orderDetails?->game_name }}</span>
                        </li>

                        <li class="flex items-center justify-between px-2 py-1.5 md:px-4 md:py-3">
                            <span class="text-sm font-normal text-foreground/80">Player ID</span>
                            <span
                                class="text-sm font-semibold text-foreground/90 capitalize">{{ $orderDetails?->player_id }}</span>
                        </li>
                    @endif

                    <li class="flex items-center justify-between px-2 py-1.5 md:px-4 md:py-3">
                        <span class="text-sm font-normal text-foreground/80">Date & Time</span>
                        <span
                            class="text-sm font-semibold text-foreground/90 capitalize">{{ $orderDetails?->created_at->format('d/m/Y h:i A') }}</span>
                    </li>

                </ul>

            </div>

            <!-- Footer -->
            <div class="flex items-center justify-end border-t border-border bg-card/50 p-2 md:p-4">
                <button type="button" wire:click="closeDetails"
                    class="flex items-center gap-2 rounded-lg bg-airtel px-5 py-2.5 text-sm font-semibold text-white shadow-md transition-all hover:scale-[1.02] hover:shadow-lg cursor-pointer">
                    <i class="ri-check-line"></i>
                    Got it
                </button>
            </div>
        </div>
    </div>


</div>
