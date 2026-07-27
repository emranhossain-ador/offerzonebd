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
            <a href="{{ route('user.home', ['username' => _auth()->username]) }}"
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
                    Add Balance
                </h2>
                <p class="text-white/80 text-sm">
                    Add balance to your account
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


    <main class="px-1.5 md:px-3.5 py-2 md:py-4 space-y-3 md:space-y-5">

        <!-- Step Line -->
        <div class="bg-card rounded-2xl border border-border px-4 py-3.5 space-y-4">
            <div class="flex items-baseline justify-between w-full">
                <p class="font-display text-base font-semibold text-foreground/90 capitalize">Step {{ $step }}:
                    {{ $pageTitle }}</p>
                <p class="font-display text-sm font-bold text-primary tracking-wide">{{ $step }}/3</p>
            </div>

            <!-- Step -->
            <div class="grid grid-cols-3">

                <!-- step 1 -->
                <div class="flex items-center">
                    <span
                        class="w-6 h-6 flex items-center justify-center rounded-full {{ $step == 1 ? 'bg-pink-500' : 'bg-pink-400' }} shrink-0 text-sm text-white shadow-[0_3px_5px] shadow-pink-500/50"><i
                            class="ri-check-double-line"></i></span>

                    <span class="w-full h-[4px] {{ $step == 1 ? 'bg-pink-500' : 'bg-pink-400' }} inline"></span>

                    <span
                        class="w-6 h-6 flex items-center justify-center rounded-full {{ $step == 1 ? 'bg-pink-500' : 'bg-pink-400' }} shrink-0 text-sm text-white shadow-[0_3px_5px] shadow-pink-500/50"><i
                            class="ri-check-fill font-black!"></i></span>
                </div>

                <!-- step 2 -->
                <div class="flex items-center">
                    <span
                        class="w-full h-[4px] {{ ($step == 2 ? 'bg-pink-500 text-white' : $step == 3) ? 'bg-pink-400 text-white' : 'bg-gray-200/90 dark:bg-gray-100/20' }} inline"></span>
                    <span
                        class="w-6 h-6 flex items-center justify-center rounded-full {{ ($step == 2 ? 'bg-pink-500 text-white' : $step == 3) ? 'bg-pink-400 text-white' : 'bg-gray-300/60 dark:bg-gray-100/20 text-gray-500/70 dark:text-gray-100/70' }} shrink-0 text-sm {{ $step == 2 || $step == 3 ? 'shadow-[0_3px_5px] shadow-pink-500/50' : '' }}"><i
                            class="ri-check-fill font-black!"></i></span>
                </div>

                <!-- step 3 -->
                <div class="flex items-center">
                    <span
                        class="w-full h-[4px] {{ $step == 3 ? 'bg-pink-500 text-white' : 'bg-gray-200/90 dark:bg-gray-100/20' }} inline"></span>
                    <span
                        class="w-6 h-6 flex items-center justify-center rounded-full {{ $step == 3 ? 'bg-pink-500 text-white' : 'bg-gray-300/60 dark:bg-gray-100/20 text-gray-500/70 dark:text-gray-100/70' }} shrink-0 text-sm "><i
                            class="ri-check-fill font-black!"></i></span>
                </div>

            </div>
        </div>





        <!--============= Main Content =============-->

        <!-- Step 1 -->
        @include('frontend.components.add-balance-step.add-balance-step1')

        <!-- Step 2 -->
        @include('frontend.components.add-balance-step.add-balance-step2')

        <!-- Step 3 -->
        @include('frontend.components.add-balance-step.add-balance-step3')


    </main>

</div>
