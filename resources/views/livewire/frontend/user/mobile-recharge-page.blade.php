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
            <a href="{{ route('user.home', ['username' => _auth()->username]) }}"
                class="w-12 h-12 md:w-14 md:h-14 shrink-0 rounded-xl bg-white/10 border border-white/20 transition-all hover:bg-white/20 backdrop-blur-xl flex items-center justify-center shadow-lg"
                wire:navigate>

                <div
                    class="w-8 h-8 md:w-9 md:h-9 shrink-0 rounded-full bg-white/20 flex items-center justify-center text-white">
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
            <div class="flex-1">
                <h2 class="text-white text-base md:text-lg font-bold">
                    Mobile Recharge
                </h2>
                <p class="text-white/80 text-sm">
                    Fast mobile recharge
                </p>
            </div>

            <div class="shrink-0 rounded-full bg-white/20 px-3 py-1.5 text-right backdrop-blur-sm">
                <p class="text-[10px] text-black/70">Balance</p>
                <p class="text-[11px] font-bold text-gray-800">৳ {{ number_format(_auth()->balance, 2) }}</p>
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


    <main class="px-1.5 md:px-3.5 py-2 md:py-4">
        <div class="card">
            <form wire:submit.prevent="mobileRecharge">
                <div class="card-body space-y-3">

                    <div class="block">
                        <span class="mb-1.5 pl-1.5 block text-sm font-medium text-muted-foreground">Mobile Number</span>
                        <input type="text" placeholder="01XXXXXXXXX" wire:model.live="mobile_number" class="input"
                            maxlength="11" minlength="11"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 11);">

                        @if ($operator != '' && !$errors->has('mobile_number'))
                            <span class="text-xs font-medium text-success tracking-wide flex items-center gap-0.5">
                                <i class="ri-checkbox-circle-fill text-lg font-normal!"></i> Good Job! Your
                                selected
                                {{ strtoupper($operator) }}
                                Operator
                            </span>
                        @endif

                        @error('mobile_number')
                            <span class="text-red-500 text-xs"><i class="ri-alert-fill"></i> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="block">
                        <span class="mb-1.5 pl-1.5 block text-sm font-medium text-muted-foreground">Amount</span>
                        <input type="text" placeholder="Enter Amount" wire:model.live="amount" class="input"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">

                        @error('amount')
                            <span class="text-red-500 text-xs"><i class="ri-alert-fill"></i> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="my-3 py-3 flex space-x-2 overflow-x-auto scrollbar-thin">

                        <button type="button" wire:click="setAmount(20)"
                            class="whitespace-nowrap rounded-full px-4 py-2 text-sm border font-semibold transition-all shadow-sm cursor-pointer {{ $this->amount == 20 ? 'bg-primary text-white border-primary' : 'bg-gray-100 text-gray-600 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 border-border' }}">20৳</button>

                        <button type="button" wire:click="setAmount(50)"
                            class="whitespace-nowrap rounded-full px-4 py-2 text-sm border font-semibold transition-all shadow-sm cursor-pointer {{ $this->amount == 50 ? 'bg-primary text-white border-primary' : 'bg-gray-100 text-gray-600 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 border-border' }}">50৳</button>

                        <button type="button" wire:click="setAmount(100)"
                            class="whitespace-nowrap rounded-full px-4 py-2 text-sm border font-semibold transition-all shadow-sm cursor-pointer {{ $this->amount == 100 ? 'bg-primary text-white border-primary' : 'bg-gray-100 text-gray-600 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 border-border' }}">100৳</button>

                        <button type="button" wire:click="setAmount(200)"
                            class="whitespace-nowrap rounded-full px-4 py-2 text-sm border font-semibold transition-all shadow-sm cursor-pointer {{ $this->amount == 200 ? 'bg-primary text-white border-primary' : 'bg-gray-100 text-gray-600 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 border-border' }}">200৳</button>

                        <button type="button" wire:click="setAmount(500)"
                            class="whitespace-nowrap rounded-full px-4 py-2 text-sm border font-semibold transition-all shadow-sm cursor-pointer {{ $this->amount == 500 ? 'bg-primary text-white border-primary' : 'bg-gray-100 text-gray-600 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 border-border' }}">500৳</button>

                        <button type="button" wire:click="setAmount(1000)"
                            class="whitespace-nowrap rounded-full px-4 py-2 text-sm border font-semibold transition-all shadow-sm cursor-pointer {{ $this->amount == 1000 ? 'bg-primary text-white border-primary' : 'bg-gray-100 text-gray-600 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 border-border' }}">1000৳</button>

                    </div>

                    @if ($this->lowBalance == true)
                        <div
                            class="p-2 md:p-4 bg-amber-500/5 border border-amber-500/20 border-l-4 border-l-amber-500 rounded-sm">
                            <h6 class="text-xs md:text-sm font-medium text-amber-500">⚠️ পর্যাপ্ত ব্যালেন্স নেই। আগে
                                <a href="{{ route('add-balance', ['username' => $username]) }}"
                                    class="text-primary underline" wire:navigate>
                                    ব্যালেন্স অ্যাড করুন
                                </a>
                                তারপর আবার চেষ্টা করুন।
                            </h6>
                        </div>
                    @endif

                    <div class="mt-6">
                        <button type="submit" @disabled($this->lowBalance) wire:loading.attr="disabled"
                            wire:target="mobileRecharge"
                            class="flex items-center justify-center gap-2 w-full rounded-md gradient-bg px-5 py-3 text-sm font-bold text-primary-foreground shadow-md transition-transform {{ $this->lowBalance == true ? 'opacity-70 cursor-no-drop' : 'opacity-100 cursor-pointer hover:scale-[1.02] ' }}">
                            <span wire:loading.remove wire:target="mobileRecharge"
                                class="flex items-center justify-center gap-1.5">
                                <i class="ri-save-line"></i>
                                Recharge
                            </span>

                            <span wire:loading wire:target="mobileRecharge" class="flex items-center gap-2">
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
