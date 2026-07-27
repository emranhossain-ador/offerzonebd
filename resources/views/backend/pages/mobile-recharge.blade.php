@extends('backend.partials.admin-app')
@section('content')
    <!-- Title -->
    <div class="flex items-center justify-between">
        <!-- Left Title -->
        <h1 class="text-base md:text-lg font-semibold text-foreground">Mobile Recharge</h1>
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
                <li class="text-sm text-foreground">Mobile Recharge</li>
            </ol>
        </nav>
    </div>


    <div class="card">
        <div class="card-header">
            <h1 class="text-sm md:text-lg font-semibold text-foreground">Mobile Recharge Requests</h1>
        </div>
        <div class="card-body">

            <livewire:admin.mobile-recharge-request-table />

        </div>
    </div>
@endsection
