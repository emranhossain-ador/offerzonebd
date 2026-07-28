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
            <a href="{{ route('user.home', ['username' => $username]) }}"
                class="w-12 h-12 md:w-14 md:h-14 shrink-0 rounded-xl bg-white/10 border border-white/20 transition-all hover:bg-white/20 backdrop-blur-xl flex items-center justify-center shadow-lg"
                wire:navigate>

                <div
                    class="w-8 h-8 md:w-9 md:h-9 shrink-0 rounded-full bg-white/20 flex items-center justify-center text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-arrow-left h-4.5 w-4.5 md:h-5 md:w-5"
                        aria-hidden="true" data-tsd-source="/src/components/app/PageHero.tsx:15:13">
                        <path d="m12 19-7-7 7-7"></path>
                        <path d="M19 12H5"></path>
                    </svg>
                </div>
            </a>

            <!-- Text -->
            <div class="flex-1">
                <h2 class="text-white text-base md:text-lg font-bold">
                    Notifications
                </h2>
                <p class="text-white/80 text-sm">
                    Stay updated with alerts
                </p>
            </div>

            <div class="shrink-0 rounded-full bg-white/20 px-3 py-1.5 text-right backdrop-blur-sm">
                <p class="text-[10px] text-black/70">Unread</p>
                <p class="text-[11px] font-bold text-gray-800">{{ $this->unreadCount }}</p>
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


    <main class="px-1.5 md:px-3.5 py-2 md:py-4 space-y-4">

        @if ($this->notifications->isNotEmpty())
            <!-- Action btn -->
            <div class="flex items-center gap-3.5">
                <a href="{{ route('notification-page', ['username' => $username]) }}" wire:navigate
                    class="px-5.5 py-2 w-full md:w-fit bg-card/80 border border-border rounded-md shadow-sm flex items-center gap-2.5 text-sm font-semibold text-foreground transition-all hover:text-primary hover:border-primary cursor-pointer">
                    <i class="ri-loop-right-line font-normal! text-lg"></i>
                    Refrash
                </a>
                <button type="button" wire:click="deleteAllNotifications()"
                    class="px-5.5 py-2 w-full md:w-fit bg-card/80 border border-border rounded-md shadow-sm flex items-center gap-2.5 text-sm font-semibold text-red-500 transition-all hover:border-red-500 cursor-pointer">
                    <i class="ri-delete-bin-line font-normal! text-lg text-red-500"></i>
                    Delete All
                </button>
            </div>


            <!-- Notification List -->
            <div wire:poll.3s class="space-y-2">

                @foreach ($this->notifications as $key => $notification)
                    <button type="button" wire:click="viewNotification('{{ $notification->id }}')"
                        class="w-full rounded-xl border bg-card/80 backdrop-blur-md px-3 py-2.5 text-left shadow-sm transition-all cursor-pointer animate-fade-up {{ $notification->is_seen == 1 ? 'border-border' : 'border-primary/50' }}"
                        style="animation-delay: {{ $key * 100 }}ms;">

                        @if ($notification->is_seen == 0)
                            <span class="absolute right-2 flex size-2">
                                <span class="relative inline-flex size-2 rounded-full bg-primary"></span>
                            </span>
                        @endif


                        <div class="flex items-center gap-2.5">
                            <div
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg {{ $notification->is_seen == 1 ? 'bg-gray-400/20' : 'bg-orange-500/10' }}">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512"
                                    class="text-sm {{ $notification->is_seen == 1 ? 'text-gray-600 dark:text-gray-200/80' : 'dark:text-orange-400 text-orange-500' }}"
                                    height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64zm215.39-149.71c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71z">
                                    </path>
                                </svg>
                            </div>

                            <div class="min-w-0 flex-1">
                                <h3 class="line-clamp-1 text-xs font-bold text-foreground">
                                    {{ $notification->title }}
                                </h3>
                                <p class="line-clamp-1 text-[11px] leading-snug text-foreground/80 ">
                                    {{ $notification->description }}
                                </p>
                                <div class="mt-0.5 flex items-center justify-between">
                                    <span class="text-[10px] text-foreground/60">
                                        {{ $notification->created_at->format('d M, Y h:i A') }}
                                    </span>
                                    <span role="button" wire:click.stop="deleteNotification({{ $notification->id }})"
                                        class="flex h-6 w-6 items-center justify-center rounded-md text-foreground/70 transition-colors hover:bg-red-50 hover:text-red-500 dark:hover:bg-red-900/20">
                                        <i class="ri-delete-bin-line"></i>
                                    </span>
                                </div>
                            </div>

                        </div>
                    </button>
                @endforeach

            </div>
        @else
            <div class="flex items-center justify-center h-full">
                <div class="text-center">
                    <i class="ri-search-line text-4xl text-gray-500"></i>
                    <p class="mt-2 text-gray-600">No Notification found</p>
                </div>
            </div>
        @endif

    </main>


    <!-- Notification Modal -->
    <div x-data x-cloak x-show="$wire.showNotification" x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex items-center justify-center p-1 md:p-4">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-gray-950/60 backdrop-blur-md" wire:click="closeNotification"></div>

        <!-- Modal -->
        <div x-show="$wire.showNotification" x-transition:enter="ease-out duration-300"
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
                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl border border-white/20 bg-white/15 text-white shadow-lg backdrop-blur-md">
                        <i class="ri-notification-3-line text-xl"></i>
                    </div>

                    <!-- Title -->
                    <div class="min-w-0 flex-1">
                        <h3 class="line-clamp-2 text-sm font-normal md:font-bold text-white">
                            {{ $selectedNotification?->title }}
                        </h3>
                        <p class="mt-1 text-xs text-white/70">
                            {{ $selectedNotification?->created_at?->format('d M, Y h:i A') }}
                        </p>
                    </div>

                    <!-- Close -->
                    <button type="button" wire:click="closeNotification"
                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg border border-white/20 bg-white/10 text-white transition-all hover:bg-white/20 cursor-pointer">
                        <i class="ri-close-line text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Body -->
            <div class="p-2 md:p-4">
                <div class="rounded-xl border border-border bg-background/50 p-2 md:p-4">
                    <p class="text-sm leading-7 text-foreground/80">
                        {{ $selectedNotification?->description }}
                    </p>
                </div>
            </div>


            <!-- Footer -->
            <div class="flex items-center justify-end border-t border-border bg-card/50 p-2 md:p-4">
                <button type="button" wire:click="closeNotification"
                    class="flex items-center gap-2 rounded-lg bg-airtel px-5 py-2.5 text-sm font-semibold text-white shadow-md transition-all hover:scale-[1.02] hover:shadow-lg cursor-pointer">
                    <i class="ri-check-line"></i>
                    Got it
                </button>
            </div>
        </div>
    </div>

</div>
