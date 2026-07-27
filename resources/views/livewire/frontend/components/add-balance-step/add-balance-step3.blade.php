<div x-show="$wire.step == 3" x-translate x-cloak class="bg-card border rounded-2xl p-4 space-y-6">
    <!-- Order ORDER SUMMARY -->
    <div class="p-4 bg-primary/15 rounded-2xl border border-primary/50 flex items-center justify-between">
        <div class="space-y-3">
            <h6 class="text-sm font-semibold text-primary">ORDER SUMMARY</h6>
            <div class="flex items-center gap-2.5">
                <span
                    class="px-2.5 py-1 bg-card/60 backdrop-blur-md text-xs font-semibold text-pink-500 rounded-full">Recharge
                    Amount</span>
                <span
                    class="px-2.5 py-1 bg-card/60 backdrop-blur-md text-xs font-semibold text-pink-500 rounded-full tracking-wide">৳
                    {{ $amount }}</span>
            </div>
        </div>

        <div class="h-10 w-20 p-[3px]">
            <img src="{{ asset('assets/images/' . $pay_method_name . '.png') }}" alt=""
                class="w-full h-full object-contain">
        </div>
    </div>


    <!-- ORDER SUMMARY INFO -->
    <div class="py-1 border border-border rounded-2xl bg-background/50">
        <ul class="divide-y divide-border">

            <li class="px-4 py-3 flex items-center justify-between">
                <span class="text-sm font-semibold text-foreground/90 capitalize">{{ $pay_method_name }} Send
                    Money</span>
                <div class="flex items-center gap-2">
                    <span class="text-sm font-semibold text-foreground/90">{{ $payment_number }}</span>
                    <button type="button" data-copy="{{ $payment_number }}"
                        class="copyBtn w-8 h-8 shrink-0 flex justify-center items-center rounded-md border border-border bg-border/50 text-foreground/80 cursor-pointer">
                        <i class="ri-file-copy-line"></i>
                    </button>
                </div>
            </li>

            <li class="px-4 py-3 flex items-center justify-between">
                <span class="text-sm font-normal text-foreground/90">Amount</span>
                <span class="text-sm font-semibold text-foreground/90 tracking-wide">৳ {{ $amount }}</span>
            </li>

        </ul>
    </div>

    <!-- Input Area -->
    <form wire:submit.prevent="addbalance" class="space-y-4">

        <div class="block">
            <span class="mb-1.5 pl-1 block text-sm font-medium text-muted-foreground">Sender Number <span
                    class="text-red-500 font-bold text-sm">*</span></span>
            <input type="text" wire:model.live="sender_number" class="input" placeholder="Enter sender number">
            @error('sender_number')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="block">
            <span class="mb-1.5 pl-1 block text-sm font-medium text-muted-foreground">Transaction ID <span
                    class="text-red-500 font-bold text-sm">*</span></span>
            <input type="text" wire:model.live="trx_id" class="input" placeholder="Enter transaction id">
            @error('trx_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>


        <div class="p-4 bg-amber-500/5 border border-amber-500/20 border-l-4 border-l-amber-500 rounded-sm">
            <h6 class="text-sm font-medium text-amber-500">
                🟡 ভুল তথ্য দিলে ব্যালেন্স যোগ হবে না এবং আপনার অ্যাকাউন্ট ব্লক করা হতে পারে।
            </h6>
        </div>


        <!-- Action Button -->
        <div class="mt-5 flex gap-3 border-t border-border pt-4">
            <button type="button" wire:click="previousStep"
                class="flex-1 rounded-2xl border border-border bg-surface-elevated py-3.5 font-display text-sm font-semibold text-foreground/90 transition hover:bg-gray-100 dark:hover:bg-white/5 cursor-pointer"><i
                    class="fa fa-arrow-left mr-1.5"></i> Previous</button>

            <button type="submit" {{ $is_sbtn_disable ? 'disabled' : '' }} wire:loading.attr="disabled"
                wire:target="addbalance"
                class="flex-1 flex items-center justify-center rounded-2xl gradient-primary py-3.5 font-display text-sm font-semibold text-white transition-all  {{ $is_sbtn_disable ? 'opacity-50 cursor-not-allowed' : ' hover:scale-[1.01] cursor-pointer' }}">
                <span wire:loading.remove wire:target="addbalance" class="flex items-center ">
                    Add <i class="fa fa-arrow-right ml-1.5"></i>
                </span>

                <span wire:loading wire:target="addbalance"
                    class="flex flex-row items-center justify-center gap-2 text-sm font-semibold">
                    <span wire:loading wire:target="addbalance"
                        class="flex items-center justify-center gap-2 text-sm font-semibold">
                        <svg class="h-4 w-4 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>

                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                    </span>
                    Adding...
                </span>
            </button>

        </div>

    </form>

</div>
