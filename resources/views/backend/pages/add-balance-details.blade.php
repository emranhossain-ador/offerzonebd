@extends('backend.partials.admin-app')
@section('content')
    <!-- Title -->
    <div class="flex items-center justify-between">
        <!-- Left Title -->
        <h1 class="text-base md:text-lg font-semibold text-foreground">Add Balance Details</h1>
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
                        href="{{ route('admin.add-balance') }}">
                        Add Balance
                        <svg class="stroke-current" width="17" height="16" viewBox="0 0 17 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.0765 12.667L10.2432 8.50033L6.0765 4.33366" stroke="" stroke-width="1.2"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </a>
                </li>
                <li class="text-sm text-foreground">Add Balance Details</li>
            </ol>
        </nav>
    </div>


    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
        <!-- Recharge Information -->
        <div class="card col-span-2">
            <div class="card-header">
                <h2 class="text-base md:text-lg ">Recharge Information</h2>
            </div>
            <div class="card-body">

                <livewire:admin.add-balance-details :recharge="$recharge" />

            </div>
        </div>

        <!-- Customer Information -->
        <div class="card col-span-1 h-fit">
            <div class="card-header">
                <h2 class="text-base md:text-lg ">Customer Information</h2>
            </div>
            <div class="card-body">
                <ul>
                    <li class="flex items-center gap-3 py-1.5">
                        <span
                            class="w-7 h-7 shrink-0 rounded shadow-[0_4px_5px] shadow-primary/30 bg-primary whitespace-nowrap text-white flex items-center justify-center">
                            <i class="fa-regular fa-circle-user"></i>
                        </span>
                        <span class="text-sm font-semibold text-foreground">{{ $recharge->user->name }}</span>
                    </li>

                    @if ($recharge->user->phone)
                        <li class="flex items-center gap-3 py-1.5">
                            <span
                                class="w-7 h-7 shrink-0 rounded shadow-[0_4px_5px] shadow-primary/30 bg-primary whitespace-nowrap text-white flex items-center justify-center">
                                <i class="fa-solid fa-phone text-sm"></i>
                            </span>
                            <span class="text-sm font-semibold text-foreground">{{ $recharge->user->phone }}</span>
                        </li>
                    @endif

                    <li class="flex items-center gap-3 py-1.5">
                        <span
                            class="w-7 h-7 shrink-0 rounded shadow-[0_4px_5px] shadow-primary/30 bg-primary whitespace-nowrap text-white flex items-center justify-center">
                            <i class="fa-regular fa-envelope"></i>
                        </span>
                        <span class="text-sm font-semibold text-foreground">{{ $recharge->user->email }}</span>
                    </li>
                    <li class="flex items-center gap-3 py-1.5">
                        <span
                            class="w-7 h-7 shrink-0 rounded shadow-[0_4px_5px] shadow-primary/30 bg-primary whitespace-nowrap text-white flex items-center justify-center">
                            <i class="fa-solid fa-user-secret text-sm"></i>
                        </span>
                        <span class="text-sm font-semibold text-foreground">{{ $recharge->user->username }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
