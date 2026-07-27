<?php

use App\Models\AdminSettings;
use App\Models\SimPackages;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    public $operator = 'all';
    public $search = '';
    public $package_type = 'regular';

    public function packageList()
    {
        return SimPackages::query()
            ->when($this->operator != 'all', function ($query) {
                $query->where('operator', $this->operator);
            })
            ->when($this->search != '', function ($query) {
                $query->where('title', 'like', '%' . trim($this->search) . '%');
            })
            ->where('package_type', $this->package_type)
            ->orderBy('id', 'desc')
            ->paginate(50);
    }

    public function fillterByPackageType(string $type)
    {
        $this->package_type = $type;
    }

    // Change package status
    public function changeStatus($id)
    {
        $package = SimPackages::find($id);
        $package->status = $package->status == 'active' ? 'deactive' : 'active';
        $package->save();

        $title = $package->status == 'active' ? 'Package activated successfully' : 'Package deactivated successfully';
        $icon = $package->status == 'active' ? 'success' : 'error';

        $this->dispatch('popup-alert', title: $title, icon: $icon);
    }

    // Filter by operator
    public function filterByOperator($operator)
    {
        $this->operator = $operator;
    }

    // Filter by search
    public function filterBySearch($search)
    {
        $this->search = $search;
    }

    protected $listeners = ['refresh-table' => 'refresh'];

    public function refresh()
    {
        $this->packageList();
    }

    public function isDrive($id)
    {
        $setting = AdminSettings::findOrFail($id);

        $setting->is_drive_active = $setting->is_drive_active ? false : true;
        $setting->save();

        $title = $setting->is_drive_active == 1 ? 'Drive package activated' : 'Drive package deactivated';
        $icon = $setting->is_drive_active == 1 ? 'success' : 'error';

        $this->dispatch('popup-alert', title: $title, icon: $icon);
    }
};
?>

<div class="space-y-7">
    <!-- sim offer Filter Area -->
    <div class="card px-4 py-3 flex flex-col md:flex-row items-center md:justify-between gap-4">
        <!-- Search Form -->
        <div class="w-full md:w-1/3 relative overflow-hidden">
            <!-- Search Input -->
            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-muted-foreground"><i
                    class="ri-search-2-line"></i></span>
            <input type="search" class="default-input pl-8 focus:ring-0" wire:model.live="search"
                placeholder="Search by offer title...">
        </div>

        <!-- Filter Buttons -->
        <div
            class="w-full md:w-auto mt-4 md:mt-0 bg-accent p-1 rounded-md flex items-center gap-2 overflow-x-auto scrollbar-thin scrollbar-thumb-primary scrollbar-track-transparent">
            <!-- Filter Buttons -->
            <button wire:click="filterByOperator('all')"
                class="inline-flex items-center px-4 py-2 gap-1.5 text-sm font-semibold rounded-sm cursor-pointer {{ $operator == 'all' ? 'text-primary bg-background' : 'text-foreground/90 hover:text-primary/80' }}">
                All
            </button>
            <button wire:click="filterByOperator('gp')"
                class="inline-flex items-center px-4 py-2 gap-1.5 text-sm font-semibold rounded-sm cursor-pointer {{ $operator == 'gp' ? 'text-primary bg-background' : 'text-foreground/90 hover:text-primary/80' }}">
                GP
            </button>
            <button wire:click="filterByOperator('robi')"
                class="inline-flex items-center px-3 py-2 gap-1.5 text-sm font-semibold rounded-sm cursor-pointer {{ $operator == 'robi' ? 'text-primary bg-background' : 'text-foreground/90 hover:text-primary/80' }}">
                Robi
            </button>
            <button wire:click="filterByOperator('airtel')"
                class="inline-flex items-center px-3 py-2 gap-1.5 text-sm font-semibold rounded-sm cursor-pointer {{ $operator == 'airtel' ? 'text-primary bg-background' : 'text-foreground/90 hover:text-primary/80' }}">
                Airtel
            </button>
            <button wire:click="filterByOperator('bl')"
                class="inline-flex items-center px-3 py-2 gap-1.5 text-sm font-semibold rounded-sm cursor-pointer {{ $operator == 'bl' ? 'text-primary bg-background' : 'text-foreground/90 hover:text-primary/80' }}">
                Banglalink
            </button>
            <button wire:click="filterByOperator('teletalk')"
                class="inline-flex items-center px-3 py-2 gap-1.5 text-sm font-semibold rounded-sm cursor-pointer {{ $operator == 'teletalk' ? 'text-primary bg-background' : 'text-foreground/90 hover:text-primary/80' }}">
                Teletalk
            </button>
        </div>
    </div>
    <!-- Order Filter Area -->


    <div class="card">
        <div class="card-header flex items-center justify-between py-2.5!">
            <h1 class="text-foreground">Package List</h1>
            <a href="{{ route('admin.create-sim-package') }}" class="add-new-btn">
                <i class="fa-solid fa-plus"></i> Add New
            </a>
        </div>
        <div class="card-body space-y-3">

            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4 w-fit bg-background/50 rounded-lg p-1.5 border border-border">
                    <button type="button" wire:click="fillterByPackageType('regular')"
                        class="px-4 py-2.5 rounded-sm font-semibold text-sm tracking-wide cursor-pointer {{ $package_type === 'regular' ? 'bg-primary border border-primary text-white' : 'bg-card border border-border text-foreground hover:text-primary hover:border-primary' }}">
                        Regular Pack
                    </button>

                    <button type="button" wire:click="fillterByPackageType('drive')"
                        class="px-4 py-2.5 rounded-sm font-semibold text-sm tracking-wide cursor-pointer {{ $package_type === 'drive' ? 'bg-primary border border-primary text-white' : 'bg-card border border-border text-foreground hover:text-primary hover:border-primary' }}">
                        Drive Pack
                    </button>
                </div>

                @if ($package_type === 'drive')
                    @if (_adminSettingById(1)->is_drive_active == true)
                        <button type="button" wire:click="isDrive(1)"
                            class="px-4 py-2 rounded shadow-[0_3px_8px] shadow-red-500/50 bg-red-500 text-white font-semibold text-sm tracking-wide cursor-pointer transition-all hover:bg-red-600 hover:shadow-none">
                            <i class="ri-prohibited-line text-lg"></i>
                            All Deactive
                        </button>
                    @else
                        <button type="button" wire:click="isDrive(1)"
                            class="px-4 py-2 rounded shadow-[0_3px_8px] shadow-green-500/50 bg-green-500 text-white font-semibold text-sm tracking-wide cursor-pointer transition-all hover:bg-green-600 hover:shadow-none">
                            <i class="ri-check-line text-lg font-black!"></i>
                            All Active
                        </button>
                    @endif
                @endif
            </div>

            @if ($this->packageList()->total() > 0)
                <div
                    class="overflow-x-auto w-full border border-border rounded-md scrollbar-thin scrollbar-thumb-primary scrollbar-track-transparent">
                    <table class="w-full table-auto">
                        <!-- Table Header -->
                        <thead>
                            <tr class="bg-muted text-foreground text-sm font-semibold text-left divide-x divide-border">
                                <th class="px-3 py-4 pl-5 whitespace-nowrap">No.</th>
                                <th class="px-3 py-4 whitespace-nowrap">Title</th>
                                <th class="px-3 py-4 whitespace-nowrap">Operator</th>
                                <th class="px-3 py-4 whitespace-nowrap">Price</th>
                                <th class="px-3 py-4 whitespace-nowrap">Validity</th>
                                <th class="px-3 py-4 whitespace-nowrap">Type</th>
                                <th class="px-3 py-4 whitespace-nowrap">Package Type</th>
                                <th class="px-3 py-4 whitespace-nowrap">Status</th>
                                <th class="px-3 py-4 whitespace-nowrap text-center">Actions</th>
                            </tr>
                        </thead>
                        <!-- Table Body -->
                        <tbody>

                            @foreach ($this->packageList() as $key => $package)
                                <tr
                                    class="border-y border-border divide-x divide-border odd:bg-background text-foreground/80 font-medium tracking-wide text-sm">
                                    <td class="px-3 py-4 pl-5 whitespace-nowrap">{{ $key + 1 }}</td>
                                    <td class="px-3 py-4">
                                        <span class="max-w-48 block">{{ $package->title }}</span>
                                    </td>
                                    <td class="px-3 py-4 whitespace-nowrap">
                                        <div class="w-10 h-10 rounded overflow-hidden border shadow border-border">
                                            <img src="{{ asset('assets/images/operator/' . $package->operator . '.webp') }}"
                                                alt="{{ $package->operator }}"
                                                class="w-full h-full object-center rounded">
                                        </div>
                                    </td>
                                    <td class="px-3 py-4">
                                        <span
                                            class="text-sm font-semibold">৳{{ number_format($package->price, 2) }}</span>
                                    </td>
                                    <td class="px-3 py-4 whitespace-nowrap">
                                        {{ $package->validity }} Days
                                    </td>
                                    <td class="px-3 py-4 whitespace-nowrap">
                                        <span class="font-semibold">{{ ucwords($package->type) }}</span>
                                    </td>
                                    <td class="px-3 py-4 whitespace-nowrap">
                                        @if ($package->package_type == 'regular')
                                            <span
                                                class="px-2 py-1 rounded shadow-[0_3px_5px] shadow-cyan-500/40 dark:bg-cyan-600 whitespace-nowrap bg-cyan-500 text-white text-xs font-semibold">{{ ucwords($package->package_type) }}</span>
                                        @else
                                            <span
                                                class="px-2 py-1 rounded shadow-[0_3px_5px] shadow-fuchsia-500/40 dark:bg-fuchsia-600 whitespace-nowrap bg-fuchsia-500 text-white text-xs font-semibold">{{ ucwords($package->package_type) }}</span>
                                        @endif

                                    </td>
                                    <td class="px-3 py-4 whitespace-nowrap">

                                        @if ($package->status == 'active')
                                            <button wire:click="changeStatus({{ $package->id }})"
                                                class="px-2 py-1 cursor-pointer rounded shadow-[0_3px_5px] shadow-emerald-500/40 dark:bg-emerald-600 whitespace-nowrap bg-emerald-500 text-white text-xs font-semibold"><i
                                                    class="ri-check-line font-black"></i> Active</button>
                                        @else
                                            <button wire:click="changeStatus({{ $package->id }})"
                                                class="px-2 py-1 cursor-pointer rounded shadow-[0_3px_5px] shadow-red-500/40 dark:bg-red-600 whitespace-nowrap bg-red-500 text-white text-xs font-semibold"><i
                                                    class="ri-prohibited-2-line font-black"></i> Deactive</button>
                                        @endif

                                    </td>
                                    <td class="px-3 py-4 text-center whitespace-nowrap">
                                        <div class="flex gap-2 justify-center">

                                            <a href="{{ route('admin.edit-sim-package', $package->id) }}"
                                                class="px-2.5 py-1.5 rounded bg-sky-500 text-sm text-white shadow-[0_2px_5px] shadow-sky-500/50 hover:shadow-none hover:bg-transparent hover:text-sky-500 border border-sky-500 font-normal transition-colors duration-200 cursor-pointer whitespace-nowrap">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                                Edit
                                            </a>

                                            <button onclick="confirmDelete({{ $package->id }}, 'sim_packages')"
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

                <div class="mt-5">
                    {{ $this->packageList()->links() }}
                </div>
            @else
                <div class="text-center py-10">
                    <i class="ri-search-line text-4xl text-muted-foreground"></i>
                    <p class="mt-2 text-muted-foreground">No Sim Package found</p>
                </div>

            @endif

        </div>
    </div>
</div>
