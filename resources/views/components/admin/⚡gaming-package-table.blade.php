<?php

use Livewire\Component;
use App\Models\GamingPackages;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    // get all packages
    public function packageList()
    {
        return GamingPackages::orderBy('id', 'desc')->cursorPaginate(30);
    }

    // refresh table when popup alert dis
    protected $listeners = ['refresh-table' => 'refreshTable'];

    // refresh table
    public function refreshTable()
    {
        $this->packageList();
    }

    // change package status
    public function changeStatus($id)
    {
        $package = GamingPackages::find($id);
        $package->status = $package->status == 'active' ? 'deactive' : 'active';
        $package->save();

        $title = $package->status == 'active' ? 'Package activated successfully' : 'Package deactivated successfully';
        $icon = $package->status == 'active' ? 'success' : 'error';

        $this->dispatch('popup-alert', title: $title, icon: $icon);
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
                    <th class="px-3 py-4 whitespace-nowrap">Title</th>
                    <th class="px-3 py-4 whitespace-nowrap">Price</th>
                    <th class="px-3 py-4 whitespace-nowrap">Status</th>
                    <th class="px-3 py-4 whitespace-nowrap text-center">Actions</th>
                </tr>
            </thead>
            <!-- Table Body -->
            <tbody>
                @forelse($this->packageList() as $key => $package)
                    <tr
                        class="border-y border-border divide-x divide-border odd:bg-background text-foreground/80 font-medium tracking-wide text-sm">
                        <td class="px-3 py-4 pl-5 whitespace-nowrap">{{ $key + 1 }}</td>
                        <td class="px-3 py-4">
                            <span class="max-w-48 block">{{ $package->title }}</span>
                        </td>
                        <td class="px-3 py-4">৳ {{ number_format($package->price, 2) }}</td>
                        <td class="px-3 py-4">
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
                        <td class="px-3 py-4 truncate">
                            <div class="flex gap-2 justify-center">
                                <a href="{{ route('admin.edit-free-fire-diamond', $package->id) }}"
                                    class="px-2.5 py-1.5 rounded bg-sky-500 text-sm text-white shadow-[0_2px_5px] shadow-sky-500/50 hover:shadow-none hover:bg-transparent hover:text-sky-500 border border-sky-500 font-normal transition-colors duration-200 cursor-pointer whitespace-nowrap">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                    Edit
                                </a>

                                <button onclick="confirmDelete({{ $package->id }}, 'gaming_packages')"
                                    class="px-2.5 py-1.5 rounded bg-red-500 text-sm text-white shadow-[0_2px_5px] shadow-red-500/50 hover:shadow-none hover:bg-transparent hover:text-red-500 border border-red-500 font-normal transition-colors duration-200 cursor-pointer whitespace-nowrap">
                                    <i class="ri-delete-bin-line"></i>
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="px-3 py-4 text-center" colspan="5">No packages found.</td>
                    </tr>
                @endforelse

            </tbody>
        </table>

    </div>

    <div class="mt-4">
        {{ $this->packageList()->links() }}
    </div>
</div>
