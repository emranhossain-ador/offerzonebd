<?php

use Livewire\Component;
use App\Models\SimPackages;

new class extends Component {
    public $packageId = null;

    public $operator = 'gp';
    public $type = 'internet';
    public $title = '';
    public $price = '';
    public $validity = '';
    public $package_type = 'regular';
    public $msg = '';

    public function mount($packageId = null)
    {
        if ($packageId) {
            $package = SimPackages::find($packageId);
            if ($package) {
                $this->operator = $package->operator;
                $this->type = $package->type;
                $this->price = $package->price;
                $this->validity = $package->validity;
                $this->title = $package->title;
                $this->package_type = $package->package_type;
            }
        } else {
            $this->operator = 'gp';
            $this->type = 'internet';
            $this->price = '';
            $this->validity = '';
            $this->title = '';
            $this->package_type = 'regular';
        }
    }

    public function save()
    {
        $validation = [
            'operator' => 'required',
            'type' => 'required',
            'title' => 'required',
            'price' => 'required',
            'validity' => 'required',
            'package_type' => 'required',
        ];

        $this->validate($validation);

        $data = [
            'operator' => $this->operator,
            'type' => $this->type,
            'title' => $this->title,
            'price' => $this->price,
            'validity' => $this->validity,
            'package_type' => $this->package_type,
        ];

        if ($this->packageId) {
            $package = SimPackages::find($this->packageId);
            $package->update($data);
            $msg = 'Sim Package updated successfully';
        } else {
            SimPackages::create($data);
            $msg = 'Sim Package created successfully';
        }

        $this->reset();
        $this->msg = $msg;
        $this->dispatch('save-success');

        $this->dispatch('redirect-after', url: route('admin.sim-package'));
    }
};
?>

<div class="max-w-2xl space-y-2">

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

    <div class="card max-w-2xl">
        <form wire:submit.prevent="save">
            <div class="card-header">
                <h2 class="text-foreground">Create Package</h2>
            </div>
            <div class="card-body space-y-4">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <label class="mb-1.5 pl-1 block text-sm font-normal text-foreground/80">
                            Select Operator <span class="text-red-500">*</span>
                        </label>
                        <select class="default-input" wire:model="operator">
                            <option class="dark:bg-gray-800" value="gp">GP</option>
                            <option class="dark:bg-gray-800" value="robi">Robi</option>
                            <option class="dark:bg-gray-800" value="airtel">Airtel</option>
                            <option class="dark:bg-gray-800" value="bl">Banglalink</option>
                            <option class="dark:bg-gray-800" value="teletalk">Teletalk</option>
                        </select>

                        @error('operator')
                            <p class="text-red-500 text-xs mt-1"><i class="ri-error-warning-line"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-1.5 pl-1 block text-sm font-normal text-foreground/80">
                            Select Type <span class="text-red-500">*</span>
                        </label>
                        <select class="default-input" wire:model="type">
                            <option class="dark:bg-gray-800" value="internet">Internet</option>
                            <option class="dark:bg-gray-800" value="minute">Minutes</option>
                            <option class="dark:bg-gray-800" value="bundle">Bundle</option>
                        </select>

                        @error('type')
                            <p class="text-red-500 text-xs mt-1"><i class="ri-error-warning-line"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>

                <!-- Title -->
                <div class="block">
                    <label class="mb-1.5 pl-1 block text-sm font-normal text-foreground/80">
                        Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text" class="default-input" wire:model="title" placeholder="Enter title">

                    @error('title')
                        <p class="text-red-500 text-xs mt-1"><i class="ri-error-warning-line"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="grid grid-col-1 md:grid-cols-2 gap-4">

                    <div class="block">
                        <label class="mb-1.5 pl-1 block text-sm font-normal text-foreground/80">
                            Price <span class="text-red-500">*</span>
                        </label>
                        <input type="text" class="default-input" wire:model="price" placeholder="Enter Price"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">

                        @error('price')
                            <p class="text-red-500 text-xs mt-1"><i class="ri-error-warning-line"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="block">
                        <label class="mb-1.5 pl-1 block text-sm font-normal text-foreground/80">
                            Validity <span class="text-red-500">*</span>
                        </label>
                        <input type="text" class="default-input" wire:model="validity" placeholder="Enter Days"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">

                        @error('validity')
                            <p class="text-red-500 text-xs mt-1"><i class="ri-error-warning-line"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="block md:w-1/2 w-full">
                    <label class="mb-1.5 pl-1 block text-sm font-normal text-foreground/80">
                        Package Type <span class="text-red-500">*</span>
                    </label>
                    <select class="default-input" wire:model="package_type">
                        <option class="dark:bg-gray-800" value="regular">Regular</option>
                        <option class="dark:bg-gray-800" value="drive">Drive</option>
                    </select>

                    @error('package_type')
                        <p class="text-red-500 text-xs mt-1"><i class="ri-error-warning-line"></i> {{ $message }}
                        </p>
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
