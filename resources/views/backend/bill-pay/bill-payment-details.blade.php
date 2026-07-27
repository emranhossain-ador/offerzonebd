@extends('backend.partials.admin-app')
@section('content')
    <!-- Title -->
    <div class="flex items-center justify-between">
        <!-- Left Title -->
        <h1 class="text-lg font-semibold text-foreground">Bill Details</h1>
        <!-- Link -->
        <nav>
            <ol class="flex items-center gap-1.5">
                <li>
                    <a class="inline-flex items-center gap-1.5 text-sm text-foreground/60 hover:text-foreground/80"
                        href="{{ route('admin.dashboard') }}">
                        Home
                        <svg class="stroke-current" width="17" height="16" viewBox="0 0 17 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.0765 12.667L10.2432 8.50033L6.0765 4.33366" stroke="" stroke-width="1.2"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </a>
                </li>
                <li>
                    <a class="inline-flex items-center gap-1.5 text-sm text-foreground/60 hover:text-foreground/80"
                        href="{{ route('admin.bill-payment-request') }}">
                        Bill Payment Request
                        <svg class="stroke-current" width="17" height="16" viewBox="0 0 17 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.0765 12.667L10.2432 8.50033L6.0765 4.33366" stroke="" stroke-width="1.2"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </a>
                </li>
                <li class="text-sm text-foreground">Bill Details</li>
            </ol>
        </nav>
    </div>

    <div class="card max-w-4xl">
        <div class="card-header border-b border-border">
            <h5 class="text-foreground">Transaction Details</h5>
        </div>
        <div class="card-body space-y-6 flex items-start gap-5 flex-col md:flex-row">

            <!-- Top Section: Status & Amount -->
            <div class="space-y-4 w-full md:w-1/2">
                <h4 class="text-lg font-semibold text-foreground">Bill Payment Details</h4>
                <ul class="space-y-4">
                    <li class="flex items-center gap-4">
                        <span class="text-sm font-semibold text-foreground">Operator :</span>
                        <span class="text-sm text-foreground/80 font-normal">
                            {{ $billPayment->operator->title }}</span>
                    </li>

                    <li class="flex items-center gap-4">
                        <span class="text-sm font-semibold text-foreground">Bill Number :</span>
                        <span class="text-sm text-foreground/80 font-normal">{{ $billPayment->bill_number }}</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <span class="text-sm font-semibold text-foreground">Bill Amount :</span>
                        <span class="text-sm text-foreground/80 font-normal">৳ {{ $billPayment->amount }}</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <span class="text-sm font-semibold text-foreground">Mobile Number :</span>
                        <span class="text-sm text-foreground/80 font-normal">{{ $billPayment->mobile_number }}</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <span class="text-sm font-semibold text-foreground">Status :</span>
                        <span class="text-sm text-foreground/80 font-normal">{!! statusBadge($billPayment->status) !!}</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <span class="text-sm font-semibold text-foreground">Created At :</span>
                        <span class="text-sm text-foreground/80 font-normal">
                            {{ $billPayment->created_at->format('d M, Y H:i A') }}</span>
                    </li>
                    <li class="flex items-start gap-2 flex-col">
                        <span class="text-sm font-semibold text-foreground">Note :</span>
                        <span class="text-sm text-foreground/80 font-normal">
                            {{ $billPayment->note ?? 'No note available' }}</span>
                    </li>
                </ul>
            </div>

            <!-- Top Section: Status & Amount -->
            <div class="space-y-4 w-full md:w-1/2">
                <h4 class="text-lg font-semibold text-foreground">User Information</h4>
                <ul class="space-y-4">
                    <li class="flex items-center gap-4">
                        <span class="text-sm font-semibold text-foreground">Name :</span>
                        <span class="text-sm text-foreground/80 font-normal">
                            {{ $billPayment->user->name }}</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <span class="text-sm font-semibold text-foreground">Email :</span>
                        <span class="text-sm text-foreground/80 font-normal">
                            {{ $billPayment->user->email }}</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <span class="text-sm font-semibold text-foreground">Username :</span>
                        <span class="text-sm text-foreground/80 font-normal">
                            {{ $billPayment->user->username }}</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <span class="text-sm font-semibold text-foreground">Balance :</span>
                        <span class="text-sm text-foreground/80 font-normal">
                            ৳ {{ $billPayment->user->balance }}</span>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    @if ($billPayment->status != 'success' && $billPayment->status != 'failed')
        <!-- Approve and Reject Form -->
        <div class="card max-w-4xl">
            <div class="card-header border-b border-border">
                <h5 class="text-foreground">Success or Faild</h5>
            </div>

            @php
                $data = ['id' => $billPayment->id, 'user_id' => $billPayment->user->id];
            @endphp

            <livewire:admin.bill-pay-details :data="$data" />

        </div>
    @endif
@endsection
