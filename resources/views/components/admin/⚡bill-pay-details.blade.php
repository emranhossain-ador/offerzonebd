<?php

use Livewire\Component;
use App\Models\BillPayment;
use App\Models\Notifications;

new class extends Component {
    public int $id;
    public int $user_id;
    public string $failed_reason;

    public function mount($data)
    {
        $this->id = $data['id'];
        $this->user_id = $data['user_id'];
        $this->failed_reason = '';
    }

    public function success()
    {
        BillPayment::where('id', $this->id)
            ->where('user_id', $this->user_id)
            ->update(['status' => 'success']);

        $billPayment = BillPayment::with('operator')->where('id', $this->id)->where('user_id', $this->user_id)->first();

        // Notification
        Notifications::create([
            'title' => 'আপনার বিল পেমেন্ট সফল হয়েছে ✅',
            'user_id' => $this->user_id,
            'service_id' => $this->id,
            'type' => 'bill_payment',
            'description' => 'আপনার ' . $billPayment->amount . ' বিল পেমেন্ট সফল হয়েছে। অপারেটর: ' . $billPayment->operator->title . ' • বিল নম্বর: ' . $billPayment->bill_number . ' • মোবাইল নম্বর: ' . $billPayment->mobile_number . ' • মাস: ' . $billPayment->month . ' অনুগ্রহ করে তথ্যগুলো চেক করুন।',
            'is_seen' => false,
        ]);

        $this->dispatch('popup-alert', title: 'Bill Payment Successful');

        $this->dispatch('redirect-after', url: route('admin.bill-payment-request'));
    }

    public function billFailed()
    {
        $this->validate([
            'failed_reason' => 'required',
        ]);

        BillPayment::where('id', $this->id)
            ->where('user_id', $this->user_id)
            ->update(['status' => 'failed']);

        $billPayment = BillPayment::with('operator')->where('id', $this->id)->where('user_id', $this->user_id)->first();

        // Notification
        Notifications::create([
            'title' => 'আপনার বিল পেমেন্ট রিজেক্ট করা হয়েছে ❌',
            'user_id' => $this->user_id,
            'service_id' => $this->id,
            'type' => 'bill_payment',
            'description' => $this->failed_reason,
            'is_seen' => false,
        ]);

        $this->dispatch('popup-alert', title: 'Bill Payment Faild!!', icon: 'error');

        $this->dispatch('redirect-after', url: route('admin.bill-payment-request'));
    }
};
?>

<div x-data="{ faild: false }">
    <div class="card-body flex items-start gap-3">


        <button type="button" wire:click="success"
            class="px-5 py-2.5 bg-green-500 text-white rounded-xs hover:bg-green-600 transition-all duration-300 cursor-pointer tracking-wide"><i
                class="ri-check-line font-black"></i> Success</button>

        <button type="button" @click="faild = true"
            class="px-5 py-2.5 bg-red-500 text-white rounded-xs hover:bg-red-600 transition-all duration-300 cursor-pointer tracking-wide">
            <i class="ri-close-line font-black"></i> Failed
        </button>

    </div>


    <div :class="faild ? 'opacity-100 z-30' : 'opacity-0 -z-10'"
        class="fixed top-0 left-0 w-full h-full bg-black/20 backdrop-blur-sm transition-all"></div>
    <div :class="faild ? 'translate-y-0' : 'translate-y-full'"
        class="fixed bottom-0 left-[50%] translate-x-[-50%] w-full md:w-sm p-4 bg-card border border-border rounded-b-none rounded-md shadow-md z-50 transition-all duration-300 ">
        <div class="py-2 flex items-center justify-between">
            <h5 class="text-foreground/90">Bill Failed Reason</h5>

            <button type="button" @click="faild = false"
                class="w-8 h-8 rounded-full flex items-center justify-center transition-all text-red-500 bg-red-500/10 border border-red-500/10 hover:bg-red-500 hover:text-white cursor-pointer"><i
                    class="ri-close-line text-lg font-black!"></i></button>
        </div>
        <form wire:submit="billFailed" class="w-full flex flex-col items-center gap-3">
            <textarea wire:model="failed_reason"
                class="w-full bg-white/10 dark:bg-input/20 py-2.5 px-3 border border-border rounded-sm focus:outline-none"
                id="" cols="5" rows="5"></textarea>

            <button type="submit"
                class="w-full py-3 tracking-wide px-3 text-sm font-semibold bg-red-500 text-white rounded-full cursor-pointer transition-all hover:bg-red-600">Failed</button>
        </form>
    </div>

</div>
