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
            <a href="{{ route('user.home', 'emran') }}"
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
                    Bill Payment
                </h2>
                <p class="text-white/80 text-sm">
                    Pay your utility bills easily
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

    <main class="px-1.5 md:px-3.5 py-4 space-y-5">

        <!-- Form -->
        <form wire:submit.prevent="billPayment" class="card">
            <div class="card-body p-4 space-y-4">

                <div class="block">
                    <label class="block text-sm font-medium text-foreground/85 mb-2">Bill Operator <span
                            class="text-sm font-bold text-red-500">*</span></label>
                    <div x-data="{ openMenu: false }" class="relative">
                        <button type="button" @click="openMenu = ! openMenu"
                            class="flex w-full items-center justify-between px-3.5 py-1.5 min-h-12 border border-border bg-input/40 rounded-xl text-foreground/90 outline-none transition-colors focus:border-primary/40 cursor-pointer">
                            <div class="flex items-center gap-3">

                                @if ($selectedOperatorId)
                                    <img src="{{ asset('assets/images/bill-brands/' . $selectedOperatorSlug . '.png') }}"
                                        alt="{{ $selectedOperatorTitle }}" class="object-contain w-6 h-6">
                                    <span class="flex-1 text-foreground/80">{{ $selectedOperatorTitle }}</span>
                                @else
                                    <span class="text-foreground/80">Select Operator</span>
                                @endif

                            </div>
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512"
                                :class="openMenu ? 'rotate-180' : 'rotate-0'"
                                class="text-gray-400 transition-transform dark:text-gray-500 " height="1em"
                                width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z">
                                </path>
                            </svg>
                        </button>

                        <div x-show="openMenu" x-cloak x-transition @click.outside="openMenu = false"
                            class="absolute z-50 mt-1 max-h-60 w-full overflow-y-auto scrollbar-thin scrollbar-thumb-primary rounded-xl border border-gray-200 bg-white shadow-lg dark:border-gray-600 dark:bg-gray-800">

                            @foreach ($billOperators as $operator)
                                <button type="button" wire:click="selectOperator({{ $operator->id }})"
                                    x-on:operator-select.window="openMenu = false"
                                    class="flex w-full items-center justify-between gap-3 border-b border-gray-100 px-4 py-2.5 text-left last:border-b-0 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-700 cursor-pointer">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ asset('assets/images/bill-brands/' . $operator->slug . '.png') }}"
                                            alt="{{ $operator->title }}" class="object-contain w-6 h-6">
                                        <span
                                            class="flex-1 text-gray-700 dark:text-gray-300">{{ $operator->title }}</span>
                                    </div>

                                    @if ($selectedOperatorId == $operator->id)
                                        <i class="ri-checkbox-circle-fill text-emerald-500 text-lg"></i>
                                    @endif
                                </button>
                            @endforeach

                        </div>

                        @error('selectedOperatorId')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror

                    </div>
                </div>

                <div class="block">
                    <label class="block text-sm font-medium text-foreground/85 mb-2">Bill Number <span
                            class="text-sm font-bold text-red-500">*</span></label>
                    <input type="text" class="input" wire:model="bill_number" placeholder="Enter your bill number">
                    @error('bill_number')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="block">
                    <label class="block text-sm font-medium text-foreground/85 mb-2">Bill Amount <span
                            class="text-sm font-bold text-red-500">*</span></label>
                    <input type="text" class="input" wire:model.live="bill_amount"
                        placeholder="Enter your bill amount (Taka)">

                    @error('bill_amount')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="block">
                    <label class="block text-sm font-medium text-foreground/85 mb-2">Mobile Number <span
                            class="text-sm font-bold text-red-500">*</span></label>
                    <input type="text" class="input" wire:model="mobile_number" placeholder="01XXXXXXXX">

                    @error('mobile_number')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="block">
                    <label class="block text-sm font-medium text-foreground/85 mb-2">Month <span
                            class="text-sm font-bold text-red-500">*</span></label>
                    <select class="input" wire:model="month">
                        <option class="dark:bg-gray-800" value="">Select Month</option>
                        <option class="dark:bg-gray-800" value="january">January</option>
                        <option class="dark:bg-gray-800" value="february">February</option>
                        <option class="dark:bg-gray-800" value="march">March</option>
                        <option class="dark:bg-gray-800" value="april">April</option>
                        <option class="dark:bg-gray-800" value="may">May</option>
                        <option class="dark:bg-gray-800" value="june">June</option>
                        <option class="dark:bg-gray-800" value="july">July</option>
                        <option class="dark:bg-gray-800" value="august">August</option>
                        <option class="dark:bg-gray-800" value="september">September</option>
                        <option class="dark:bg-gray-800" value="october">October</option>
                        <option class="dark:bg-gray-800" value="november">November</option>
                        <option class="dark:bg-gray-800" value="december">December</option>
                    </select>

                    @error('month')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="block">
                    <label class="block text-sm font-medium text-foreground/85 mb-2">Note</label>
                    <textarea class="input" cols="4" rows="4" placeholder="Enter any additional information"
                        wire:model="note"></textarea>

                    @error('note')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Note -->
                <div class="p-4 bg-amber-500/5 border border-amber-500/20 border-l-4 border-l-amber-500 rounded-sm">
                    <h6 class="text-sm font-medium text-amber-500">
                        ✅ বিল ২৪–৪৮ ঘণ্টার মধ্যে সম্পন্ন হয় • 📩 সম্পন্ন হলে SMS পাবেন • 💬 প্রয়োজনে সাপোর্টে যোগাযোগ
                        করুন
                    </h6>
                </div>

                @if ($this->lowBalance == true)
                    <div
                        class="p-4 bg-amber-500/5 border border-amber-500/20 border-l-4 border-l-amber-500 rounded-sm">
                        <h6 class="text-sm font-medium text-amber-500">⚠️ পর্যাপ্ত ব্যালেন্স নেই। আগে
                            <a href="{{ route('add-balance', ['username' => $username]) }}"
                                class="text-primary underline" wire:navigate>
                                ব্যালেন্স অ্যাড করুন
                            </a>
                            তারপর আবার চেষ্টা করুন।
                        </h6>
                    </div>
                @endif

            </div>

            <div class="card-footer p-4 border-t border-border">

                <button type="submit" @disabled($this->lowBalance) wire:loading.attr="disabled"
                    wire:target="billPayment"
                    class="flex items-center justify-center gap-2 w-full rounded-md gradient-bg px-5 py-3 text-sm font-bold text-primary-foreground shadow-md transition-transform {{ $this->lowBalance == true ? 'opacity-70 cursor-no-drop' : 'opacity-100 cursor-pointer hover:scale-[1.02] ' }}">
                    <span wire:loading.remove wire:target="billPayment"
                        class="flex items-center justify-center gap-1.5">
                        <i class="ri-save-line"></i>
                        Bill Payment
                    </span>

                    <span wire:loading wire:target="billPayment" class="flex items-center gap-2">
                        <svg class="h-5 w-5 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>

                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                    </span>
                </button>

            </div>
        </form>
    </main>

</div>
