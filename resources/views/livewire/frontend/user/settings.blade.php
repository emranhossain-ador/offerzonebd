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
            <div
                class="w-14 h-14 shrink-0 rounded-xl bg-white/10 border border-white/20 backdrop-blur-xl flex items-center justify-center shadow-lg">

                <div class="w-9 h-9 shrink-0 rounded-full bg-white/20 text-white flex items-center justify-center">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                        class="text-lg text-white" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M487.4 315.7l-42.6-24.6c4.3-23.2 4.3-47 0-70.2l42.6-24.6c4.9-2.8 7.1-8.6 5.5-14-11.1-35.6-30-67.8-54.7-94.6-3.8-4.1-10-5.1-14.8-2.3L380.8 110c-17.9-15.4-38.5-27.3-60.8-35.1V25.8c0-5.6-3.9-10.5-9.4-11.7-36.7-8.2-74.3-7.8-109.2 0-5.5 1.2-9.4 6.1-9.4 11.7V75c-22.2 7.9-42.8 19.8-60.8 35.1L88.7 85.5c-4.9-2.8-11-1.9-14.8 2.3-24.7 26.7-43.6 58.9-54.7 94.6-1.7 5.4.6 11.2 5.5 14L67.3 221c-4.3 23.2-4.3 47 0 70.2l-42.6 24.6c-4.9 2.8-7.1 8.6-5.5 14 11.1 35.6 30 67.8 54.7 94.6 3.8 4.1 10 5.1 14.8 2.3l42.6-24.6c17.9 15.4 38.5 27.3 60.8 35.1v49.2c0 5.6 3.9 10.5 9.4 11.7 36.7 8.2 74.3 7.8 109.2 0 5.5-1.2 9.4-6.1 9.4-11.7v-49.2c22.2-7.9 42.8-19.8 60.8-35.1l42.6 24.6c4.9 2.8 11 1.9 14.8-2.3 24.7-26.7 43.6-58.9 54.7-94.6 1.5-5.5-.7-11.3-5.6-14.1zM256 336c-44.1 0-80-35.9-80-80s35.9-80 80-80 80 35.9 80 80-35.9 80-80 80z">
                        </path>
                    </svg>
                </div>
            </div>

            <!-- Text -->
            <div>
                <h2 class="text-white text-lg font-bold">
                    Settings
                </h2>
                <p class="text-white/80 text-sm">
                    Manage your account preferences
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

        <section class="rounded-2xl border border-border bg-card backdrop-blur-xl overflow-hidden">

            <ul class="divide-y divide-border">
                <li>
                    <a href="{{ route('change-password', ['username' => _auth()->username]) }}"
                        class="flex items-center gap-3 py-3 px-4 transition-all hover:bg-muted/70 dark:hover:bg-muted/70"
                        wire:navigate>
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-[#F82769]/10"><svg
                                stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512"
                                class="text-lg text-[#F82769]" height="1em" width="1em"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z">
                                </path>
                            </svg></div>

                        <span class="flex-1 text-sm font-semibold">Change Password</span>

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-chevron-right h-4 w-4 text-muted-foreground group-hover:text-foreground"
                            aria-hidden="true">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>

                    </a>
                </li>

                {{-- <li>
                    <a href="{{ route('notification-settings', ['username' => _auth()->username]) }}"
                        class="flex items-center gap-3 py-3 px-4 transition-all hover:bg-muted/70 dark:hover:bg-muted/70"
                        wire:navigate>
                        <div
                            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-amber-50 dark:bg-amber-900/20">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512"
                                class="text-lg text-amber-600 dark:text-amber-400" height="1em" width="1em"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64zm215.39-149.71c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71z">
                                </path>
                            </svg>
                        </div>

                        <span class="flex-1 text-sm font-semibold">Notification Settings</span>

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-chevron-right h-4 w-4 text-muted-foreground group-hover:text-foreground"
                            aria-hidden="true">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>

                    </a>
                </li> --}}

                <li>
                    <div class="flex items-center justify-between gap-3 py-3 px-4 transition-all w-full" wire:navigate>
                        <div class="flex items-center gap-3">
                            <div
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-purple-50 dark:bg-purple-900/20">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                                    class="text-lg text-purple-600 dark:text-purple-400" height="1em" width="1em"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M283.211 512c78.962 0 151.079-35.925 198.857-94.792 7.068-8.708-.639-21.43-11.562-19.35-124.203 23.654-238.262-71.576-238.262-196.954 0-72.222 38.662-138.635 101.498-174.394 9.686-5.512 7.25-20.197-3.756-22.23A258.156 258.156 0 0 0 283.211 0c-141.309 0-256 114.511-256 256 0 141.309 114.511 256 256 256z">
                                    </path>
                                </svg>
                            </div>

                            <span class="text-sm font-semibold">Dark Mode</span>
                        </div>

                        <div class="flex shrink-0 items-center gap-2">
                            <div x-data="{ checked: (document.cookie.split('; ').find(row => row.startsWith('dark_mode='))?.split('=')[1] ?? 'true') === 'true' }" class="relative cursor-pointer"
                                @click="checked = !checked; document.cookie = 'dark_mode=' + checked + '; path=/; max-age=31536000'; if (checked) { document.documentElement.classList.add('dark'); } else { document.documentElement.classList.remove('dark'); }">
                                <div :class="checked ? 'bg-primary' : ''"
                                    class="w-11 h-6 flex shrink-0 bg-muted-foreground/80 rounded-full shadow-md transition-colors">
                                </div>

                                <div :class="checked ? 'translate-x-full bg-white' : ''"
                                    class="absolute left-0.5 top-1/2 -translate-y-1/2 shrink-0 w-5 h-5 bg-background rounded-full shadow-md transition-all">
                                </div>
                            </div>
                        </div>

                    </div>
                </li>

                <li>
                    <a href="{{ route('contact', ['username' => _auth()->username]) }}"
                        class="flex items-center gap-3 py-3 px-4 transition-all hover:bg-muted/70 dark:hover:bg-muted/70"
                        wire:navigate>
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-cyan-500/10">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                                class="text-lg text-cyan-500" height="1em" width="1em"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d=" M192 208c0-17.67-14.33-32-32-32h-16c-35.35 0-64 28.65-64 64v48c0 35.35 28.65 64
                                64 64h16c17.67 0 32-14.33 32-32V208zm176 144c35.35 0 64-28.65
                                64-64v-48c0-35.35-28.65-64-64-64h-16c-17.67 0-32 14.33-32 32v112c0 17.67 14.33 32 32
                                32h16zM256 0C113.18 0 4.58 118.83 0 256v16c0 8.84 7.16 16 16 16h16c8.84 0 16-7.16
                                16-16v-16c0-114.69 93.31-208 208-208s208 93.31 208 208h-.12c.08 2.43.12 165.72.12 165.72
                                0 23.35-18.93 42.28-42.28 42.28H320c0-26.51-21.49-48-48-48h-32c-26.51 0-48 21.49-48
                                48s21.49 48 48 48h181.72c49.86 0 90.28-40.42 90.28-90.28V256C507.42 118.83 398.82 0 256
                                0z">
                                </path>
                            </svg>
                        </div>

                        <span class="flex-1 text-sm font-semibold">Contact</span>

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-chevron-right h-4 w-4 text-muted-foreground group-hover:text-foreground"
                            aria-hidden="true">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>

                    </a>
                </li>

            </ul>
        </section>

    </main>

</div>
