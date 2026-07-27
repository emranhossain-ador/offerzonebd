<?php

use Livewire\Component;
use App\Models\AddBalance;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    public function rechargeRequest()
    {
        return AddBalance::orderBy('id', 'desc')->with('user')->paginate(30);
    }

    protected $listeners = ['refresh-table' => 'refresh'];

    public function refresh()
    {
        $this->rechargeRequest();
    }
};
?>

<div>
    <!-- Table Content -->
    <div
        class="overflow-x-auto w-full border border-border rounded-md scrollbar-thin scrollbar-thumb-primary scrollbar-track-transparent">
        <table class="w-full table-auto">
            <!-- Table Header -->
            <thead>
                <tr class="bg-muted text-foreground text-sm font-semibold text-left">
                    <th class="px-3 py-4 pl-5 whitespace-nowrap">No.</th>
                    <th class="px-3 py-4 whitespace-nowrap">Name</th>
                    <th class="px-3 py-4 whitespace-nowrap">Payment Method</th>
                    <th class="px-3 py-4 whitespace-nowrap">Sender Number</th>
                    <th class="px-3 py-4 whitespace-nowrap">Amount</th>
                    <th class="px-3 py-4 whitespace-nowrap">Pay Date</th>
                    <th class="px-3 py-4 whitespace-nowrap">Status</th>
                    <th class="px-3 py-4 whitespace-nowrap text-center">Actions</th>
                </tr>
            </thead>
            <!-- Table Body -->
            <tbody>

                @foreach ($this->rechargeRequest() as $key => $recharge)
                    <!-- Example Row -->
                    <tr
                        class="border-y border-border odd:bg-background text-foreground/80 font-normal tracking-wide text-sm">
                        <td class="px-3 py-4 pl-5 whitespace-nowrap">{{ $key + 1 }}</td>
                        <td class="px-3 py-4 whitespace-nowrap">{{ $recharge->user->name }}</td>
                        <td class="px-3 py-4 whitespace-nowrap">
                            {!! paymentMethodBadge($recharge->payment_method) !!}
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap">
                            {{ $recharge->sender_number }}
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap">
                            ৳ {{ $recharge->amount }}.00
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap">
                            <span
                                class="px-2 py-1 rounded shadow-[0_3px_5px] shadow-cyan-500/40 dark:bg-cyan-600 whitespace-nowrap bg-cyan-500 text-white text-xs font-semibold"><i
                                    class="ri-time-line font-normal!"></i>
                                {{ $recharge->created_at->format('d M Y') . ' - ' . $recharge->created_at->format('h:i A') }}</span>
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap">
                            {!! statusBadge($recharge->status) !!}
                        </td>
                        <td class="px-3 py-4 text-center whitespace-nowrap">
                            <div class="flex gap-2 justify-center">

                                <a href="{{ route('admin.add-balance-details', $recharge->id) }}"
                                    class="px-2.5 py-1.5 rounded bg-cyan-500 text-sm text-white shadow-[0_2px_5px] shadow-cyan-500/50 hover:shadow-none hover:bg-transparent hover:text-cyan-500 border border-cyan-500 font-normal transition-colors duration-200 cursor-pointer whitespace-nowrap">
                                    <i class="ri-eye-line"></i>
                                    Details
                                </a>

                                <button onclick="confirmDelete({{ $recharge->id }}, 'add_balance')"
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
    @if (!empty($this->rechargeRequest()))
        <div class="mt-5">
            {{ $this->rechargeRequest()->links() }}
        </div>
    @endif
</div>
