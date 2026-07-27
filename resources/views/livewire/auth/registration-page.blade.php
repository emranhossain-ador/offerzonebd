<div>
    <main class="wrapper">

        <!-- Register Form -->
        <div
            class="rounded-3xl border border-border bg-card/80 p-6 backdrop-blur sm:p-8 animate-fade-up max-w-2xl mx-auto">


            <div class="mb-6 mt-3">
                <h2 class="font-display text-2xl font-bold sm:text-3xl">
                    Create <span class="gradient-text">Account</span>
                </h2>
                <p class="mt-1 text-sm text-muted-foreground">
                    Already have an account? <a href="{{ route('login') }}"
                        class="font-semibold text-primary hover:underline" wire:navigate>Login</a>
                </p>
            </div>

            <form wire:submit.prevent="register" class="space-y-4">

                <!-- Name & Username Filt -->
                <div class="grid gap-4 sm:grid-cols-2">
                    <div class="">
                        <span class="mb-1.5 block text-sm font-medium text-muted-foreground">Full Name
                            <span class="text-red-500">*</span>
                        </span>
                        <div
                            class="relative justify-end w-full flex items-center gap-2 rounded-xl border dark:border-gray-600/50 bg-input/50 px-3 py-2.5 focus-within:border-primary/50 focus-within:ring-1 focus-within:ring-primary/20 @error('name') border-red-500! @enderror">

                            <span class="text-muted-foreground">
                                <i class="fa-regular fa-user"></i>
                            </span>

                            <input type="text" placeholder="Your Full Name" wire:model="name"
                                class="w-full bg-transparent text-sm outline-none placeholder:text-muted-foreground/60 pr-8">

                            @error('name')
                                <span class="absolute right-[8px]! top-1/2 -translate-y-1/2 z-10">
                                    <i class="ri-information-line text-red-500"></i>
                                </span>
                            @enderror

                        </div>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="block">
                        <span class="mb-1.5 block text-sm font-medium text-muted-foreground">Username <span
                                class="text-red-500">*</span> </span>
                        <div
                            class="relative justify-end flex items-center gap-2 rounded-xl border dark:border-gray-600/50 bg-input/50 px-3 py-2.5 focus-within:border-primary/50 focus-within:ring-1 focus-within:ring-primary/20  @error('username') border-red-500! @enderror">
                            <span class="text-muted-foreground">
                                <i class="fa-solid fa-user-secret"></i>
                            </span>
                            <input type="text" placeholder="Your Username" wire:model="username"
                                class="w-full bg-transparent text-sm outline-none placeholder:text-muted-foreground/60">

                            @error('username')
                                <span class="absolute right-[8px]! top-1/2 -translate-y-1/2 z-10">
                                    <i class="ri-information-line text-red-500"></i>
                                </span>
                            @enderror
                        </div>
                        @error('username')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <!-- Email Filt -->
                <div class="block">
                    <span class="mb-1.5 block text-sm font-medium text-muted-foreground">Email <span
                            class="text-red-500">*</span></span>
                    <div
                        class="relative justify-end flex items-center gap-2 rounded-xl border dark:border-gray-600/50 bg-input/50 px-3 py-2.5 focus-within:border-primary/50 focus-within:ring-1 focus-within:ring-primary/20  @error('email') border-red-500! @enderror">
                        <span class="text-muted-foreground">
                            <i class="fa-regular fa-envelope"></i>
                        </span>
                        <input type="email" placeholder="you@email.com" wire:model="email"
                            class="w-full bg-transparent text-sm outline-none placeholder:text-muted-foreground/60">

                        @error('email')
                            <span class="absolute right-[8px]! top-1/2 -translate-y-1/2 z-10">
                                <i class="ri-information-line text-red-500"></i>
                            </span>
                        @enderror
                    </div>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone Number Filt -->
                <div class="block">
                    <span class="mb-1.5 block text-sm font-medium text-muted-foreground">Phone</span>
                    <div
                        class="relative justify-end flex items-center gap-2 rounded-xl border border-border dark:border-gray-600/50 bg-input/50 px-3 py-2.5 focus-within:border-primary/50 focus-within:ring-1 focus-within:ring-primary/20">
                        <span class="text-muted-foreground">
                            <i class="fa-solid fa-phone"></i>
                        </span>
                        <input type="tel" placeholder="123-456-7890" wire:model="phone"
                            class="w-full bg-transparent text-sm outline-none placeholder:text-muted-foreground/60">
                    </div>
                </div>

                <!-- Password Filt -->
                <div class="grid gap-4 sm:grid-cols-2">
                    <div class="block">
                        <span class="mb-1.5 block text-sm font-medium text-muted-foreground">Password <span
                                class="text-red-500">*</span></span>
                        <div x-data="{ showPassword: false }"
                            class="relative flex items-center justify-end gap-2 rounded-xl border dark:border-gray-600/50 bg-input/50 px-3 py-2.5 focus-within:border-primary/50 focus-within:ring-1 focus-within:ring-primary/20  @error('password') border-red-500! @enderror">
                            <span class="text-muted-foreground">
                                <i class="ri-lock-password-line text-lg"></i>
                            </span>
                            <input :type="showPassword ? 'text' : 'password'" placeholder="••••••••"
                                wire:model="password"
                                class="w-full bg-transparent text-sm outline-none placeholder:text-muted-foreground/60">

                            <button type="button" class="text-muted-foreground hover:text-foreground cursor-pointer"
                                aria-label="Toggle password" x-on:click="showPassword = !showPassword">
                                <i class="ri-eye-line" x-show="!showPassword"></i>
                                <i class="ri-eye-off-line" x-show="showPassword"></i>
                            </button>

                            @error('password')
                                <span class="absolute right-[8px]! top-1/2 -translate-y-1/2 z-10">
                                    <i class="ri-information-line text-red-500"></i>
                                </span>
                            @enderror

                        </div>

                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="block">
                        <span class="mb-1.5 block text-sm font-medium text-muted-foreground">Confirm Password <span
                                class="text-red-500">*</span></span>
                        <div x-data="{ showPassword: false }"
                            class="relative flex items-center justify-end gap-2 rounded-xl border dark:border-gray-600/50 bg-input/50 px-3 py-2.5 focus-within:border-primary/50 focus-within:ring-1 focus-within:ring-primary/20  @error('password_confirmation') border-red-500! @enderror">
                            <span class="text-muted-foreground">
                                <i class="ri-lock-password-line text-lg"></i>
                            </span>
                            <input :type="showPassword ? 'text' : 'password'" placeholder="••••••••"
                                wire:model="password_confirmation"
                                class="w-full bg-transparent text-sm outline-none placeholder:text-muted-foreground/60">

                            <button type="button" class="text-muted-foreground hover:text-foreground cursor-pointer"
                                aria-label="Toggle password" x-on:click="showPassword = !showPassword">
                                <i class="ri-eye-line" x-show="!showPassword"></i>
                                <i class="ri-eye-off-line" x-show="showPassword"></i>
                            </button>

                            @error('password_confirmation')
                                <span class="absolute right-[8px]! top-1/2 -translate-y-1/2">
                                    <i class="ri-information-line text-red-500"></i>
                                </span>
                            @enderror

                        </div>
                        @error('password_confirmation')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-16">
                    <button type="submit" wire:loading.attr="disabled" wire:target="register"
                        class="group flex w-full cursor-pointer items-center justify-center gap-2 rounded-xl gradient-bg px-4 py-3 text-sm font-semibold text-primary-foreground shadow-lg transition-transform hover:scale-[1.01]">
                        <span wire:loading.remove wire:target="register" class="flex items-center gap-2">
                            <i class="ri-user-add-line"></i>
                            Register
                        </span>

                        <span wire:loading wire:target="register" class="flex items-center gap-2">
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

            </form>

        </div>


    </main>
</div>
