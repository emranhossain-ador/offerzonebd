<div x-show="$wire.step == 2" x-translate x-cloak class="bg-card border rounded-2xl p-4 space-y-6">
    <!-- Order ORDER SUMMARY -->
    <div class="p-4 bg-primary/15 rounded-2xl border border-primary/50 space-y-3">
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

    <!-- Select Your Payment Method -->
    <div class="block space-y-3">
        <span class="text-sm block font-medium text-foreground/80">Select your payment method</span>
        <div class="grid grid-cols-2 gap-3">

            @foreach ($paymentMethods as $key => $method)
                <button wire:click="paymentMethod('Transaction Details', {{ $method->id }}, 3)" type="button"
                    class="p-4 border border-border rounded-2xl bg-background/50 w-full h-28 transition-all cursor-pointer shadow-sm hover:border-primary">
                    <img src="{{ asset('assets/images/' . strtolower($method->name) . '.png') }}" alt="image"
                        class="w-full h-full object-contain">
                </button>
            @endforeach

        </div>
    </div>

    <!-- Action Button -->
    <div class="mt-5 flex gap-3 border-t border-border pt-4">
        <button wire:click="previousStep"
            class="flex-1 rounded-2xl border border-border bg-surface-elevated py-3.5 font-display text-sm font-semibold text-foreground/90 transition hover:bg-gray-100 dark:hover:bg-white/5 cursor-pointer"><i
                class="fa fa-arrow-left mr-1.5"></i> Previous</button>
    </div>
</div>
