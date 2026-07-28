<div class="main-content">

    <div
        class="relative overflow-hidden rounded-b-3xl bg-linear-to-r from-violet-600 via-indigo-600 to-cyan-500  px-2 py-3.5 md:p-5 shadow-2xl">
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
                        stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-clipboard-list h-4.5 w-4.5 md:h-5 md:w-5">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                        <path d="M9 5a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2" />
                        <path d="M9 12l.01 0" />
                        <path d="M13 12l2 0" />
                        <path d="M9 16l.01 0" />
                        <path d="M13 16l2 0" />
                    </svg>
                </div>
            </div>

            <!-- Text -->
            <div class="flex-1">
                <h2 class="text-white text-base md:text-lg font-bold">
                    Transactions
                </h2>
                <p class="text-white/80 text-sm">
                    View your transaction history
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



    <main class="px-1.5 md:px-3.5 py-2 md:py-4 space-y-3 md:space-y-5">

        @if ($transactions->isEmpty())
            <div class="flex items-center justify-center h-full">
                <div class="text-center">
                    <i class="ri-search-line text-4xl text-gray-500"></i>
                    <p class="mt-2 text-gray-600">No transactions found</p>
                </div>
            </div>
        @endif

        @foreach ($transactions as $key => $row)
            <!------- Deposit History ------->
            @if ($row->type === 'deposit')
                @php
                    $depositInfo = \App\Models\AddBalance::where('id', $row->service_id)
                        ->where('user_id', _auth()->id)
                        ->first();
                @endphp

                @if (isset($depositInfo))
                    <button type="button" wire:click="viewTransaction({{ $row->id }})"
                        class="w-full cursor-pointer rounded-xl border border-border bg-card p-2.5 text-left shadow-sm transition-colors hover:bg-card/50 animate-fade-up"
                        style="animation-delay: {{ $key * 100 }}ms;">
                        <div class="mb-1.5 flex items-center gap-2.5">
                            <div
                                class="flex h-10 w-10 shrink-0 items-center justify-center overflow-hidden rounded-lg bg-transparent">
                                <img src="{{ asset('assets/images/pay-methods/' . $depositInfo->payment_method . '.webp') }}"
                                    alt="{{ $depositInfo->payment_method }}"
                                    class="h-full w-full rounded-lg object-cover">
                            </div>
                            <div class="min-w-0 flex-1">
                                <div class="flex items-center justify-between gap-2">
                                    <span
                                        class="text-left text-sm md:text-base font-bold text-foreground/90 capitalize">{{ $depositInfo->payment_method }}
                                        Send Money</span>

                                    @if ($row->status == 'pending')
                                        <label
                                            class="px-2.5 py-1 text-xs font-semibold tracking-wide bg-sky-500 rounded-full text-white shadow-[0_3px_5px] shadow-sky-500/30">Pending</label>
                                    @elseif ($row->status == 'success')
                                        <label
                                            class="px-2.5 py-1 text-xs font-semibold tracking-wide bg-emerald-500 rounded-full text-white shadow-[0_3px_5px] shadow-emerald-500/30">Success</label>
                                    @elseif ($row->status == 'failed')
                                        <label
                                            class="px-2.5 py-1 text-xs font-semibold tracking-wide bg-red-500 rounded-full text-white shadow-[0_3px_5px] shadow-red-500/30">Rejected</label>
                                    @endif
                                </div>
                                <!-- Amount -->
                                <span
                                    class="text-sm font-semibold text-foreground/70">{{ number_format($depositInfo->amount, 2) }}
                                    Taka</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between gap-2 border-t border-border pt-2">
                            <p class="text-left text-xs text-foreground/80 capitalize">{{ $row->type }}</p>
                            <span class="shrink-0 whitespace-nowrap text-xs text-foreground/80">
                                {{ $row->created_at->format('d M Y') . ', ' . $row->created_at->format('h:i A') }}
                            </span>
                        </div>
                    </button>
                @endif
            @elseif ($row->type === 'recharge')
                @php
                    $rechargeInfo = \App\Models\MobileRecharge::where('id', $row->service_id)
                        ->where('user_id', _auth()->id)
                        ->first();
                @endphp

                @if (isset($rechargeInfo))
                    <button type="button" wire:click="viewTransaction({{ $row->id }})"
                        class="w-full cursor-pointer rounded-xl border border-border bg-card p-2.5 text-left shadow-sm transition-colors hover:bg-card/50  ">
                        <div class="mb-1.5 flex items-center gap-2.5">
                            <div
                                class="flex h-10 w-10 shrink-0 items-center justify-center overflow-hidden rounded-lg bg-transparent">
                                @if ($rechargeInfo->operator == 'banglalink')
                                    <img src="{{ asset('assets/images/operator/bl.webp') }}" alt="BT"
                                        class="h-full w-full rounded-lg object-contain">
                                @else
                                    <img src="{{ asset('assets/images/operator/' . $rechargeInfo->operator . '.webp') }}"
                                        alt="BT" class="h-full w-full rounded-lg object-contain">
                                @endif
                            </div>
                            <div class="min-w-0 flex-1">
                                <div class="flex items-center justify-between gap-2">
                                    <span
                                        class="text-left text-sm md:text-base font-bold text-foreground/90">{{ $rechargeInfo->mobile_number }}</span>

                                    @if ($rechargeInfo->status == 'pending')
                                        <label
                                            class="px-2.5 py-1 text-xs font-semibold tracking-wide bg-sky-500 rounded-full text-white shadow-[0_3px_5px] shadow-sky-500/30">Pending</label>
                                    @elseif ($rechargeInfo->status == 'success')
                                        <label
                                            class="px-2.5 py-1 text-xs font-semibold tracking-wide bg-emerald-500 rounded-full text-white shadow-[0_3px_5px] shadow-emerald-500/30">Success</label>
                                    @elseif ($rechargeInfo->status == 'rejected')
                                        <label
                                            class="px-2.5 py-1 text-xs font-semibold tracking-wide bg-red-500 rounded-full text-white shadow-[0_3px_5px] shadow-red-500/30">Rejected</label>
                                    @endif
                                </div>
                                <!-- Amount -->
                                <span
                                    class="text-sm font-semibold text-foreground/70">{{ number_format($rechargeInfo->amount, 2) }}
                                    Taka</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between gap-2 border-t border-border pt-2">
                            <p class="text-left text-xs text-foreground/80">Recharge</p>
                            <span
                                class="shrink-0 whitespace-nowrap text-xs text-foreground/80">{{ $row->created_at->format('d M Y') . ', ' . $row->created_at->format('h:i A') }}</span>
                        </div>
                    </button>
                @endif
            @elseif ($row->type === 'brilliant_recharge')
                @php
                    $brilliantRechargeInfo = \App\Models\BrilliantRecharge::where('id', $row->service_id)
                        ->where('user_id', _auth()->id)
                        ->first();
                @endphp

                @if (isset($brilliantRechargeInfo))
                    <button type="button" wire:click="viewTransaction({{ $row->id }})"
                        class="w-full cursor-pointer rounded-xl border border-border bg-card p-2.5 text-left shadow-sm transition-colors hover:bg-card/50  ">
                        <div class="mb-1.5 flex items-center gap-2.5">
                            <div
                                class="flex h-10 w-10 shrink-0 items-center justify-center overflow-hidden rounded-lg bg-transparent">
                                <img src="{{ asset('assets/images/brilliant.png') }}" alt="brilliant"
                                    class="h-full w-full rounded-lg object-cover">
                            </div>
                            <div class="min-w-0 flex-1">
                                <div class="flex items-center justify-between gap-2">
                                    <span
                                        class="text-left text-sm md:text-base font-bold text-foreground/90">{{ $brilliantRechargeInfo->brilliant_number }}</span>

                                    @if ($brilliantRechargeInfo->status == 'pending')
                                        <label
                                            class="px-2.5 py-1 text-xs font-semibold tracking-wide bg-sky-500 rounded-full text-white shadow-[0_3px_5px] shadow-sky-500/30">Pending</label>
                                    @elseif ($brilliantRechargeInfo->status == 'success')
                                        <label
                                            class="px-2.5 py-1 text-xs font-semibold tracking-wide bg-emerald-500 rounded-full text-white shadow-[0_3px_5px] shadow-emerald-500/30">Success</label>
                                    @elseif ($brilliantRechargeInfo->status == 'rejected')
                                        <label
                                            class="px-2.5 py-1 text-xs font-semibold tracking-wide bg-red-500 rounded-full text-white shadow-[0_3px_5px] shadow-red-500/30">Rejected</label>
                                    @endif
                                </div>
                                <!-- Amount -->
                                <span
                                    class="text-sm font-semibold text-foreground/70">{{ number_format($brilliantRechargeInfo->amount, 2) }}
                                    Taka</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between gap-2 border-t border-border pt-2">
                            <p class="text-left text-xs text-foreground/80">Brilliant Recharge</p>
                            <span
                                class="shrink-0 whitespace-nowrap text-xs text-foreground/80">{{ $row->created_at->format('d M Y') . ', ' . $row->created_at->format('h:i A') }}</span>
                        </div>
                    </button>
                @endif
            @elseif ($row->type === 'bill_payment')
                @php
                    $billPaymentInfo = \App\Models\BillPayment::where('id', $row->service_id)
                        ->with('operator')
                        ->where('user_id', _auth()->id)
                        ->first();
                @endphp

                @if (isset($billPaymentInfo))
                    <button type="button" wire:click="viewTransaction({{ $row->id }})"
                        class="w-full cursor-pointer rounded-xl border border-border bg-card p-2.5 text-left shadow-sm transition-colors hover:bg-card/50  ">
                        <div class="mb-1.5 flex items-center gap-2.5">
                            <div
                                class="flex h-10 w-10 shrink-0 items-center justify-center overflow-hidden rounded-lg bg-transparent">
                                <img src="{{ asset('assets/images/bill-brands/' . strtolower($billPaymentInfo->operator->slug) . '.png') }}"
                                    alt="brilliant" class="h-full w-full rounded-lg object-cover">
                            </div>
                            <div class="min-w-0 flex-1">
                                <div class="flex items-center justify-between gap-2">
                                    <span
                                        class="text-left text-sm md:text-base font-bold text-foreground/90">{{ $billPaymentInfo->operator->title }}</span>

                                    @if ($billPaymentInfo->status == 'pending')
                                        <label
                                            class="px-2.5 py-1 text-xs font-semibold tracking-wide bg-sky-500 rounded-full text-white shadow-[0_3px_5px] shadow-sky-500/30">Pending</label>
                                    @elseif ($billPaymentInfo->status == 'success')
                                        <label
                                            class="px-2.5 py-1 text-xs font-semibold tracking-wide bg-emerald-500 rounded-full text-white shadow-[0_3px_5px] shadow-emerald-500/30">Success</label>
                                    @elseif ($billPaymentInfo->status == 'failed')
                                        <label
                                            class="px-2.5 py-1 text-xs font-semibold tracking-wide bg-red-500 rounded-full text-white shadow-[0_3px_5px] shadow-red-500/30">Failed</label>
                                    @endif
                                </div>
                                <!-- Amount -->
                                <span
                                    class="text-sm font-semibold text-foreground/70">{{ number_format($billPaymentInfo->amount, 2) }}
                                    Taka</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between gap-2 border-t border-border pt-2">
                            <p class="text-left text-xs text-foreground/80">Bill Payment</p>
                            <span
                                class="shrink-0 whitespace-nowrap text-xs text-foreground/80">{{ $row->created_at->format('d M Y') . ', ' . $row->created_at->format('h:i A') }}</span>
                        </div>
                    </button>
                @endif
            @endif

        @endforeach

    </main>


    <!-- Modal Area -->

    <div x-data x-cloak x-show="$wire.showDetails" x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex items-center justify-center p-1 md:p-4">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-gray-950/60 backdrop-blur-md" wire:click="closeDetails"></div>

        <!-- Modal -->
        <div x-show="$wire.showDetails" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-6 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 scale-95"
            class="relative z-10 w-full max-w-lg overflow-hidden rounded-2xl border border-border bg-card text-left shadow-2xl">

            <!-- Header -->
            <div class="relative overflow-hidden bg-linear-to-r from-violet-600 via-indigo-600 to-cyan-500 p-2 md:p-4">
                <!-- Decorative Circles -->
                <div class="absolute -right-8 -top-10 h-28 w-28 rounded-full bg-white/10"></div>
                <div class="absolute -bottom-12 right-12 h-24 w-24 rounded-full bg-white/10"></div>
                <!-- Header Content -->
                <div class="relative flex items-center gap-3">
                    <!-- Icon -->
                    <div
                        class="flex h-10 md:h-11 w-10 md:w-11 shrink-0 items-center justify-center rounded-xl border border-white/20 bg-white/15 shadow-lg backdrop-blur-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-wallet h-6 w-6 transition-all  text-white"
                            aria-hidden="true">
                            <path
                                d="M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1">
                            </path>
                            <path d="M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4"></path>
                        </svg>

                    </div>

                    <!-- Title -->
                    <div class="min-w-0 flex-1">
                        <h3 class="line-clamp-1 text-base md:text-lg font-semibold text-white">
                            Transaction Details
                        </h3>
                    </div>

                    <!-- Close -->
                    <button type="button" wire:click="closeDetails"
                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg border border-white/20 bg-white/10 text-white transition-all hover:bg-white/20 cursor-pointer">
                        <i class="ri-close-line text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Body -->
            <div class="p-2 md:p-4">
                <ul class="divide-y divide-border w-full border border-border rounded-2xl bg-background/50">
                    @if ($selectedTransaction?->type === 'deposit')
                        @php
                            $depositInfo = \App\Models\AddBalance::where('id', $selectedTransaction->service_id)
                                ->where('user_id', _auth()->id)
                                ->first();
                        @endphp
                        <li class="flex items-center justify-between px-2 md:px-4 py-3">
                            <span class="text-sm font-normal text-foreground/80">Sender Number</span>
                            <span
                                class="text-sm font-semibold text-foreground/90">{{ $depositInfo->sender_number }}</span>
                        </li>
                        <li class="flex items-center justify-between px-2 md:px-4 py-3">
                            <span class="text-sm font-normal text-foreground/80">Amount</span>
                            <span class="text-sm font-semibold text-foreground/90">৳
                                {{ number_format($depositInfo->amount, 2) }}</span>
                        </li>
                        <li class="flex items-center justify-between px-2 md:px-4 py-3">
                            <span class="text-sm font-normal text-foreground/80">Status</span>

                            @if ($depositInfo->status == 'pending')
                                <span class="text-sm font-semibold text-sky-500 capitalize">pending</span>
                            @elseif ($depositInfo->status == 'approved')
                                <span class="text-sm font-semibold text-success capitalize">success</span>
                            @elseif ($depositInfo->status == 'rejected')
                                <span class="text-sm font-semibold text-red-500 capitalize">failed</span>
                            @endif
                        </li>
                        <li class="flex items-center justify-between px-2 md:px-4 py-3">
                            <span class="text-sm font-normal text-foreground/80">Payment Number</span>
                            <span
                                class="text-sm font-semibold text-foreground/90">{{ $depositInfo->payment_number }}</span>
                        </li>
                        <li class="flex items-center justify-between px-2 md:px-4 py-3">
                            <span class="text-sm font-normal text-foreground/80">Transaction ID</span>
                            <span class="text-sm font-semibold text-foreground/90">{{ $depositInfo->trx_id }}</span>
                        </li>
                        <li class="flex items-center justify-between px-2 md:px-4 py-3">
                            <span class="text-sm font-normal text-foreground/80">Payment Method</span>
                            <span class="text-sm font-semibold text-foreground/90 flex items-center gap-2">
                                <img src="{{ asset('assets/images/pay-methods/' . $depositInfo->payment_method . '.webp') }}"
                                    alt="" class="w-5 h-5 object-cover shrink-0">
                                {{ $depositInfo->payment_method }}
                            </span>
                        </li>
                        <li class="flex items-center justify-between px-2 md:px-4 py-3">
                            <span class="text-sm font-normal text-foreground/80">Date & Time</span>
                            <span
                                class="text-sm font-semibold text-foreground/90">{{ date('M d, Y h:i A', strtotime($depositInfo->created_at)) }}</span>
                        </li>
                        @if ($depositInfo->status == 'rejected')
                            <li class="flex items-center justify-between px-2 md:px-4 py-3">
                                <h5 class="text-sm font-semibold text-foreground/80">
                                    Reject Reason:
                                    <span
                                        class="text-xs font-normal text-red-500 tracking-wide">{{ $depositInfo->reject_reason }}</span>
                                </h5>

                            </li>
                        @endif
                    @elseif ($selectedTransaction?->type === 'recharge')
                        @php
                            $rechargeInfo = \App\Models\MobileRecharge::where('id', $selectedTransaction->service_id)
                                ->where('user_id', _auth()->id)
                                ->first();
                        @endphp
                        <li class="flex items-center justify-between px-2 md:px-4 py-3">
                            <span class="text-sm font-normal text-foreground/80">Mobile Number</span>
                            <span
                                class="text-sm font-semibold text-foreground/90">{{ $rechargeInfo->mobile_number }}</span>
                        </li>
                        <li class="flex items-center justify-between px-2 md:px-4 py-3">
                            <span class="text-sm font-normal text-foreground/80">Amount</span>
                            <span class="text-sm font-semibold text-foreground/90">৳
                                {{ number_format($rechargeInfo->amount, 2) }}</span>
                        </li>
                        <li class="flex items-center justify-between px-2 md:px-4 py-3">
                            <span class="text-sm font-normal text-foreground/80">Operator</span>
                            <span class="text-sm font-semibold text-foreground/90 flex items-center gap-2 capitalize">
                                @if ($rechargeInfo->operator == 'banglalink')
                                    <img src="{{ asset('assets/images/operator/bl.webp') }}" alt=""
                                        class="w-5 h-5 object-cover shrink-0">
                                @else
                                    <img src="{{ asset('assets/images/operator/' . $rechargeInfo->operator . '.webp') }}"
                                        alt="" class="w-5 h-5 object-cover shrink-0">
                                @endif
                                {{ $rechargeInfo->operator }}
                            </span>
                        </li>
                        <li class="flex items-center justify-between px-2 md:px-4 py-3">
                            <span class="text-sm font-normal text-foreground/80">Status</span>

                            @if ($rechargeInfo->status == 'pending')
                                <span class="text-sm font-semibold text-sky-500 capitalize">pending</span>
                            @elseif ($rechargeInfo->status == 'success')
                                <span class="text-sm font-semibold text-success capitalize">success</span>
                            @elseif ($rechargeInfo->status == 'rejected')
                                <span class="text-sm font-semibold text-red-500 capitalize">failed</span>
                            @endif
                        </li>
                        <li class="flex items-center justify-between px-2 md:px-4 py-3">
                            <span class="text-sm font-normal text-foreground/80">Date & Time</span>
                            <span
                                class="text-sm font-semibold text-foreground/90">{{ date('M d, Y h:i A', strtotime($rechargeInfo->created_at)) }}</span>
                        </li>
                    @elseif ($selectedTransaction?->type === 'brilliant_recharge')
                        @php
                            $brilliantRechargeInfo = \App\Models\BrilliantRecharge::where(
                                'id',
                                $selectedTransaction->service_id,
                            )
                                ->where('user_id', _auth()->id)
                                ->first();
                        @endphp

                        <li class="flex items-center justify-between px-2 md:px-4 py-3">
                            <span class="text-sm font-normal text-foreground/80">Brilliant Number</span>
                            <span
                                class="text-sm font-semibold text-foreground/90">{{ $brilliantRechargeInfo->brilliant_number }}</span>
                        </li>
                        <li class="flex items-center justify-between px-2 md:px-4 py-3">
                            <span class="text-sm font-normal text-foreground/80">Amount</span>
                            <span class="text-sm font-semibold text-foreground/90">৳
                                {{ number_format($brilliantRechargeInfo->amount, 2) }}</span>
                        </li>
                        <li class="flex items-center justify-between px-2 md:px-4 py-3">
                            <span class="text-sm font-normal text-foreground/80">Status</span>

                            @if ($brilliantRechargeInfo->status == 'pending')
                                <span class="text-sm font-semibold text-sky-500 capitalize">pending</span>
                            @elseif ($brilliantRechargeInfo->status == 'success')
                                <span class="text-sm font-semibold text-success capitalize">success</span>
                            @elseif ($brilliantRechargeInfo->status == 'rejected')
                                <span class="text-sm font-semibold text-red-500 capitalize">failed</span>
                            @endif
                        </li>
                        <li class="flex items-center justify-between px-2 md:px-4 py-3">
                            <span class="text-sm font-normal text-foreground/80">Date & Time</span>
                            <span
                                class="text-sm font-semibold text-foreground/90">{{ date('M d, Y h:i A', strtotime($brilliantRechargeInfo->created_at)) }}</span>
                        </li>
                    @elseif ($selectedTransaction?->type === 'bill_payment')
                        @php
                            $billPaymentInfo = \App\Models\BillPayment::where('id', $selectedTransaction->service_id)
                                ->with('operator')
                                ->where('user_id', _auth()->id)
                                ->first();
                        @endphp

                        <li class="flex items-center justify-between px-2 md:px-4 py-3">
                            <span class="text-sm font-normal text-foreground/80">Operator</span>
                            <span
                                class="text-sm font-semibold text-foreground/90">{{ ucwords($billPaymentInfo->operator->title) }}</span>
                        </li>

                        <li class="flex items-center justify-between px-2 md:px-4 py-3">
                            <span class="text-sm font-normal text-foreground/80">Mobile Number</span>
                            <span
                                class="text-sm font-semibold text-foreground/90">{{ $billPaymentInfo->mobile_number }}</span>
                        </li>
                        <li class="flex items-center justify-between px-2 md:px-4 py-3">
                            <span class="text-sm font-normal text-foreground/80">Amount</span>
                            <span class="text-sm font-semibold text-foreground/90">৳
                                {{ number_format($billPaymentInfo->amount, 2) }}</span>
                        </li>
                        <li class="flex items-center justify-between px-2 md:px-4 py-3">
                            <span class="text-sm font-normal text-foreground/80">Status</span>

                            @if ($billPaymentInfo->status == 'pending')
                                <span class="text-sm font-semibold text-sky-500 capitalize">pending</span>
                            @elseif ($billPaymentInfo->status == 'success')
                                <span class="text-sm font-semibold text-success capitalize">success</span>
                            @elseif ($billPaymentInfo->status == 'rejected')
                                <span class="text-sm font-semibold text-red-500 capitalize">failed</span>
                            @endif
                        </li>
                        <li class="flex items-center justify-between px-2 md:px-4 py-3">
                            <span class="text-sm font-normal text-foreground/80">Month</span>
                            <span class="text-sm font-semibold text-foreground/90 capitalize">
                                {{ $billPaymentInfo->month }}</span>
                        </li>
                        <li class="flex items-center justify-between px-2 md:px-4 py-3">
                            <span class="text-sm font-normal text-foreground/80">Date & Time</span>
                            <span
                                class="text-sm font-semibold text-foreground/90">{{ date('M d, Y h:i A', strtotime($billPaymentInfo->created_at)) }}</span>
                        </li>
                        <li class="flex flex-col px-2 md:px-4 py-3">
                            <span class="text-sm font-normal text-foreground/80">Note:</span>
                            <span
                                class="text-sm font-semibold text-foreground/90">{{ $billPaymentInfo->note ?? 'N/A' }}</span>
                        </li>

                    @endif
                </ul>
            </div>

            <!-- Footer -->
            <div class="flex items-center justify-end border-t border-border bg-card/50 p-2 md:p-4">
                <button type="button" wire:click="closeDetails"
                    class="flex items-center gap-2 rounded-lg bg-airtel px-5 py-2.5 text-sm font-semibold text-white shadow-md transition-all hover:scale-[1.02] hover:shadow-lg cursor-pointer">
                    <i class="ri-check-line"></i>
                    Got it
                </button>
            </div>
        </div>
    </div>

</div>
