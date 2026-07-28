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
                class="w-12 h-12 md:w-14 md:h-14 shrink-0 rounded-xl bg-white/10 border border-white/20 backdrop-blur-xl flex items-center justify-center shadow-lg">

                <div
                    class="w-8 h-8 md:w-9 md:h-9 shrink-0 rounded-full bg-white/20 flex items-center justify-center text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-user h-4.5 w-4.5 md:h-5 md:w-5" aria-hidden="true">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
            </div>

            <!-- Text -->
            <div>
                <h2 class="text-white text-base md:text-lg font-bold">
                    Profile
                </h2>
                <p class="text-white/80 text-sm">
                    Your account overview
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


    <main class="px-1.5 md:px-3.5 py-2 md:py-4 space-y-7">
        <section
            class="rounded-2xl border border-border bg-card p-4 backdrop-blur-xl flex flex-col items-center gap-3 pt-6">
            <div class="relative">
                <div class="grid h-24 w-24 place-items-center rounded-full gradient-primary font-display shadow-md">
                    <img src="{{ asset('assets/images/avatar.png') }}" alt="Avatar"
                        class="h-full w-full rounded-full object-cover" />
                </div>

                {{-- <!-- Camera Button -->
                <label for="profileImageInput"
                    class="absolute bottom-0 right-0 grid h-8 w-8 cursor-pointer place-items-center rounded-full bg-primary text-primary-foreground ring-4 ring-surface">

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="h-4 w-4">
                        <path
                            d="M13.997 4a2 2 0 0 1 1.76 1.05l.486.9A2 2 0 0 0 18.003 7H20a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h1.997a2 2 0 0 0 1.759-1.048l.489-.904A2 2 0 0 1 10.004 4z" />
                        <circle cx="12" cy="13" r="3" />
                    </svg>

                    <!-- Hidden File Input -->
                    <input id="profileImageInput" type="file" wire:model.live="profileImage"
                        accept="image/jpeg,image/png,image/webp" class="hidden" />
                </label> --}}
            </div>

            <div class="text-center">
                <p class="font-display text-base md:text-lg font-semibold">{{ _auth()->name }}</p>
                <p class="text-sm text-muted-foreground">{{ _auth()->email }}</p>
            </div>
        </section>


        <section x-data="{ editProfile: false }" class="rounded-2xl border border-border bg-card backdrop-blur-xl">
            <header class="flex items-center justify-between py-2 md:py-3.5 px-2 md:px-4 border-b border-border">
                <h3 class="font-display text-base font-semibold">
                    Account Information
                </h3>
                <button @click="editProfile = !editProfile"
                    class="inline-flex items-center gap-1 text-xs font-medium text-primary-glow border border-primary-glow px-2.5 py-2 rounded-md transition-all hover:bg-primary-glow hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-pencil h-3.5 w-3.5" aria-hidden="true">
                        <path
                            d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z">
                        </path>
                        <path d="m15 5 4 4"></path>
                    </svg>
                    Edit
                </button>
            </header>

            <ul x-show="!editProfile" x-cloak x-transition class="divide-y divide-border">
                <li class="flex items-center gap-2 md:gap-3 px-2 py-1.5 md:py-3 md:px-4">
                    <span class="grid h-9 w-9 md:h-10 md:w-10 shrink-0 place-items-center rounded-xl"
                        style="background-color: color-mix(oklch(0.68 0.14 275) 20%, transparent); color: oklch(0.68 0.14 275)">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512"
                            class="text-lg h-4.5 w-4.5 md:h-5 md:w-5" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z">
                            </path>
                        </svg>

                    </span>
                    <div class="min-w-0 flex-1">
                        <p class="text-xs text-muted-foreground">Name</p>
                        <div class="text-sm font-semibold text-foreground">
                            {{ _auth()->name }}
                        </div>
                    </div>
                </li>

                <li class="flex items-center gap-2 md:gap-3 px-2 py-1.5 md:py-3 md:px-4">
                    <span
                        class="grid h-9 w-9 md:h-10 md:w-10 shrink-0 place-items-center rounded-xl bg-blue-50 dark:bg-blue-900/20">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                            class="text-lg h-4.5 w-4.5 md:h-5 md:w-5 text-blue-600 dark:text-blue-400" height="1em"
                            width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z">
                            </path>
                        </svg>
                    </span>
                    <div class="min-w-0 flex-1">
                        <p class="text-xs text-muted-foreground">Email</p>
                        <div class="text-sm font-semibold text-foreground">
                            {{ _auth()->email }}
                        </div>
                    </div>
                </li>

                <li class="flex items-center gap-2 md:gap-3 px-2 py-1.5 md:py-3 md:px-4">
                    <span
                        class="grid h-9 w-9 md:h-10 md:w-10 shrink-0 place-items-center rounded-xl bg-pink-50 dark:bg-pink-900/20 text-pink-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="text-lg h-4.5 w-4.5 md:h-5 md:w-5 icon icon-tabler icons-tabler-outline icon-tabler-user-pentagon">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M13.163 2.168l8.021 5.828c.694 .504 .984 1.397 .719 2.212l-3.064 9.43a1.978 1.978 0 0 1 -1.881 1.367h-9.916a1.978 1.978 0 0 1 -1.881 -1.367l-3.064 -9.43a1.978 1.978 0 0 1 .719 -2.212l8.021 -5.828a1.978 1.978 0 0 1 2.326 0" />
                            <path d="M12 13a3 3 0 1 0 0 -6a3 3 0 0 0 0 6" />
                            <path d="M6 20.703v-.703a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v.707" />
                        </svg>
                    </span>
                    <div class="min-w-0 flex-1">
                        <p class="text-xs text-muted-foreground">Username</p>
                        <div class="text-sm font-semibold text-foreground">
                            {{ _auth()->username }}
                        </div>
                    </div>
                </li>

                @if (_auth()->phone)
                    <li class="flex items-center gap-2 md:gap-3 px-2 py-1.5 md:py-3 md:px-4">
                        <span
                            class="grid h-9 w-9 md:h-10 md:w-10 shrink-0 place-items-center rounded-xl bg-green-50 dark:bg-green-900/20">

                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                                class="text-lg h-4.5 w-4.5 md:h-5 md:w-5 text-green-600 dark:text-green-400"
                                height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z">
                                </path>
                            </svg>

                        </span>
                        <div class="min-w-0 flex-1">
                            <p class="text-xs text-muted-foreground">Phone Number</p>
                            <div class="text-sm font-semibold text-foreground">
                                {{ _auth()->phone }}
                            </div>
                        </div>
                    </li>
                @endif
            </ul>

            <!-- form ARea -->
            <form x-show="editProfile" x-cloak x-transition wire:submit.prevent="updateProfile"
                class=" space-y-3 md:space-y-5 p-2.5 md:p-4">

                <div class="block">
                    <label for="name" class="text-sm block mb-1 pl-1 text-foreground/80 font-medium"><i
                            class="ri-user-3-line mr-1"></i> Name</label>
                    <input type="text" wire:model="name" class="input">
                    @error('name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="block">
                    <label for="email" class="text-sm block mb-1 pl-1 text-foreground/80 font-medium"><i
                            class="ri-mail-line mr-1"></i> Email</label>
                    <input type="email" wire:model="email" class="input">
                    @error('email')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="block">
                    <label for="phone" class="text-sm block mb-1 pl-1 text-foreground/80 font-medium"><i
                            class="ri-phone-line mr-1"></i> Phone</label>
                    <input type="text" wire:model="phone" class="input">
                    @error('phone')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-6">
                    <button type="submit" wire:loading.attr="disabled" wire:target="updateProfile"
                        class="flex items-center justify-center gap-2 w-full rounded-md gradient-bg px-5 py-3 text-sm font-bold text-primary-foreground shadow-md hover:scale-[1.02] transition-transform cursor-pointer">
                        <span wire:loading.remove wire:target="updateProfile"
                            class="flex items-center justify-center gap-1.5">
                            <i class="ri-save-line"></i>
                            Update Profile
                        </span>

                        <span wire:loading wire:target="updateProfile" class="flex items-center gap-2">
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
        </section>

    </main>


</div>
