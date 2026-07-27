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
            <a href="{{ route('user.settings', 'emran') }}"
                class="w-14 h-14 shrink-0 rounded-xl bg-white/10 border border-white/20 transition-all hover:bg-white/20 backdrop-blur-xl flex items-center justify-center shadow-lg"
                wire:navigate>

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
                    Change Password
                </h2>
                <p class="text-white/80 text-sm">
                    Update your account password
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


    <main class="px-1.5 md:px-3.5 py-4">
        <div class="card">
            <div class="card-header">
                <h3 class="text-lg font-bold font-heading gradient-text">Password Change</h3>
            </div>

            <form wire:submit.prevent="changePassword">
                <div class="card-body space-y-3">

                    <div class="block">
                        <span class="mb-1.5 block text-sm font-medium text-muted-foreground">Current Password</span>
                        <span x-data="{ showPassword: false }"
                            class="flex items-center gap-2 rounded-xl border dark:border-gray-600/50 bg-input/50 px-3 py-2.5 focus-within:border-primary/50 focus-within:ring-1 focus-within:ring-primary/20 ">
                            <span class="text-muted-foreground">
                                <i class="ri-lock-password-line text-lg"></i>
                            </span>
                            <input :type="showPassword ? 'text' : 'password'" placeholder="••••••••"
                                wire:model="current_password"
                                class="w-full bg-transparent text-sm outline-none placeholder:text-muted-foreground/60"
                                type="password">

                            <button type="button" class="text-muted-foreground hover:text-foreground cursor-pointer"
                                aria-label="Toggle password" x-on:click="showPassword = !showPassword">
                                <i class="ri-eye-line" x-show="showPassword" style="display: none;"></i>
                                <i class="ri-eye-off-line" x-show="!showPassword"></i>
                            </button>
                        </span>

                        @error('current_password')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="block">
                        <span class="mb-1.5 block text-sm font-medium text-muted-foreground">New Password</span>
                        <span x-data="{ showPassword: false }"
                            class="flex items-center gap-2 rounded-xl border dark:border-gray-600/50 bg-input/50 px-3 py-2.5 focus-within:border-primary/50 focus-within:ring-1 focus-within:ring-primary/20 ">
                            <span class="text-muted-foreground">
                                <i class="ri-lock-password-line text-lg"></i>
                            </span>
                            <input :type="showPassword ? 'text' : 'password'" placeholder="••••••••"
                                wire:model="new_password"
                                class="w-full bg-transparent text-sm outline-none placeholder:text-muted-foreground/60"
                                type="password">

                            <button type="button" class="text-muted-foreground hover:text-foreground cursor-pointer"
                                aria-label="Toggle password" x-on:click="showPassword = !showPassword">
                                <i class="ri-eye-line" x-show="showPassword" style="display: none;"></i>
                                <i class="ri-eye-off-line" x-show="!showPassword"></i>
                            </button>
                        </span>

                        @error('new_password')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="block">
                        <span class="mb-1.5 block text-sm font-medium text-muted-foreground">Confirm Password</span>
                        <span x-data="{ showPassword: false }"
                            class="flex items-center gap-2 rounded-xl border dark:border-gray-600/50 bg-input/50 px-3 py-2.5 focus-within:border-primary/50 focus-within:ring-1 focus-within:ring-primary/20 ">
                            <span class="text-muted-foreground">
                                <i class="ri-lock-password-line text-lg"></i>
                            </span>
                            <input :type="showPassword ? 'text' : 'password'" placeholder="••••••••"
                                wire:model="confirm_password"
                                class="w-full bg-transparent text-sm outline-none placeholder:text-muted-foreground/60"
                                type="password">

                            <button type="button" class="text-muted-foreground hover:text-foreground cursor-pointer"
                                aria-label="Toggle password" x-on:click="showPassword = !showPassword">
                                <i class="ri-eye-line" x-show="showPassword" style="display: none;"></i>
                                <i class="ri-eye-off-line" x-show="!showPassword"></i>
                            </button>
                        </span>

                        @error('confirm_password')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <button type="submit" wire:loading.attr="disabled" wire:target="changePassword"
                            class="flex items-center justify-center gap-2 w-full rounded-md gradient-bg px-5 py-3 text-sm font-bold text-primary-foreground shadow-md hover:scale-[1.02] transition-transform cursor-pointer">
                            <span wire:loading.remove="" wire:target="changePassword"
                                class="flex items-center justify-center gap-1.5">
                                <i class="ri-save-line"></i>
                                Password Change
                            </span>

                            <span wire:loading="" wire:target="changePassword" class="flex items-center gap-2">
                                <svg class="h-5 w-5 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>

                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                            </span>
                        </button>
                    </div>

                </div>

            </form>
        </div>
    </main>

</div>
