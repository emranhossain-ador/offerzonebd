<?php

use Livewire\Component;
use App\Models\Notifications;

new class extends Component {
    public function notification()
    {
        return Notifications::query()->where('role', 'admin')->where('is_seen', false)->orderBy('id', 'desc')->get();
    }
};
?>

<div>

    <div wire:poll.3s class="relative" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
        <button
            class="flex h-9 w-9 shrink-0 cursor-pointer items-center justify-center rounded-full border border-border dark:bg-background bg-white text-primary text-lg group"
            @click.prevent="dropdownOpen = ! dropdownOpen;">

            @if ($this->notification()->count() > 0)
                <span class="absolute top-0.5 right-0 z-1 h-2 w-2 rounded-full bg-primary flex">
                    <span
                        class="absolute -z-1 inline-flex h-full w-full animate-ping rounded-full bg-primary opacity-75"></span>
                </span>
            @endif

            <i class="ri-notification-3-line"></i>
        </button>

        <!-- Dropdown Start -->
        @if ($this->notification()->count() > 0)
            <div x-show="dropdownOpen"
                class="shadow-md absolute -right-40 mt-5 flex w-80 md:w-md h-96 flex-col rounded-md md:rounded-lg border border-border bg-white dark:bg-sidebar md:right-0"
                x-cloak x-transition :class="dropdownOpen ? '' : 'hidden'">
                <div class="mb-3 flex items-center justify-between border-b border-border p-3">
                    <h5 class="text-base md:text-lg font-semibold text-card-foreground">Notification &nbsp;&nbsp;
                        <span
                            class="bg-primary text-white px-2 py-1 rounded-full text-xs font-semibold tracking-wide">{{ $this->notification()->count() }}</span>
                    </h5>

                    <button @click="dropdownOpen = false" class="text-destructive cursor-pointer ">
                        <i class="ri-close-large-line font-black"></i>
                    </button>
                </div>

                <ul
                    class="custom-scrollbar flex h-auto flex-col overflow-y-auto scrollbar-thin scrollbar-thumb-primary divide-y divide-border/70">
                    @foreach ($this->notification() as $key => $notification)
                        <!-- This is for Add Balance Request -->
                        @if ($notification->type === 'deposit')
                            @php
                                $depositInfo = \App\Models\AddBalance::where('id', $notification->service_id)->first();
                            @endphp

                            <li>
                                <a class="relative flex gap-3 px-3.5 py-3 transition-all hover:bg-gray-200/50 dark:hover:bg-gray-500/20"
                                    href="{{ route('admin.add-balance-details', $depositInfo->id) }}">

                                    <span
                                        class="flex items-center justify-center h-10 w-10 rounded bg-emerald-500 shadow-[0_3px_7px] shadow-emerald-500/40">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-wallet h-6 w-6 text-white" aria-hidden="true">
                                            <path
                                                d="M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1">
                                            </path>
                                            <path d="M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4"></path>
                                        </svg>
                                    </span>

                                    <span class="block">
                                        <!-- title -->
                                        <span
                                            class="text-sm font-semibold text-foreground line-clamp-1 flex items-center gap-3">
                                            {{ $notification->title }}
                                            <span
                                                class="text-xs tracking-wide bg-emerald-500/10 px-2 py-0.5 rounded-md text-emerald-500 font-semibold">New</span></span>

                                        <span class="text-[13px] flex items-center gap-2 text-foreground">Amount:
                                            {{ $depositInfo->amount }} Taka</span>

                                    </span>

                                    <span
                                        class="absolute bottom-2.5 right-1.5 md:right-3 text-xs text-white rounded-sm tracking-wide bg-sky-500 px-2 py-0.5 font-semibold">
                                        {{ $notification->created_at->diffForHumans() }}
                                    </span>
                                </a>
                            </li>

                            <!-- This is for Mobile Recharge Request -->
                        @elseif ($notification->type === 'recharge')
                            @php
                                $rechargeInfo = \App\Models\MobileRecharge::where(
                                    'id',
                                    $notification->service_id,
                                )->first();
                            @endphp
                            <li>
                                <a class="relative flex gap-3 px-3.5 py-3 transition-all hover:bg-gray-200/50 dark:hover:bg-gray-500/20"
                                    href="{{ route('admin.mobile-recharge-request') }}">

                                    <span
                                        class="flex items-center justify-center h-10 w-10 rounded bg-purple-500 shadow-[0_3px_7px] shadow-purple-500/40">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-smartphone h-6 w-6 text-white" aria-hidden="true">
                                            <rect width="14" height="20" x="5" y="2" rx="2"
                                                ry="2">
                                            </rect>
                                            <path d="M12 18h.01"></path>
                                        </svg>
                                    </span>

                                    <span class="block">
                                        <!-- title -->
                                        <span
                                            class="text-sm font-semibold text-foreground line-clamp-1 flex items-center gap-3">
                                            {{ $notification->title }}
                                            <span
                                                class="text-xs tracking-wide bg-purple-500/10 px-2 py-0.5 rounded-md text-purple-500 font-semibold">New</span></span>

                                        <span class="text-[13px] flex items-center gap-2 text-foreground">Amount:
                                            {{ $rechargeInfo->amount }}
                                            Taka</span>

                                    </span>

                                    <span
                                        class="absolute bottom-2.5 right-1.5 text-xs text-white rounded-sm tracking-wide bg-sky-500 px-2 py-0.5 font-semibold">
                                        {{ $notification->created_at->diffForHumans() }}
                                    </span>
                                </a>
                            </li>

                            <!-- This is for Brilliant recharge -->
                        @elseif ($notification->type === 'brilliant_recharge')
                            @php
                                $brilliantInfo = \App\Models\BrilliantRecharge::where(
                                    'id',
                                    $notification->service_id,
                                )->first();
                            @endphp
                            <li>
                                <a class="relative flex gap-3 px-3.5 py-3 transition-all hover:bg-gray-200/50 dark:hover:bg-gray-500/20"
                                    href="{{ route('admin.brilliant-recharge-request') }}">

                                    <span
                                        class="flex items-center justify-center h-10 w-10 rounded bg-rose-500 shadow-[0_3px_7px] shadow-rose-500/40">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-credit-card  h-6 w-6 text-white">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M3 8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3l0 -8" />
                                            <path d="M3 10l18 0" />
                                            <path d="M7 15l.01 0" />
                                            <path d="M11 15l2 0" />
                                        </svg>
                                    </span>

                                    <span class="block">
                                        <!-- title -->
                                        <span
                                            class="text-sm mb-1 font-semibold text-foreground line-clamp-1 flex items-center gap-3">
                                            {{ $notification->title }}
                                            <span
                                                class="text-xs tracking-wide bg-rose-500/10 px-2 py-0.5 rounded-md text-rose-500 font-semibold">New</span></span>

                                        <span class="text-[13px] flex items-center gap-2 text-foreground">
                                            Amount: {{ $brilliantInfo->amount }} Taka
                                        </span>
                                    </span>

                                    <span
                                        class="absolute bottom-2.5 right-1.5 text-xs text-white rounded-sm tracking-wide bg-sky-500 px-2 py-0.5 font-semibold">
                                        {{ $notification->created_at->diffForHumans() }}
                                    </span>
                                </a>
                            </li>

                            <!-- This is for Bill Payment -->
                        @elseif ($notification->type === 'bill_payment')
                            @php
                                $billPaymentInfo = \App\Models\BillPayment::where(
                                    'id',
                                    $notification->service_id,
                                )->first();
                            @endphp
                            <li>
                                <a class="relative flex gap-3 px-3.5 py-3 transition-all hover:bg-gray-200/50 dark:hover:bg-gray-500/20"
                                    href="{{ route('admin.bill-payment-details', $notification->service_id) }}">

                                    <span
                                        class="flex items-center justify-center h-10 w-10 rounded bg-pink-500 shadow-[0_3px_7px] shadow-pink-500/40">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-receipt w-6 h-6 text-white">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2m4 -14h6m-6 4h6m-2 4h2" />
                                        </svg>
                                    </span>

                                    <span class="block">
                                        <!-- title -->
                                        <span
                                            class="text-sm mb-1 font-semibold text-foreground line-clamp-1 flex items-center gap-3">
                                            {{ $notification->title }}
                                            <span
                                                class="text-xs tracking-wide bg-pink-500/10 px-2 py-0.5 rounded-md text-pink-500 font-semibold">New</span></span>

                                        <span class="text-[13px] flex items-center gap-2 text-foreground">
                                            Amount: {{ $billPaymentInfo->amount }} Taka
                                        </span>
                                    </span>

                                    <span
                                        class="absolute bottom-2.5 right-1.5 text-xs text-white rounded-sm tracking-wide bg-sky-500 px-2 py-0.5 font-semibold">
                                        {{ $notification->created_at->diffForHumans() }}
                                    </span>
                                </a>
                            </li>

                            <!-- This is for Diamond purchase -->
                        @elseif ($notification->type === 'order')
                            @php
                                $orderInfo = \App\Models\OrderList::where('id', $notification->service_id)->first();
                            @endphp
                            <li>
                                <a class="relative flex gap-3 px-3.5 py-3 transition-all hover:bg-gray-200/50 dark:hover:bg-gray-500/20"
                                    href="{{ route('admin.order-details', $orderInfo->order_id) }}">

                                    @if ($orderInfo->order_type === 'gaming_package')
                                        <span
                                            class="flex items-center justify-center h-10 w-10 rounded bg-cyan-500 shadow-[0_3px_7px] shadow-cyan-500/40">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-diamond w-6 h-6 text-white">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M6 5h12l3 5l-8.5 9.5a.7 .7 0 0 1 -1 0l-8.5 -9.5l3 -5" />
                                                <path d="M10 12l-2 -2.2l.6 -1" />
                                            </svg>
                                        </span>
                                    @else
                                        <span
                                            class="flex items-center justify-center h-10 w-10 rounded bg-amber-500 shadow-[0_3px_7px] shadow-amber-500/40">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-device-sim w-6 h-6 text-white">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M6 3h8.5l4.5 4.5v12.5a1 1 0 0 1 -1 1h-12a1 1 0 0 1 -1 -1v-16a1 1 0 0 1 1 -1" />
                                                <path d="M9 11h3v6" />
                                                <path d="M15 17v.01" />
                                                <path d="M15 14v.01" />
                                                <path d="M15 11v.01" />
                                                <path d="M9 14v.01" />
                                                <path d="M9 17v.01" />
                                            </svg>
                                        </span>
                                    @endif

                                    <span class="block">
                                        <!-- title -->
                                        <span
                                            class="text-sm mb-1 font-semibold text-foreground line-clamp-1 flex items-center gap-3">
                                            {{ $notification->title }}
                                            <span
                                                class="text-xs tracking-wide bg-amber-500/10 px-2 py-0.5 rounded-md text-amber-500 font-semibold">New</span></span>

                                        <span class="text-[13px] flex items-center gap-2 text-foreground line-clamp-1">
                                            {{ $orderInfo->title }}
                                        </span>

                                    </span>

                                    <span
                                        class="absolute bottom-2.5 right-1.5 text-xs text-white rounded-sm tracking-wide bg-sky-500 px-2 py-0.5 font-semibold">
                                        {{ $notification->created_at->diffForHumans() }}
                                    </span>
                                </a>
                            </li>
                        @endif
                    @endforeach

                </ul>
            </div>
        @endif
        <!-- Dropdown End -->
    </div>

</div>
