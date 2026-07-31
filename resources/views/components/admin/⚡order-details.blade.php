<?php

use App\Models\OrderList;
use App\Models\User;
use App\Models\Notifications;
use Livewire\Component;

new class extends Component {
    public $orderDetails;
    public $reject_reason = '';

    public function orderDelivered($id)
    {
        // Handle order delivered logic
        $order = OrderList::find($id);
        $order->status = 'delivered';
        $order->save();

        if ($this->orderDetails->order_type == 'sim_package') {
            $des = 'আপনার অর্ডারকৃত "- ' . $order->title . ' -" প্যাকেজটি সফলভাবে ডেলিভারি করা হয়েছে ✅। প্যাকেজটি আপনার দেওয়া "- ' . $order->offer_number . ' -" নম্বরে সফলভাবে অ্যাক্টিভ করা হয়েছে। অনুগ্রহ করে আপনার নম্বরটি চেক করুন।';
        } else {
            $des = 'আপনার অর্ডারকৃত "- ' . $order->title . ' -" প্যাকেজটি সফলভাবে ডেলিভারি করা হয়েছে ✅। অনুগ্রহ করে চেক করুন।';
        }

        // Notification
        Notifications::create([
            'title' => 'আপনার অর্ডারটি সফলভাবে ডেলিভারি করা হয়েছে ✅',
            'user_id' => $order->user_id,
            'service_id' => $order->id,
            'type' => 'order',
            'description' => $des,
            'is_seen' => false,
        ]);

        return redirect()->route('admin.orders');
    }

    public function orderReject()
    {
        $this->validate([
            'reject_reason' => 'required',
        ]);

        $order = OrderList::find($this->orderDetails->id);

        User::where('id', $order->user_id)->increment('balance', $order->price);

        $order->status = 'rejected';
        $order->save();

        // Notification
        Notifications::create([
            'title' => 'আপনার অর্ডারটি রিজেক্ট করা হয়েছে ❌',
            'user_id' => $order->user_id,
            'service_id' => $order->id,
            'type' => 'order',
            'description' => 'আপনার অর্ডারকৃত ' . $order->title . ' প্যাকেজটি রিজেক্ট করা হয়েছে ❌। ' . $this->reject_reason,
            'is_seen' => false,
        ]);

        $this->dispatch('popup-alert', title: 'Order Rejected!!', icon: 'error');

        $this->dispatch('redirect-after', url: route('admin.orders'));
    }
};
?>

<div x-data="{ reject: false }" class="space-y-12">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Order InFo card -->
        <div class="card">
            <div class="card-header flex items-center justify-between">
                <h2 class="text-lg font-semibold text-foreground">Order Information</h2>
                <h1 class="text-lg font-semibold text-primary">Order ID: #{{ $orderDetails->order_id }}</h1>
            </div><!-- Card Header End -->

            @if ($orderDetails->order_type == 'sim_package')
                <div class="card-body space-y-3">
                    <div
                        class="flex items-center gap-5 flex-col md:flex-row md:items-center justify-center md:justify-start ">
                        <!-- Image -->
                        <div class="w-20 h-20 shrink-0">
                            <img src="{{ asset('assets/images/operator/' . $orderDetails->sim_package->operator . '.webp') }}"
                                alt="{{ ucfirst($orderDetails->sim_package->operator) }}"
                                class="h-full w-full object-cover">
                        </div>
                        <!-- Info -->
                        <div>
                            <span
                                class="text-sm font-semibold text-sky-500 bg-sky-500/10 px-2 py-1 rounded uppercase tracking-wide mb-1.5 inline-block">{{ $orderDetails->sim_package->operator }}</span>

                            <h3 class="text-base lg:text-lg font-semibold">{{ $orderDetails->title }}</h3>

                            <p class="text-sm text-muted-foreground">Duration:
                                {{ $orderDetails->sim_package->validity }} days</p>
                        </div>
                    </div>

                    <div class="flex gap-1 flex-col justify-start ">
                        <span class="font-semibold text-foreground">Package Type:
                            {{ ucfirst($orderDetails->sim_package->package_type) }}</span>
                        <span class="font-semibold text-foreground">Price: ৳
                            {{ number_format($orderDetails->price, 2) }}</span>
                        <span class="font-semibold text-foreground">Order Date:
                            {{ $orderDetails->created_at->format('d-m-Y') }}</span>
                    </div>

                    <div class="flex items-center justify-between mt-4 border border-primary/40 p-2 rounded-md">
                        <div class="flex items-center gap-3">
                            <span
                                class="w-9 h-9 flex items-center justify-center bg-primary text-white rounded-md text-lg"><i
                                    class="ri-secure-payment-fill"></i></span>
                            <span class="text-[17px] tracking-wide font-semibold text-primary">+88
                                {{ $orderDetails->offer_number }}</span>
                        </div>

                        <button
                            class="w-9 h-9 flex items-center justify-center bg-primary/10 text-primary border border-primary/10 rounded-[6px] text-lg cursor-pointer transition-all hover:bg-primary/20 copyBtn"
                            data-copy="{{ $orderDetails->offer_number }}" title="Copy"><i
                                class="ri-file-copy-line"></i></button>
                    </div>

                </div>
            @elseif ($orderDetails->order_type == 'gaming_package')
                <div class="card-body space-y-3 ">
                    <!-- Image -->
                    <div class="w-32 h-auto shrink-0">
                        <img src="{{ asset('assets/images/icon-diamond.png') }}" alt="Product Image"
                            class="w-full h-full object-cover">
                    </div>

                    <div class="flex gap-1 flex-col justify-start ">
                        <span class="font-semibold text-foreground">Title: {{ $orderDetails->title }}</span>
                        <span class="font-semibold text-foreground">Price: ৳
                            {{ number_format($orderDetails->price, 2) }}</span>
                        <span class="font-semibold text-foreground">Order Date:
                            {{ $orderDetails->created_at->format('d-m-Y') }}</span>
                    </div>

                    <div class="flex gap-1 flex-col justify-start ">
                        <span class="font-semibold text-foreground">Game Name: {{ $orderDetails->game_name }}</span>
                        <span class="font-semibold text-foreground">Player ID: {{ $orderDetails->player_id }}</span>

                        @if ($orderDetails->status == 'rejected')
                            <span class="font-semibold text-foreground">Status: <span
                                    class="text-red-500 text-sm font-black tracking-wider"><i
                                        class="ri-prohibited-line"></i> Rejected</span></span>
                        @endif

                    </div>

                </div>
            @endif


            @if ($orderDetails->status != 'delivered' && $orderDetails->status != 'rejected')
                <div class="flex items-center justify-between p-3.5">
                    <button type="button" @click="reject = true"
                        class="px-5 py-2.5 text-sm font-semibold bg-red-500 text-white rounded shadow-[0px_4px_6px] cursor-pointer hover:opacity-80 hover:shadow-red-500/50 shadow-red-500/30"><i
                            class="fa-solid fa-xmark"></i> Reject</button>

                    <button wire:click="orderDelivered({{ $orderDetails->id }})"
                        class="px-5 py-2.5 text-sm font-semibold bg-emerald-500 text-white rounded shadow-[0px_4px_6px] cursor-pointer hover:opacity-80 hover:shadow-emerald-500/50 shadow-emerald-500/30"><i
                            class="fa-solid fa-check"></i> Delivered</button>
                </div>
            @endif

        </div><!-- Card End -->

        <!-- Customer Info card -->
        <div class="card h-fit">
            <div class="card-header flex items-center justify-between">
                <h2 class="text-lg font-semibold text-foreground">Customer Information</h2>
            </div><!-- Card Header End -->

            <div class="card-body space-y-3">
                <div class="flex gap-1 flex-col justify-start ">
                    <span class="font-semibold text-foreground">Name: {{ $orderDetails->customer_name }}</span>
                    <span class="font-semibold text-foreground">Email: {{ $orderDetails->customer_email }}</span>
                    <span class="font-semibold text-foreground">Username: {{ $orderDetails->customer_username }}</span>
                </div>
            </div>
        </div><!-- Card End -->
    </div>

    <div :class="reject ? 'opacity-100 z-30' : 'opacity-0 -z-10'"
        class="fixed top-0 left-0 w-full h-full bg-black/20 backdrop-blur-sm transition-all"></div>
    <div :class="reject ? 'translate-y-0' : 'translate-y-full'"
        class="fixed bottom-0 left-[50%] translate-x-[-50%] w-full md:w-sm p-4 bg-card border border-border rounded-b-none rounded-md shadow-md z-50 transition-all duration-300 ">
        <div class="py-2 flex items-center justify-between">
            <h5 class="text-foreground/90">Order Reject Reason</h5>

            <button type="button" @click="reject = false"
                class="w-8 h-8 rounded-full flex items-center justify-center transition-all text-red-500 bg-red-500/10 border border-red-500/10 hover:bg-red-500 hover:text-white cursor-pointer"><i
                    class="ri-close-line text-lg font-black!"></i></button>
        </div>
        <form wire:submit="orderReject" class="w-full flex flex-col items-center gap-3">
            <textarea wire:model="reject_reason"
                class="w-full bg-white/10 dark:bg-input/20 py-2.5 px-3 border border-border rounded-sm focus:outline-none"
                id="" cols="5" rows="5"></textarea>

            <button type="submit"
                class="w-full py-3 tracking-wide px-3 text-sm font-semibold bg-red-500 text-white rounded-full cursor-pointer transition-all hover:bg-red-600">Reject</button>
        </form>
    </div>

</div>
