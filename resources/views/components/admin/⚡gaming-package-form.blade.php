<?php

use Livewire\Component;
use App\Models\GamingPackages;

new class extends Component {
    public $id = null;

    public $title = '';
    public $price = '';

    public $msg = '';

    public function mount($id = null)
    {
        if ($id) {
            $this->id = $id;
            $package = GamingPackages::find($id);
            $this->title = $package->title;
            $this->price = $package->price;
        }
    }

    public function save()
    {
        $this->validate([
            'title' => 'required',
            'price' => 'required|numeric',
        ]);

        $data = [
            'title' => $this->title,
            'price' => $this->price,
        ];

        if ($this->id != null) {
            GamingPackages::where('id', $this->id)->update($data);
            $msg = 'Package Updated successfully';
        } else {
            GamingPackages::create($data);
            $msg = 'Package created successfully';
        }

        $this->reset();

        $this->msg = $msg;
        $this->dispatch('save-success');

        $this->dispatch('redirect-after', url: route('admin.free-fire-diamond'));
    }
};
?>

<div class="max-w-xl space-y-3">
    <!-- Message area -->
    <div x-data="{ showMsg: false }"
        x-on:save-success.window="
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

    <div class="card">
        <form wire:submit.prevent="save">
            <div class="card-header">
                <h2 class="text-foreground">Create Package</h2>
            </div>
            <div class="card-body space-y-4">

                <div class="block">
                    <label class="mb-1.5 pl-1 block text-sm font-normal text-foreground/80">
                        Package Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text" class="default-input" placeholder="Enter Total Diamond" wire:model="title">

                    @error('title')
                        <p class="text-red-500 text-xs mt-1"><i class="ri-error-warning-line"></i> {{ $message }}</p>
                    @enderror
                </div>

                <!-- price Options -->
                <div class="block">
                    <label class="mb-1.5 pl-1 block text-sm font-normal text-foreground/80">
                        Price <span class="text-red-500">*</span>
                    </label>
                    <input type="text" class="default-input" placeholder="Enter Regular Price"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')" wire:model="price">

                    @error('price')
                        <p class="text-red-500 text-xs mt-1"><i class="ri-error-warning-line"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5">
                    <button type="submit" wire:loading.attr="disabled" wire:target="save"
                        class="px-7 py-2.5 w-full text-base flex items-center justify-center gap-1.5 tracking-wider rounded transition-all cursor-pointer bg-primary text-white shadow-md shadow-primary/20 hover:bg-primary/80">
                        <span wire:loading.remove wire:target="save" class="flex items-center justify-center gap-1.5">
                            <i class="fa-regular fa-floppy-disk"></i> Save Change
                        </span>

                        <span wire:loading wire:target="save"
                            class="flex flex-row items-center justify-center gap-2 text-sm font-semibold">
                            <span wire:loading wire:target="save"
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
                            Saving...
                        </span>
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>
