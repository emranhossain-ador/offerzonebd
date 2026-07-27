<form wire:submit.prevent="rechargeAmount" x-show="$wire.step == 1" x-translate x-cloak
    class="bg-card border rounded-2xl p-4 space-y-4">
    <h4
        class="text-center px-4 py-1 bg-primary/20 border border-primary/50 text-primary w-fit text-sm font-semibold rounded-full mx-auto">
        Recharge</h4>

    <div class="rounded-2xl border border-border bg-background/40 p-6 text-center">
        <p class="text-sm font-semibold text-muted-foreground">Amount</p>

        <div class="mt-3 flex items-center justify-center gap-3">

            <span class="font-display text-4xl font-bold text-primary-glow">৳</span>

            <input placeholder="0" inputmode="numeric" wire:model.live="amount"
                class="w-40 bg-transparent text-center font-display text-4xl font-bold tabular-nums outline-none placeholder:text-muted-foreground/50 text-foreground/60 dark:text-gray-400">

        </div>

        <p class="mt-4 text-xs text-muted-foreground tracking-wide">
            Minimum: ৳ 50 &nbsp;·&nbsp; Maximum: ৳ 50,000
        </p>
    </div>

    <div>
        <p class="mb-2 text-[10px] font-bold uppercase tracking-widest text-muted-foreground">Quick Select</p>

        <div class="grid grid-cols-3 gap-2">
            <button wire:click="nextStep('Payment Method', 50, 2)"
                class="rounded-xl border py-3 text-sm font-semibold tabular-nums transition border-border  bg-background/80 hover:bg-white/5 cursor-pointer">
                ৳50
            </button>

            <button wire:click="nextStep('Payment Method', 100, 2)"
                class="rounded-xl border py-3 text-sm font-semibold tabular-nums transition border-border  bg-background/80 hover:bg-white/5 cursor-pointer">
                ৳100
            </button>

            <button wire:click="nextStep('Payment Method', 150, 2)"
                class="rounded-xl border py-3 text-sm font-semibold tabular-nums transition border-border bg-background/80 hover:bg-white/5 cursor-pointer">
                ৳150
            </button>

            <button wire:click="nextStep('Payment Method', 200, 2)"
                class="rounded-xl border py-3 text-sm font-semibold tabular-nums transition border-border bg-background/80 hover:bg-white/5 cursor-pointer">
                ৳200
            </button>

            <button wire:click="nextStep('Payment Method', 300, 2)"
                class="rounded-xl border py-3 text-sm font-semibold tabular-nums transition border-border bg-background/80 hover:bg-white/5 cursor-pointer">
                ৳300
            </button>

            <button wire:click="nextStep('Payment Method', 500, 2)"
                class="rounded-xl border py-3 text-sm font-semibold tabular-nums transition border-border bg-background/80 hover:bg-white/5 cursor-pointer">
                ৳500
            </button>
        </div>
    </div>

    <div class="p-4 bg-amber-500/5 border border-amber-500/20 border-l-4 border-l-amber-500 rounded-sm">
        <h6 class="text-sm font-medium text-amber-500">
            ⚠️ সঠিক টাকার পরিমাণ নির্বাচন করুন। ব্যালেন্স যোগ হওয়ার পর টাকার পরিমাণ পরিবর্তন বা রিফান্ড সম্ভব নয়।
        </h6>
    </div>

    <!-- Action Button -->
    <div class="mt-5 flex gap-3 border-t border-border pt-4">
        <button type="submit" {{ $is_btn_disable ? 'disabled' : '' }}
            class="w-full rounded-2xl gradient-primary py-3.5 font-display text-sm font-semibold text-white transition-all  {{ $is_btn_disable ? 'opacity-50 cursor-not-allowed' : 'hover:scale-[1.01] cursor-pointer ' }}">Next
            <i class="fa fa-arrow-right ml-1.5"></i></button>
    </div>
</form>
