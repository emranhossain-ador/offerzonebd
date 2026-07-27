<?php

use Livewire\Component;
use App\Models\BillOperators;

new class extends Component {
    public function billOperators()
    {
        return BillOperators::latest()->get();
    }

    public function changeStatus(int $id)
    {
        $operator = BillOperators::find($id);
        $operator->status = $operator->status == 'active' ? 'deactive' : 'active';
        $operator->save();
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
                    <th class="px-3 py-4 whitespace-nowrap">Image</th>
                    <th class="px-3 py-4 whitespace-nowrap">Title</th>
                    <th class="px-3 py-4 whitespace-nowrap">Status</th>
                </tr>
            </thead>
            <!-- Table Body -->
            <tbody>

                @foreach ($this->billOperators() as $key => $billOperator)
                    <tr wire:key="{{ $billOperator->id }}"
                        class="border-y border-border divide-x divide-border odd:bg-background text-foreground/80 font-medium tracking-wide text-sm">
                        <td class="px-3 py-4 pl-5 whitespace-nowrap">{{ $key + 1 }}</td>
                        <td class="px-3 py-1.5">
                            <div class="w-12 h-12 flex justify-center items-center rounded border border-border">
                                <img src="{{ asset('assets/images/bill-brands/' . $billOperator->slug . '.png') }}"
                                    alt="" class="w-full h-full object-contain rounded">
                            </div>
                        </td>
                        <td class="px-3 py-4">{{ $billOperator->title }}</td>
                        <td class="px-3 py-4">
                            @if ($billOperator->status == 'active')
                                <button wire:click="changeStatus({{ $billOperator->id }})"
                                    class="px-2 py-1 cursor-pointer rounded shadow-[0_3px_5px] shadow-emerald-500/40 dark:bg-emerald-600 whitespace-nowrap bg-emerald-500 text-white text-xs font-semibold"><i
                                        class="ri-check-line font-black"></i> Active</button>
                            @else
                                <button wire:click="changeStatus({{ $billOperator->id }})"
                                    class="px-2 py-1 cursor-pointer rounded shadow-[0_3px_5px] shadow-red-500/40 dark:bg-red-600 whitespace-nowrap bg-red-500 text-white text-xs font-semibold"><i
                                        class="ri-prohibited-2-line font-black"></i> Deactive</button>
                            @endif
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>

</div>
