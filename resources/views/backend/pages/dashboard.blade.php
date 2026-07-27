@extends('backend.partials.admin-app')

@section('content')


    <!-- Title -->
    <div class="">
        <h1 class="text-2xl font-semibold tracking-tight text-slate-900 dark:text-white">Overview</h1>
        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Welcome back, here's what's happening today.</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">

        <!-- Card 1 -->
        <div class="group relative overflow-hidden rounded-lg border border-border bg-card p-5 shadow-md transition-all hover:-translate-y-1 hover:shadow-lg min-h-36">
            <div class="flex items-start justify-between h-full">
                <div class="flex flex-col justify-between h-full">
                    <p class="text-sm font-medium text-muted-foreground">Total Sell</p>
                    <h3 class="mt-2 text-2xl font-bold tracking-tight text-emerald-500">৳ {{ number_format($orderDetails->sum('price'), 2) }} <span class="text-xs font-normal text-muted-foreground">Sell</span></h3>
                </div>
                <div class="w-9 h-9 flex items-center justify-center bg-emerald-500 rounded shadow-sm shadow-emerald-500/20">
                    <i class="ri-money-dollar-circle-line text-2xl text-white"></i>
                </div>
            </div>
        </div>


        <!-- Card 1 -->
        <div class="group relative overflow-hidden rounded-lg border border-border bg-card p-5 shadow-md transition-all hover:-translate-y-1 hover:shadow-lg min-h-36">
            <div class="flex items-start justify-between h-full">
                <div class="flex flex-col justify-between h-full">
                    <p class="text-sm font-medium text-muted-foreground">Today Orders</p>
                    <h3 class="mt-2 text-2xl font-bold tracking-tight text-orange-500">{{ $todayOrders }} <span class="text-xs font-normal text-muted-foreground">orders</span></h3>
                </div>
                <div class="w-9 h-9 flex items-center justify-center bg-orange-500 rounded shadow-sm shadow-orange-500/20">
                    <i class="ri-shopping-bag-3-line text-2xl text-white font-normal!"></i>
                </div>
            </div>
        </div>

        <!-- Card 1 -->
        <div class="group relative overflow-hidden rounded-lg border border-border bg-card p-5 shadow-md transition-all hover:-translate-y-1 hover:shadow-lg min-h-36">
            <div class="flex items-start justify-between h-full">
                <div class="flex flex-col justify-between h-full">
                    <p class="text-sm font-medium text-muted-foreground">Active Users</p>
                    <h3 class="mt-2 text-2xl font-bold tracking-tight text-blue-500">{{ $customer }} <span class="text-xs font-normal text-muted-foreground">users</span></h3>
                </div>
                <div class="w-9 h-9 flex items-center justify-center bg-blue-500 rounded shadow-sm shadow-blue-500/20">
                    {!! _usersIcon() !!}
                </div>
            </div>
        </div>

        <!-- Card 1 -->
        <div class="group relative overflow-hidden rounded-lg border border-border bg-card p-5 shadow-md transition-all hover:-translate-y-1 hover:shadow-lg min-h-36">
            <div class="flex items-start justify-between h-full">
                <div class="flex flex-col justify-between h-full">
                    <p class="text-sm font-medium text-muted-foreground">Customer Recharge</p>
                    <h3 class="mt-2 text-2xl font-bold tracking-tight text-fuchsia-500">
                        ৳ {{ number_format($total_recharge) }} <span class="text-xs font-normal text-muted-foreground">recharge</span>
                    </h3>
                </div>
                <div class="w-9 h-9 flex items-center justify-center bg-fuchsia-500 rounded shadow-sm shadow-fuchsia-500/20">
                    <i class="ri-wallet-2-line text-2xl text-white"></i>
                </div>
            </div>
        </div>


    </div>


<div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

    <!-- Recent Orders -->
    <div class="card lg:col-span-2 h-fit">
        <div class="card-header">
            <h1 class="text-foreground">Recent Orders</h1>
        </div>
        <div class="card-body p-0!">
            <!-- Table or content can go here -->
            <div class="overflow-x-auto w-full border border-border rounded-t-none rounded-md scrollbar-thin scrollbar-thumb-primary scrollbar-track-transparent">
                <table class="w-full table-auto">
                    <!-- Table Header -->
                    <thead>
                        <tr class="bg-muted text-foreground text-sm font-semibold text-left divide-x divide-border">
                            <th class="px-3 py-4 whitespace-nowrap">Order ID</th>
                            <th class="px-3 py-4 whitespace-nowrap">Title</th>
                            <th class="px-3 py-4 whitespace-nowrap">Price</th>
                            <th class="px-3 py-4 whitespace-nowrap">Status</th>
                            <th class="px-3 py-4 whitespace-nowrap">Time</th>
                        </tr>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                        @foreach ($recentOrders as $order)
                        <!-- Example Row -->
                            <tr class="border-y border-border odd:bg-background text-foreground/80 font-normal tracking-wide text-sm divide-x divide-border">
                                <td class="px-3 py-4 whitespace-nowrap">
                                    <span class="font-semibold text-sm tracking-wide px-2 py-1 bg-primary/10 text-primary rounded whitespace-nowrap">#{{ $order->order_id }}</span>
                                </td>
                                <td class="px-3 py-4">
                                    <h3 class="text-sm">{{ $order->title }} Diamonds</h3>
                                </td>
                                <td class="px-3 py-4 whitespace-nowrap">৳ {{ $order->price }}</td>
                                <td class="px-3 py-4 whitespace-nowrap">
                                    {!! statusBadge($order->status) !!}
                                </td>
                                <td class="px-3 py-4 whitespace-nowrap">
                                    <label for="status-1" class="px-2 py-1 font-semibold text-xs tracking-wide">
                                        <i class="ri-time-line"></i> {{ $order->created_at->diffForHumans() }}
                                    </label>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Top Offers -->
    <div class="card h-fit">
        <div class="card-header">
            <h1 class="text-foreground">Top Offers</h1>
            <span class="text-sm text-muted-foreground">Best selling this week</span>
        </div>
        <div class="card-body">
            <!-- Table or content can go here -->
            <div class="space-y-4">
                <div>
                    <div class="flex justify-between text-sm mb-1.5">
                        <span class="font-medium truncate pr-2">GP 2GB / 7d</span><span class="text-muted-foreground">1284</span>
                    </div>
                    <div class="h-2 rounded-full bg-muted overflow-hidden">
                        <div
                            class="h-full bg-gradient-primary rounded-full transition-all"
                            style="width: 100%; animation-delay: 0ms"
                        ></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm mb-1.5">
                        <span class="font-medium truncate pr-2">FF 310 Diamonds</span><span class="text-muted-foreground">982</span>
                    </div>
                    <div class="h-2 rounded-full bg-muted overflow-hidden">
                        <div
                            class="h-full bg-gradient-primary rounded-full transition-all"
                            style="width: 76.4798%; animation-delay: 100ms"
                        ></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm mb-1.5">
                        <span class="font-medium truncate pr-2">Robi 1GB+100min</span><span class="text-muted-foreground">712</span>
                    </div>
                    <div class="h-2 rounded-full bg-muted overflow-hidden">
                        <div
                            class="h-full bg-gradient-primary rounded-full transition-all"
                            style="width: 55.4517%; animation-delay: 200ms"
                        ></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm mb-1.5">
                        <span class="font-medium truncate pr-2">BL Social 2GB</span><span class="text-muted-foreground">540</span>
                    </div>
                    <div class="h-2 rounded-full bg-muted overflow-hidden">
                        <div
                            class="h-full bg-gradient-primary rounded-full transition-all"
                            style="width: 42.0561%; animation-delay: 300ms"
                        ></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>





@endsection
