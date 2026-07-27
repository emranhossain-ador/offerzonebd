<!-- ===== Header Start ===== -->
<header class="sticky top-0 z-50 flex w-full border-border bg-sidebar border-b">
    <div class="flex grow items-center justify-between py-3 px-3 md:px-6">
        <!-- Hamburger Toggle BTN -->
        <button @click.prevent.stop="sidebarToggle = true"
            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-[10px] lg:hidden cursor-pointer border border-border text-sidebar-foreground">
            <i class="ri-menu-3-line"></i>
        </button>
        <!-- Hamburger Toggle BTN -->

        <!-- View Site Btn -->
        <a href="{{ route('home') }}" target="_blank"
            class="ml-2 flex items-center gap-1.5 px-2.5 py-1.5 rounded-md bg-primary/10 border border-primary/20 hover:bg-primary/20 text-primary whitespace-nowrap text-sm font-semibold">
            <i class="ri-eye-line"></i> <span class="hidden md:block">View Site</span>
        </a>
        <!-- View Site Btn -->


        <div class="flex items-center w-full justify-end gap-2 md:gap-4">

            <!-- Dark Mode Toggler -->
            <div x-data="{ dark: false }" x-init="dark = localStorage.getItem('theme') === 'dark';
            document.documentElement.classList.toggle('dark', dark)">

                <button
                    @click=" dark = !dark;
                        localStorage.setItem('theme', dark ? 'dark' : 'light');
                        document.documentElement.classList.toggle('dark', dark); "
                    class="flex h-9 w-9 shrink-0 cursor-pointer items-center justify-center rounded-full border border-border dark:bg-background bg-white text-primary text-lg group">

                    <!-- Sun Icon -->
                    <span class="absolute transition-all duration-500"
                        :class="dark ? 'opacity-0 scale-50 rotate-90' : 'opacity-100 scale-100 rotate-0'">
                        <i class="ri-sun-line text-lg group-hover:scale-110 transition-transform"></i>
                    </span>

                    <!-- Moon Icon -->
                    <span class="absolute transition-all duration-500"
                        :class="dark ? 'opacity-100 scale-100 rotate-0' : 'opacity-0 scale-50 -rotate-90'" x-clock>
                        <i class="ri-moon-clear-line text-lg group-hover:scale-110 transition-transform"></i>
                    </span>
                </button>
            </div>

            <!-- Notification Menu Area -->
            <livewire:admin.notifications-dropdown-menu />
            <!-- Notification Menu Area -->

            <!-- User Area -->
            <div class="relative" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
                <button type="button"
                    class="flex items-center gap-2 text-foreground dark:bg-background bg-white px-2 py-1.5 rounded-lg border border-border cursor-pointer"
                    @click.prevent="dropdownOpen = ! dropdownOpen">
                    <span class=" h-7 w-7 overflow-hidden rounded-full">
                        @if (_auth()->images)
                            <img src="{{ Storage::url(_auth()->images) }}" alt="User" />
                        @else
                            <img src="{{ asset('assets/images/avatar.png') }}" alt="User" />
                        @endif
                    </span>

                    <span class="text-sm mr-1 block font-medium"> {{ explode(' ', _auth()->name)[0] }} </span>

                    <i :class="dropdownOpen && 'rotate-180'" class="ri-arrow-down-s-line"></i>
                </button>

                <!-- Dropdown Start -->
                <div x-show="dropdownOpen" x-cloak x-transition :class="dropdownOpen ? '' : 'hidden'">
                    <div
                        class="shadow-md dark:bg-gray-dark absolute right-0 mt-5 flex w-[260px] flex-col rounded-xl border border-border bg-white dark:bg-sidebar p-3">
                        <div class="flex items-center gap-2.5">

                            @if (_auth()->images)
                                <img src="{{ Storage::url(_auth()->images) }}" alt="avatar"
                                    class="w-9 h-9 shrink-0 rounded-full object-cover">
                            @else
                                <img src="{{ asset('assets/images/avatar.png') }}" alt="avatar"
                                    class="w-9 h-9 shrink-0 rounded-full object-cover">
                            @endif

                            <div>
                                <span class="text-sm font-medium text-foreground">
                                    {{ _auth()->name }}
                                </span>
                                <span class="text-xs mt-0.5 block text-foreground">
                                    {{ _auth()->email }}
                                </span>
                            </div>
                        </div>

                        <ul class="flex flex-col gap-1 border-b border-border pt-4 pb-3">

                            <li>
                                <a href="{{ route('admin.profile') }}"
                                    class="group text-sm flex items-center gap-1.5 rounded-md px-3 py-2 font-medium text-muted-foreground hover:bg-gray-100 dark:hover:bg-white/10 hover:text-primary group">
                                    <span
                                        class="w-5 h-5 text-muted-foreground group-hover:text-primary flex items-center justify-center">
                                        <i class="ri-account-circle-line text-xl"></i>
                                    </span>
                                    My profile
                                </a>
                            </li>

                            {{-- <li>
                            <a href="profile.html" class="group text-sm flex items-center gap-1.5 rounded-md px-3 py-2 font-medium text-muted-foreground hover:bg-gray-100 dark:hover:bg-white/10 hover:text-primary group">
                                <span class="w-5 h-5 text-muted-foreground group-hover:text-primary flex items-center justify-center">
                                    <i class="ri-settings-2-line text-xl"></i>
                                </span>
                                Site Settings
                            </a>
                        </li> --}}

                        </ul>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="group w-full text-sm mt-2 flex items-center gap-2 cursor-pointer rounded-md px-2 py-2 font-medium text-destructive hover:bg-destructive/10">
                                {!! _logoutIcon() !!}
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
                <!-- Dropdown End -->
            </div>
            <!-- User Area -->
        </div>
    </div>
</header>
<!-- ===== Header End ===== -->
