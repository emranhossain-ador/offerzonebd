<div class="main-content">


    <div class="relative mb-10">
        <div
            class="relative overflow-hidden rounded-b-3xl bg-linear-to-r from-violet-600 via-indigo-600 to-cyan-500 px-2 md:px-5 py-4 md:py-7 pb-14 md:pb-16 shadow-2xl">
            <!-- Blur Circles -->
            <div class="absolute -right-6 -top-12 w-36 h-36 bg-white/20 rounded-full">
            </div>
            <div class="absolute right-5 -bottom-4 w-28 h-28 bg-white/10 rounded-full">
            </div>
            <!-- Content -->
            <div class="relative flex items-center gap-2.5 md:gap-4">
                <div class="relative">
                    <div
                        class="relative grid h-16 w-16 shrink-0 place-items-center rounded-full border-2 border-white/60">
                        <img src="{{ asset('assets/images/avatar.png') }}" alt="avatar"
                            class="w-full h-full object-cover rounded-full">
                    </div>
                </div>
                <div class="">
                    <p class="truncate font-display text-lg font-semibold text-white capitalize">{{ _auth()->name }}</p>
                    <p class="truncate text-sm text-white/80">{{ _auth()->email }}</p>
                </div>
            </div>

            <!-- Dotted Decoration -->
            <div class="absolute right-32 top-4 grid grid-cols-4 gap-2 opacity-30">

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

        <div
            class="absolute -bottom-12 md:-bottom-16.75 left-[50%] translate-[-50%] w-[95%] md:w-[80%] flex items-center gap-5">

            <div class="w-full flex items-center gap-3 rounded-2xl border border-border bg-card p-2 md:p-3">
                <span
                    class="grid w-9 md:h-11 h-9 md:w-11 shrink-0 place-items-center rounded-xl bg-primary-glow/15 text-primary-glow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-wallet h-5 w-5" aria-hidden="true">
                        <path
                            d="M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1">
                        </path>
                        <path d="M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4"></path>
                    </svg>
                </span>
                <div class="min-w-0">
                    <p class="text-xs text-muted-foreground">Balance</p>
                    <p class="truncate font-display text-sm md:text-base font-semibold text-foreground tabular-nums">৳
                        {{ number_format(_auth()->balance, 2) }}</p>
                </div>
            </div>

            <a href="{{ route('add-balance', ['username' => _auth()->username]) }}"
                class="group w-full flex items-center gap-3 rounded-2xl border border-border bg-card p-2 md:p-3 text-left backdrop-blur-sm"
                wire:navigate>
                <span
                    class="grid w-9 md:h-11 h-9 md:w-11 shrink-0 place-items-center rounded-xl bg-success/15 text-success transition group-hover:scale-105"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-plus h-5 w-5" aria-hidden="true">
                        <path d="M5 12h14"></path>
                        <path d="M12 5v14"></path>
                    </svg>
                </span>
                <div class="min-w-0">
                    <p class="text-xs text-muted-foreground">Add</p>
                    <p class="truncate font-display text-sm md:text-base font-semibold text-foreground">Balance</p>
                </div>
            </a>

        </div>

    </div>

    <main class="px-1.5 md:px-3.5 py-4 space-y-7">


        <!-- User Services section -->
        @include('frontend.user.inc.user-service-section')


        <section class="rounded-2xl border border-border bg-card p-2 md:p-4 backdrop-blur-xl ">
            <header class="mb-3 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <h3 class="font-display text-sm md:text-base font-semibold">Recent Transactions</h3>
                    <i class="ri-refresh-line text-muted-foreground"></i>
                </div>

                <a href="{{ route('transactions', ['username' => $username]) }}" wire:navigate
                    class="inline-flex items-center gap-1 text-xs font-semibold text-primary-glow">All Transactions
                    <i class="ri-arrow-right-long-line"></i>
                </a>
            </header>


            <div class="space-y-3 md:space-y-4">

                @foreach ($transactions as $key => $row)
                    <!------- Deposit History ------->
                    @if ($row->type === 'deposit')
                        @php
                            $depositInfo = \App\Models\AddBalance::where('id', $row->service_id)
                                ->where('user_id', _auth()->id)
                                ->first();
                        @endphp

                        @if (isset($depositInfo))
                            <button type="button"
                                class="w-full rounded-xl border border-border p-1.5 md:p-2.5 text-left bg-background/30 transition-colors animate-fade-up"
                                style="animation-delay: {{ $key * 100 }}ms;">
                                <div class="flex items-center gap-2.5">
                                    <div
                                        class="flex h-9 w-9 md:h-10 md:w-10 shrink-0 items-center justify-center overflow-hidden rounded-lg bg-transparent">
                                        <img src="{{ asset('assets/images/pay-methods/' . $depositInfo->payment_method . '.webp') }}"
                                            alt="{{ $depositInfo->payment_method }}"
                                            class="h-full w-full rounded-lg object-cover">
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="flex items-center justify-between gap-2">
                                            <span
                                                class="text-left text-sm md:text-base font-semibold md:font-bold text-foreground/90 capitalize">{{ $depositInfo->payment_method }}
                                                Send Money</span>

                                            @if ($row->status == 'pending')
                                                <label
                                                    class="text-xs font-semibold tracking-wide text-sky-500">Pending</label>
                                            @elseif ($row->status == 'success')
                                                <label
                                                    class="text-xs font-semibold tracking-wide text-emerald-500">Success</label>
                                            @elseif ($row->status == 'failed')
                                                <label
                                                    class="text-xs font-semibold tracking-wide text-red-500">Rejected</label>
                                            @endif
                                        </div>
                                        <!-- Amount -->
                                        <div class="flex items-center justify-between mt-1">
                                            <span
                                                class="text-sm font-semibold text-foreground/70">{{ number_format($depositInfo->amount) }}
                                                Taka</span>

                                            <span
                                                class="text-[11px] md:text-xs font-normal text-foreground/70">{{ $depositInfo->created_at->format('d M Y') . ' ' . $depositInfo->created_at->format('h:i A') }}
                                            </span>
                                        </div>
                                    </div>
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
                            <button type="button"
                                class="w-full rounded-xl border border-border p-1.5 md:p-2.5 text-left bg-background/30 transition-colors animate-fade-up ">
                                <div class="flex items-center gap-2.5">
                                    <div
                                        class="flex h-9 w-9 md:h-10 md:w-10 shrink-0 items-center justify-center overflow-hidden rounded-lg bg-transparent">
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
                                                class="text-left text-sm md:text-base font-semibold md:font-bold text-foreground/90">{{ $rechargeInfo->mobile_number }}</span>

                                            @if ($rechargeInfo->status == 'pending')
                                                <label
                                                    class="text-xs font-semibold tracking-wide text-sky-500">Pending</label>
                                            @elseif ($rechargeInfo->status == 'success')
                                                <label
                                                    class="text-xs font-semibold tracking-wide text-emerald-500">Success</label>
                                            @elseif ($rechargeInfo->status == 'rejected')
                                                <label
                                                    class="text-xs font-semibold tracking-wide text-red-500">Rejected</label>
                                            @endif
                                        </div>

                                        <!-- Amount -->
                                        <div class="flex items-center justify-between mt-0 md:mt-1">
                                            <span
                                                class="text-sm font-semibold text-foreground/70">{{ number_format($rechargeInfo->amount) }}
                                                Taka</span>

                                            <span
                                                class="text-[11px] md:text-xs font-normal text-foreground/70">{{ $rechargeInfo->created_at->format('d M Y') . ' ' . $rechargeInfo->created_at->format('h:i A') }}
                                            </span>
                                        </div>
                                    </div>
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
                            <button type="button"
                                class="w-full rounded-xl border border-border p-1.5 md:p-2.5 text-left bg-background/30 transition-colors animate-fade-up ">
                                <div class="flex items-center gap-2.5">
                                    <div
                                        class="flex h-9 w-9 md:h-10 md:w-10 shrink-0 items-center justify-center overflow-hidden rounded-lg bg-transparent">
                                        <img src="{{ asset('assets/images/brilliant.png') }}" alt="brilliant"
                                            class="h-full w-full rounded-lg object-contain">
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="flex items-center justify-between gap-2">
                                            <span
                                                class="text-left text-sm md:text-base font-semibold md:font-bold text-foreground/90">{{ $brilliantRechargeInfo->brilliant_number }}</span>

                                            @if ($brilliantRechargeInfo->status == 'pending')
                                                <label
                                                    class="text-xs font-semibold tracking-wide text-sky-500">Pending</label>
                                            @elseif ($brilliantRechargeInfo->status == 'success')
                                                <label
                                                    class="text-xs font-semibold tracking-wide text-emerald-500">Success</label>
                                            @elseif ($brilliantRechargeInfo->status == 'rejected')
                                                <label
                                                    class="text-xs font-semibold tracking-wide text-red-500">Rejected</label>
                                            @endif
                                        </div>
                                        <!-- Amount -->
                                        <div class="flex items-center justify-between mt-0 md:mt-1">
                                            <span
                                                class="text-sm font-semibold text-foreground/70">{{ number_format($brilliantRechargeInfo->amount) }}
                                                Taka</span>

                                            <span
                                                class="text-[11px] md:text-xs font-normal text-foreground/70">{{ $brilliantRechargeInfo->created_at->format('d M Y') . ' ' . $brilliantRechargeInfo->created_at->format('h:i A') }}
                                            </span>
                                        </div>
                                    </div>
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
                            <button type="button"
                                class="w-full rounded-xl border border-border p-1.5 md:p-2.5 text-left bg-background/30 transition-colors animate-fade-up ">
                                <div class="flex items-center gap-2.5">
                                    <div
                                        class="flex h-9 w-9 md:h-10 md:w-10 shrink-0 items-center justify-center overflow-hidden rounded-lg bg-transparent">
                                        <img src="{{ asset('assets/images/bill-brands/' . $billPaymentInfo->operator->slug . '.png') }}"
                                            alt="brilliant" class="h-full w-full rounded-lg object-contain">
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="flex items-center justify-between gap-2">
                                            <span
                                                class="text-left text-sm md:text-base font-semibold md:font-bold text-foreground/90">{{ ucwords($billPaymentInfo->operator->title) }}</span>

                                            @if ($billPaymentInfo->status == 'pending')
                                                <label
                                                    class="text-xs font-semibold tracking-wide text-sky-500">Pending</label>
                                            @elseif ($billPaymentInfo->status == 'success')
                                                <label
                                                    class="text-xs font-semibold tracking-wide text-emerald-500">Success</label>
                                            @elseif ($billPaymentInfo->status == 'failed')
                                                <label
                                                    class="text-xs font-semibold tracking-wide text-red-500">Failed</label>
                                            @endif
                                        </div>
                                        <!-- Amount -->
                                        <div class="flex items-center justify-between mt-0 md:mt-1">
                                            <span
                                                class="text-sm font-semibold text-foreground/70">{{ number_format($billPaymentInfo->amount) }}
                                                Taka</span>

                                            <span
                                                class="text-[11px] md:text-xs font-normal text-foreground/70">{{ $billPaymentInfo->created_at->format('d M Y') . ' ' . $billPaymentInfo->created_at->format('h:i A') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        @endif
                    @endif

                @endforeach
            </div>

        </section>
    </main>

</div>
