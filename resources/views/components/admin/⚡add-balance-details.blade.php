<?php

use Livewire\Component;
use App\Models\User;
use App\Models\AddBalance;
use App\Models\Transactions;
use App\Models\Notifications;

new class extends Component {
    public $recharge;
    public $amount;
    public $reject_reason;

    // Initialize component with recharge data
    public function mount()
    {
        $this->amount = $this->recharge->amount;
        $this->reject_reason = '⚠️ ভুল পেমেন্ট তথ্যের কারণে অ্যাডমিন আপনার রিকোয়েস্টটি বাতিল করেছেন। সঠিক তথ্য দিয়ে পুনরায় রিকোয়েস্ট করুন।';
    }

    // Handle approve recharge request
    public function approveRecharge()
    {
        User::where('id', $this->recharge->user_id)->increment('balance', $this->amount);

        $rechargeRequest = AddBalance::find($this->recharge->id);

        if ($rechargeRequest) {
            $rechargeRequest->update(['status' => 'approved']);
        }

        $transation = Transactions::where('user_id', $this->recharge->user_id)->where('service_id', $rechargeRequest->id)->where('type', 'deposit')->first();

        if ($transation) {
            $transation->update(['status' => 'success']);
        }

        // Notification
        Notifications::create([
            'title' => 'রিচার্জ ব্যালেন্স অ্যাড হয়েছে',
            'user_id' => $this->recharge->user_id,
            'service_id' => $this->recharge->id,
            'type' => 'deposit',
            'description' => 'আপনার পেন্ডিং রিচার্জ ব্যালেন্স রিকোয়েস্টটি সফলভাবে এপ্রুভ হয়েছে। ৳' . $this->amount . '.00 টাকা আপনার ব্যালেন্সে যোগ হয়েছে। আপনার নতুন ব্যালেন্স ৳' . $this->recharge->user->balance . '.00 টাকা।',
            'is_seen' => false,
        ]);

        $this->dispatch('recharge-approved', ['url' => route('admin.add-balance')]);
    }

    // Reject recharge request
    public function rejectRecharge()
    {
        $rechargeRequest = AddBalance::find($this->recharge->id);

        if ($rechargeRequest) {
            $rechargeRequest->update(['status' => 'rejected', 'reject_reason' => $this->reject_reason]);
        }

        $transation = Transactions::where('user_id', $this->recharge->user_id)->where('service_id', $rechargeRequest->id)->where('type', 'deposit')->first();

        if ($transation) {
            $transation->update(['status' => 'failed']);
        }

        // Notification
        Notifications::create([
            'title' => 'আপনার রিচার্জ রিকোয়েস্টটি রিজেক্ট করা হয়েছে',
            'user_id' => $this->recharge->user_id,
            'service_id' => $this->recharge->id,
            'type' => 'deposit',
            'description' => $this->reject_reason,
            'is_seen' => false,
        ]);

        $this->dispatch('recharge-rejected', ['url' => route('admin.add-balance')]);
    }
};
?>

<div>

    <!-- Recharge form content will go here -->
    <ul class="pb-4 mb-4">
        <li class="flex items-center gap-3 py-1">
            <span class="text-sm font-normal text-muted-foreground">Payment Method:</span>
            <span class="text-[15px] font-semibold text-foreground capitalize">{{ $recharge->payment_method }}</span>
        </li>
        <li class="flex items-center gap-3 py-1">
            <span class="text-sm font-normal text-muted-foreground">Payment Number:</span>
            <span class="text-[15px] font-semibold text-foreground capitalize">{{ $recharge->payment_number }}</span>
        </li>
        <li class="flex items-center gap-3 py-1">
            <span class="text-sm font-normal text-muted-foreground">Sender Number:</span>
            <span class="text-[15px] font-semibold text-foreground">{{ $recharge->sender_number }}</span>
        </li>
        <li class="flex items-center gap-3 py-1">
            <span class="text-sm font-normal text-muted-foreground">Amount:</span>
            <span class="text-[15px] font-semibold text-foreground">{{ $recharge->amount }} ৳</span>
        </li>
        <li class="flex items-center gap-3 py-1">
            <span class="text-sm font-normal text-muted-foreground">Transaction ID:</span>
            <span class="text-[15px] font-semibold text-foreground">{{ $recharge->trx_id }}</span>
        </li>
        <li class="flex items-center gap-3 py-1">
            <span class="text-sm font-normal text-muted-foreground">Date:</span>
            <span class="text-[15px] font-semibold text-foreground">
                <i class="ri-calendar-line"></i>
                {{ $recharge->created_at->format('d M Y') . ' - ' . $recharge->created_at->format('h:i A') }}
            </span>
        </li>
        <li class="flex items-center gap-3 py-1">
            <span class="text-sm font-normal text-muted-foreground">Status:</span>
            <span
                class="text-[15px] font-semibold capitalize tracking-wider text-{{ $recharge->status }}">{{ $recharge->status }}</span>
        </li>

    </ul>

    @if ($recharge->status != 'rejected' && $recharge->status != 'approved')
        <div x-data="{ tab: 'approve' }" class="border-t-2 border-dashed border-primary/50 pt-4 space-y-8">
            <div class="flex items-center gap-3">
                <button @click="tab = 'approve'"
                    :class="tab === 'approve' ? 'bg-emerald-500 border border-emerald-500 text-white' :
                        'bg-emerald-500/10 border border-emerald-500/50 text-emerald-500 hover:opacity-80'"
                    class="px-5 py-2 w-full md:w-fit text-sm font-semibold rounded cursor-pointer"><i
                        class="fa-solid fa-check font-black!"></i> Approve</button>
                <button @click="tab = 'reject'"
                    :class="tab === 'reject' ? 'bg-red-500 border border-red-500 text-white' :
                        'bg-red-500/10 border border-red-500/50 text-red-500 hover:opacity-80'"
                    class="px-5 py-2 w-full md:w-fit text-sm font-semibold rounded cursor-pointer"><i
                        class="fa-solid fa-xmark font-black!"></i> Reject</button>
            </div>

            <!-- Tab content -->
            <div
                class="tab-content max-w-lg bg-background/50 rounded-md border border-dashed border-primary/50 p-2 md:p-4">

                <!-- Balance request approve are -->
                <form x-show="tab === 'approve'" x-cloak x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    wire:submit.prevent="approveRecharge" class="space-y-4">

                    <div>
                        <label class="text-sm mb-1 pl-1 block font-normal text-muted-foreground">Amount
                            <span class="text-red-500">*</span>
                        </label>

                        <div class="relative">
                            <span class="input-icon">
                                <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                            </span>
                            <input type="text" placeholder="Enter Amount" wire:model="amount"
                                class="input-group-input">
                        </div>
                        @error('amount')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-end ">
                        <button type="submit" wire:loading.attr="disabled" wire:target="approveRecharge"
                            class="px-5 py-2.5 w-full md:w-fit flex items-center justify-center text-sm font-semibold bg-emerald-500 text-white rounded shadow-[0px_4px_6px] cursor-pointer hover:opacity-80 hover:shadow-emerald-500/50 shadow-emerald-500/30">
                            <span wire:loading.remove wire:target="approveRecharge" class="flex items-center gap-2">
                                <i class="fa-solid fa-check"></i>Approve
                            </span>

                            <span wire:loading wire:target="approveRecharge"
                                class="flex flex-row items-center justify-center gap-2 text-sm font-semibold">
                                <span wire:loading wire:target="approveRecharge"
                                    class="flex items-center justify-center gap-2 text-sm font-semibold">
                                    <svg class="h-4 w-4 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>

                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                </span>
                                Approving...
                            </span>
                        </button>
                    </div>

                </form>


                <!-- Balance request reject are -->
                <form x-show="tab === 'reject'" x-cloak x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    wire:submit.prevent="rejectRecharge" class="space-y-4 ">
                    <div>
                        <label class="text-sm mb-1 pl-1 block font-normal text-muted-foreground">Reject Reason
                            <span class="text-red-500">*</span>
                        </label>

                        <textarea placeholder="Enter Reject Reason" wire:model="reject_reason" class="textarea" cols="4" rows="5"></textarea>
                        @error('reject_reason')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex justify-end ">
                        <button type="submit" wire:loading.attr="disabled" wire:target="rejectRecharge"
                            class="px-5 py-2.5 w-full md:w-fit flex items-center justify-center text-sm font-semibold bg-red-500 text-white rounded shadow-[0px_4px_6px] cursor-pointer hover:opacity-80 hover:shadow-red-500/50 shadow-red-500/30">
                            <span wire:loading.remove wire:target="rejectRecharge" class="flex items-center gap-2">
                                <i class="fa-solid fa-xmark"></i> Reject
                            </span>

                            <span wire:loading wire:target="rejectRecharge"
                                class="flex flex-row items-center justify-center gap-2 text-sm font-semibold">
                                <span wire:loading wire:target="rejectRecharge"
                                    class="flex items-center justify-center gap-2 text-sm font-semibold">
                                    <svg class="h-4 w-4 animate-spin" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>

                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                </span>
                                Rejecting...
                            </span>
                        </button>
                    </div>
                </form>


            </div>

            {{-- <button wire:click="rejectRecharge()"
                class="px-5 py-2.5 text-sm font-semibold bg-red-500 text-white rounded-sm shadow-[0px_4px_6px] cursor-pointer hover:opacity-80 hover:shadow-red-500/50 shadow-red-500/30"><i
                    class="fa-solid fa-xmark"></i> Reject</button>

            <button wire:click="approveRecharge()"
                class="px-5 py-2.5 text-sm font-semibold bg-emerald-500 text-white rounded-sm shadow-[0px_4px_6px] cursor-pointer hover:opacity-80 hover:shadow-emerald-500/50 shadow-emerald-500/30"><i
                    class="fa-solid fa-check"></i> Approve</button> --}}

        </div>
    @endif

</div>
