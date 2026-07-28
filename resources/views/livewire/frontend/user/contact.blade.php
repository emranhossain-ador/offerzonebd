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
            <a href="{{ route('user.settings', ['username' => $username]) }}"
                class="w-12 h-12 md:w-14 md:h-14 shrink-0 rounded-xl bg-white/10 border border-white/20 transition-all hover:bg-white/20 backdrop-blur-xl flex items-center justify-center shadow-lg"
                wire:navigate>

                <div
                    class="w-8 h-8 md:w-9 md:h-9 shrink-0 rounded-full bg-white/20 flex items-center justify-center text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-arrow-left h-4 w-4 md:h-5 md:w-5"
                        aria-hidden="true" data-tsd-source="/src/components/app/PageHero.tsx:15:13">
                        <path d="m12 19-7-7 7-7"></path>
                        <path d="M19 12H5"></path>
                    </svg>
                </div>
            </a>

            <!-- Text -->
            <div>
                <h2 class="text-white text-base md:text-lg font-bold">
                    Support
                </h2>
                <p class="text-white/80 text-sm">
                    Get help anytime
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
        <div class="rounded-2xl border border-border bg-card p-3.5 md:p-5 text-center shadow-sm">
            <div
                class="mx-auto mb-3 flex h-14 w-14 items-center justify-center rounded-2xl bg-linear-to-br from-[#F82769]/10 to-[#52163C]/10">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                    class="text-2xl text-[#F82769]" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M192 208c0-17.67-14.33-32-32-32h-16c-35.35 0-64 28.65-64 64v48c0 35.35 28.65 64 64 64h16c17.67 0 32-14.33 32-32V208zm176 144c35.35 0 64-28.65 64-64v-48c0-35.35-28.65-64-64-64h-16c-17.67 0-32 14.33-32 32v112c0 17.67 14.33 32 32 32h16zM256 0C113.18 0 4.58 118.83 0 256v16c0 8.84 7.16 16 16 16h16c8.84 0 16-7.16 16-16v-16c0-114.69 93.31-208 208-208s208 93.31 208 208h-.12c.08 2.43.12 165.72.12 165.72 0 23.35-18.93 42.28-42.28 42.28H320c0-26.51-21.49-48-48-48h-32c-26.51 0-48 21.49-48 48s21.49 48 48 48h181.72c49.86 0 90.28-40.42 90.28-90.28V256C507.42 118.83 398.82 0 256 0z">
                    </path>
                </svg>
            </div>

            <h2 class="text-lg font-bold text-gray-800 dark:text-gray-100">We are here to help</h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Contact our support team</p>
            <div
                class="mt-3 inline-flex items-center gap-1.5 rounded-full bg-[#F82769]/10 px-3 py-1 text-xs font-semibold text-[#F82769]">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="text-sm"
                    height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path
                        d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z">
                    </path>
                    <path d="M12.5 7H11v6l5.25 3.15.75-1.23-4.5-2.67z"></path>
                </svg>24/7 Support
            </div>
        </div>

        <div class="space-y-3">
            <p class="px-1 text-xs font-semibold uppercase tracking-wide text-muted-foreground">Quick Help</p>

            <a href="{{ route('faq-page', ['username' => $username]) }}"
                class="flex w-full items-center gap-3 rounded-2xl border border-border bg-card p-2 md:p-4 text-left shadow-sm transition-all hover:border-[#F82769]/20 hover:shadow-md active:scale-[0.99]"
                wire:navigate>

                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#F82769]/10">
                    <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"
                        class="text-2xl text-[#F82769]" height="1em" width="1em"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                </div>

                <div class="min-w-0 flex-1">
                    <p class="font-bold text-foreground">FAQ</p>
                    <p class="truncate text-sm text-foreground/70">Frequently asked questions</p>
                </div>
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                    class="shrink-0 text-lg text-foreground" height="1em" width="1em"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="48"
                        d="m184 112 144 144-144 144">
                    </path>
                </svg>
            </a>

            @if (!empty($contactInfo->phone))
                <a href="tel:{{ $contactInfo->phone }}"
                    class="flex w-full items-center gap-3 rounded-2xl border border-border bg-card p-2 md:p-4 text-left shadow-sm transition-all hover:border-[#F82769]/20 hover:shadow-md active:scale-[0.99]">

                    <div
                        class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-blue-50 dark:bg-blue-900/20">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024"
                            class="text-2xl text-blue-600 dark:text-blue-400" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M877.1 238.7L770.6 132.3c-13-13-30.4-20.3-48.8-20.3s-35.8 7.2-48.8 20.3L558.3 246.8c-13 13-20.3 30.5-20.3 48.9 0 18.5 7.2 35.8 20.3 48.9l89.6 89.7a405.46 405.46 0 0 1-86.4 127.3c-36.7 36.9-79.6 66-127.2 86.6l-89.6-89.7c-13-13-30.4-20.3-48.8-20.3a68.2 68.2 0 0 0-48.8 20.3L132.3 673c-13 13-20.3 30.5-20.3 48.9 0 18.5 7.2 35.8 20.3 48.9l106.4 106.4c22.2 22.2 52.8 34.9 84.2 34.9 6.5 0 12.8-.5 19.2-1.6 132.4-21.8 263.8-92.3 369.9-198.3C818 606 888.4 474.6 910.4 342.1c6.3-37.6-6.3-76.3-33.3-103.4zm-37.6 91.5c-19.5 117.9-82.9 235.5-178.4 331s-213 158.9-330.9 178.4c-14.8 2.5-30-2.5-40.8-13.2L184.9 721.9 295.7 611l119.8 120 .9.9 21.6-8a481.29 481.29 0 0 0 285.7-285.8l8-21.6-120.8-120.7 110.8-110.9 104.5 104.5c10.8 10.8 15.8 26 13.3 40.8z">
                            </path>
                        </svg>
                    </div>

                    <div class="min-w-0 flex-1">
                        <p class="font-bold text-foreground">Contact</p>
                        <p class="truncate text-sm text-foreground/70">+88{{ $contactInfo->phone }}</p>
                    </div>
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                        class="shrink-0 text-lg text-foreground/50" height="1em" width="1em"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="48"
                            d="m184 112 144 144-144 144">
                        </path>
                    </svg>
                </a>
            @endif


            @if (!empty($contactInfo->whatsapp))
                <a href="https://wa.me/{{ $contactInfo->whatsapp }}" target="_blank" rel="noopener noreferrer"
                    class="flex w-full items-center gap-3 rounded-2xl border border-border bg-card p-2 md:p-4 text-left shadow-sm transition-all hover:border-[#F82769]/20 hover:shadow-md active:scale-[0.99]">
                    <div
                        class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-green-50 dark:bg-green-900/20">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16"
                            class="text-2xl text-[#25D366]" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232">
                            </path>
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="font-bold text-foreground">WhatsApp</p>
                        <p class="truncate text-sm text-foreground/70">Chat on WhatsApp</p>
                    </div>
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                        class="shrink-0 text-lg text-foreground/50" height="1em" width="1em"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="48"
                            d="m184 112 144 144-144 144">
                        </path>
                    </svg>
                </a>
            @endif


            @if (!empty($contactInfo->email))
                <a href="mailto:{{ $contactInfo->email }}"
                    class="flex w-full items-center gap-3 rounded-2xl border border-border bg-card p-2 md:p-4 text-left shadow-sm transition-all hover:border-[#F82769]/20 hover:shadow-md active:scale-[0.99]">
                    <div
                        class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-amber-50 dark:bg-amber-900/20">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                            class="text-2xl text-amber-600 dark:text-amber-400" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path
                                d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4-8 5-8-5V6l8 5 8-5v2z">
                            </path>
                        </svg>
                    </div>

                    <div class="min-w-0 flex-1">
                        <p class="font-bold text-foreground">Email</p>
                        <p class="truncate text-sm text-foreground/70">{{ $contactInfo->email }}</p>
                    </div>
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                        class="shrink-0 text-lg text-foreground/50" height="1em" width="1em"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="48"
                            d="m184 112 144 144-144 144"></path>
                    </svg>
                </a>
            @endif


            @if (!empty($contactInfo->telegram))
                <a href="tg://resolve?domain={{ $contactInfo->telegram }}" target="_blank" rel="noopener noreferrer"
                    class="flex w-full items-center gap-3 rounded-2xl border border-border bg-card p-2 md:p-4 text-left shadow-sm transition-all hover:border-[#F82769]/20 hover:shadow-md active:scale-[0.99]">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#0088cc]/10">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16"
                            class="text-2xl text-[#0088cc]" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.287 5.906q-1.168.486-4.666 2.01-.567.225-.595.442c-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294q.39.01.868-.32 3.269-2.206 3.374-2.23c.05-.012.12-.026.166.016s.042.12.037.141c-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8 8 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629q.14.092.27.187c.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.4 1.4 0 0 0-.013-.315.34.34 0 0 0-.114-.217.53.53 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09">
                            </path>
                        </svg>
                    </div>

                    <div class="min-w-0 flex-1">
                        <p class="font-bold text-foreground">Telegram</p>
                        <p class="truncate text-sm text-foreground/70">Chat on telegram</p>
                    </div>
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                        class="shrink-0 text-lg text-foreground/50" height="1em" width="1em"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="48"
                            d="m184 112 144 144-144 144"></path>
                    </svg>
                </a>
            @endif


            @if (!empty($contactInfo->facebook))
                <a href="{{ $contactInfo->facebook }}" target="_blank"
                    class="flex w-full items-center gap-3 rounded-2xl border border-border bg-card p-2 md:p-4 text-left shadow-sm transition-all hover:border-[#F82769]/20 hover:shadow-md active:scale-[0.99]">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#1877F2]/10">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16"
                            class="text-2xl text-[#1877F2]" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951">
                            </path>
                        </svg>
                    </div>

                    <div class="min-w-0 flex-1">
                        <p class="font-bold text-foreground">Facebook</p>
                        <p class="truncate text-sm text-foreground/70">Chat on facebook</p>
                    </div>
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                        class="shrink-0 text-lg text-foreground/50" height="1em" width="1em"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="48"
                            d="m184 112 144 144-144 144"></path>
                    </svg>
                </a>
            @endif

        </div>

    </main>
</div>
