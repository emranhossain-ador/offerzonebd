<?php

use Livewire\Component;
use App\Models\PaymentMethod;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;

new class extends Component
{
    use WithPagination;

    public $name;
    public $number;
    public $msg;
    public $id;


    public function mount()
    {
        $this->name = '';
        $this->number = '';
        $this->id = '';
    }

    public function paymentMethods()
    {
        return PaymentMethod::orderBy('id', 'desc')->paginate(5);
    }

    // Validate and store the form data
    public function store()
    {
        $this->validate([
            'name' => ['required','string','max:255', Rule::unique('payment_methods', 'name')->ignore($this->id)],
            'number' => ['required','string','min:11', 'max:11'],
        ]);

        $data = [
            'name' => $this->name,
            'pay_number' => $this->number,
        ];

        if($this->id) {
            PaymentMethod::where('id', $this->id)->update($data);
            $msg = 'Payment method updated successfully';
        } else {
            PaymentMethod::create($data);
            $msg = 'Payment method added successfully';
        }

        $this->reset();

        $this->msg = $msg;

        $this->paymentMethods();
        $this->dispatch('payment-method-save');
    }


    public function edit($id)
    {
        $paymentMethod = PaymentMethod::find($id);
        $this->name = $paymentMethod->name;
        $this->number = $paymentMethod->pay_number;
        $this->id = $id;
        $this->dispatch('payment-method-edit');
    }


    public function toggleStatus($id){
        $paymentMethod = PaymentMethod::find($id);
        $paymentMethod->status = $paymentMethod->status == 'active' ? 'inactive' : 'active';
        $paymentMethod->save();
        $this->paymentMethods();
    }


    protected $listeners = ['refresh-table' => 'refreshTable'];

    public function refreshTable()
    {
        $this->paymentMethods();
    }
};
?>



<div class="space-y-3.5">
    <!-- Message area -->
    <div x-data="{ showMsg: false }"
        x-on:payment-method-save.window="
            showMsg = true;
            setTimeout(() => showMsg = false, 3000);
        ">
        <div x-show="showMsg" x-cloak x-collapse
            class="flex px-4 py-2.5 rounded shadow-md bg-emerald-500 items-center gap-4">
            <span class="text-white"><i class="ri-checkbox-circle-line text-3xl"></i></span>
            <div>
                <p class="text-lg text-white tracking-wide">{{ $this->msg }}</p>
            </div>
        </div>
    </div>
    <!-- Message area -->


    <div x-data="{formShow: false }" x-on:payment-method-edit.window="formShow = true" x-on:payment-method-save.window="formShow = false" class="card mt-3">
        <div class="card-header flex items-center justify-between py-2!">
            <h2 class="text-base md:text-lg font-semibold">Payment Methods</h2>
            <button @click="formShow = !formShow"  class="text-sm text-white px-3.5 py-2 rounded bg-primary hover:bg-primary/90 hover:shadow-none transition-colors shadow-[0_2px_5px_0px] shadow-primary/50 cursor-pointer">
                <i class="fa-solid fa-plus"></i> Add New
            </button>
        </div>

        <!-- Table -->
        <div x-show="!formShow" class="card-body p-0!">
            <div class="overflow-x-auto w-full border border-border rounded-t-none rounded-b-md scrollbar-thin scrollbar-thumb-primary scrollbar-track-transparent">
                <table class="w-full table-auto">
                    <!-- Table Header -->
                    <thead>
                        <tr class="bg-muted text-foreground text-sm font-semibold text-left divide-x divide-border">
                            <th class="px-3 py-4 pl-5 whitespace-nowrap">No.</th>
                            <th class="px-3 py-4 whitespace-nowrap">Method Name</th>
                            <th class="px-3 py-4 whitespace-nowrap">Payment Number</th>
                            <th class="px-3 py-4 whitespace-nowrap">Status</th>
                            <th class="px-3 py-4 whitespace-nowrap text-center">Actions</th>
                        </tr>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                        @foreach($this->paymentMethods() as $key => $paymentMethod)
                            <!-- Example Row -->
                            <tr wire:key="payment-method-{{ $paymentMethod->id }}" class="border-y divide-x divide-border border-border odd:bg-background text-foreground/80 font-normal tracking-wide text-sm">
                                <td class="px-3 py-4 pl-5 whitespace-nowrap">{{ $key + 1 }}</td>
                                <td class="px-3 py-4 whitespace-nowrap">{{ $paymentMethod->name }}</td>
                                <td class="px-3 py-4 whitespace-nowrap">{{ $paymentMethod->pay_number }}</td>
                                <td class="px-3 py-4 whitespace-nowrap">

                                    @if($paymentMethod->status == 'active')
                                        <button wire:click="toggleStatus({{ $paymentMethod->id }})" class="px-3 py-1 rounded shadow-[0_3px_5px] shadow-green-500/40 dark:bg-green-600 whitespace-nowrap bg-green-500 text-white text-xs font-semibold cursor-pointer">Active</button>
                                    @else
                                        <button wire:click="toggleStatus({{ $paymentMethod->id }})" class="px-3 py-1 rounded shadow-[0_3px_5px] shadow-red-500/40 dark:bg-red-600 whitespace-nowrap bg-red-500 text-white text-xs font-semibold cursor-pointer">Inactive</button>
                                    @endif

                                </td>
                                <td class="px-3 py-4 whitespace-nowrap">
                                    <div class="flex items-center justify-center gap-2">
                                        <button wire:click="edit({{ $paymentMethod->id }})" class="px-2.5 py-1.5 rounded bg-sky-500 text-sm text-white shadow-[0_2px_5px] shadow-sky-500/50 hover:shadow-none hover:bg-transparent hover:text-sky-500 border border-sky-500 font-normal transition-colors duration-200 cursor-pointer whitespace-nowrap">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                            Edit
                                        </button>

                                        <button onclick="confirmDelete({{ $paymentMethod->id }}, 'payment_methods')" type="button" class="px-2.5 py-1.5 rounded bg-red-500 text-sm text-white shadow-[0_2px_5px] shadow-red-500/50 hover:shadow-none hover:bg-transparent hover:text-red-500 border border-red-500 font-normal transition-colors duration-200 cursor-pointer whitespace-nowrap">
                                            <i class="fa-regular fa-trash-can"></i>
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="my-4 px-4">
                    {{ $this->paymentMethods()->links() }}
                </div>

            </div>
        </div>

        <!-- Payment Methods Form -->
        <form x-show="formShow" x-cloak wire:submit.prevent="store" >
            <div class="card-body space-y-3">

                <div class="block">
                    <label class="mb-1.5 pl-1 block text-sm font-normal text-foreground/80">
                        Payment Methods Name <span class="text-red-500">*</span>
                    </label>
                    <select wire:model="name" class="default-input">
                        <option value="">Select Payment Methods Name</option>
                        <option value="bkash">Bkash</option>
                        <option value="nagad">Nagad</option>
                        <option value="rocket">Rocket</option>
                        <option value="upay">Upay</option>
                    </select>

                    @error('name')
                        <span class="text-red-500 text-xs"><i class="ri-alert-fill"></i> {{ $message }}</span>
                    @enderror
                </div>

                <div class="block">
                    <label class="mb-1.5 pl-1 block text-sm font-normal text-foreground/80">
                        Payment Number <span class="text-red-500">*</span>
                    </label>
                    <input type="text" class="default-input" placeholder="Enter Payment Number" wire:model="number" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    @error('number')
                        <span class="text-red-500 text-xs"><i class="ri-alert-fill"></i> {{ $message }}</span>
                    @enderror
                </div>

                <input type="text" wire:model="id" class="hidden">

                <div class="mt-5">
                    <button type="submit" wire:loading.attr="disabled" wire:target="store" class="px-7 py-2.5 w-full text-base flex items-center justify-center gap-1.5 tracking-wider rounded transition-all cursor-pointer bg-primary text-white shadow-md shadow-primary/20 hover:bg-primary/80 disabled:opacity-70 disabled:cursor-not-allowed">
                        <span wire:loading.remove wire:target="store" class="flex items-center justify-center gap-1.5">
                            <i class="fa-regular fa-floppy-disk"></i> Save Change
                        </span>
                        <span wire:loading wire:target="store" class="flex items-center justify-center gap-2">
                            <i class="ri-loader-4-line animate-spin text-lg"></i>
                            Saving...
                        </span>
                    </button>
                </div>

            </div>
        </form>

    </div>

</div>
