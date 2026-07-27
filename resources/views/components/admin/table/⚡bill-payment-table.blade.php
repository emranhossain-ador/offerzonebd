<?php

use App\Models\BillPayment;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    public function billPaymentRequest()
    {
        return BillPayment::with('user:id,name')->with('operator')->latest()->paginate(50);
    }
};
?>

<div>
    <div
        class="overflow-x-auto w-full border border-border rounded-md scrollbar-thin scrollbar-thumb-primary scrollbar-track-transparent">
        <table class="w-full table-auto">
            <!-- Table Header -->
            <thead>
                <tr class="bg-muted text-foreground text-sm font-semibold text-left divide-x divide-border">
                    <th class="px-3 py-4 pl-5 whitespace-nowrap">No.</th>
                    <th class="px-3 py-4 whitespace-nowrap">Images</th>
                    <th class="px-3 py-4 whitespace-nowrap">Bill Operator</th>
                    <th class="px-3 py-4 whitespace-nowrap">Bill Number</th>
                    <th class="px-3 py-4 whitespace-nowrap">Bill Amount</th>
                    <th class="px-3 py-4 whitespace-nowrap">Mobile Number</th>
                    <th class="px-3 py-4 whitespace-nowrap">Status</th>
                    <th class="px-3 py-4 whitespace-nowrap text-center">Action</th>
                </tr>
            </thead>
            <!-- Table Body -->
            <tbody>
                @foreach ($this->billPaymentRequest() as $key => $billPayment)
                    <tr wire:key="{{ $billPayment->id }}"
                        class="border-y border-border divide-x divide-border odd:bg-background text-foreground/80 font-medium tracking-wide text-sm">
                        <td class="px-3 py-4 pl-5 whitespace-nowrap">{{ $key + 1 }}</td>
                        <td class="px-3 py-1.5">
                            <div class="w-12 h-12 flex justify-center items-center rounded border border-border">
                                <img src="{{ asset('assets/images/bill-brands/' . $billPayment->operator->slug . '.png') }}"
                                    alt="" class="w-full h-full object-contain rounded">
                            </div>
                        </td>
                        <td class="px-3 py-4">{{ $billPayment->operator->title }}</td>
                        <td class="px-3 py-4">{{ $billPayment->bill_number }}</td>
                        <td class="px-3 py-4">৳ {{ $billPayment->amount }}</td>
                        <td class="px-3 py-4">{{ $billPayment->mobile_number }}</td>
                        <td class="px-3 py-4">
                            {!! statusBadge($billPayment->status) !!}
                        </td>
                        <td class="px-3 py-4 text-center">
                            <div class="flex gap-2 justify-center">
                                <a href="{{ route('admin.bill-payment-details', $billPayment->id) }}"
                                    class="px-2.5 py-1.5 rounded bg-cyan-500 text-sm text-white shadow-[0_2px_5px] shadow-cyan-500/50 hover:shadow-none hover:bg-transparent hover:text-cyan-500 border border-cyan-500 font-normal transition-colors duration-200 cursor-pointer whitespace-nowrap">
                                    <i class="ri-eye-line"></i>
                                    Details
                                </a>

                                <button onclick="confirmDelete(1, 'add_balance')"
                                    class="px-2.5 py-1.5 rounded bg-red-500 text-sm text-white shadow-[0_2px_5px] shadow-red-500/50 hover:shadow-none hover:bg-transparent hover:text-red-500 border border-red-500 font-normal transition-colors duration-200 cursor-pointer whitespace-nowrap">
                                    <i class="ri-delete-bin-line"></i>
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>

    <div class="mt-3">
        {{ $this->billPaymentRequest()->links() }}
    </div>
</div>
