<?php

use App\Models\OrderList;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;
    public $selectStatus = 'all';
    public $order_id = '';

    public function selectedStatus($status)
    {
        $this->selectStatus = $status;
    }

    protected $listeners = ['refresh-table' => 'refresh'];

    public function refresh()
    {
        $this->orderList();
    }

    public function orderList()
    {
        return OrderList::query()
            ->when($this->selectStatus !== 'all', function ($query) {
                $query->where('status', $this->selectStatus);
            })
            ->when($this->order_id !== '', function ($query) {
                $query->where('order_id', 'like', '%' . $this->order_id . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(50);
    }
};
?>

<div class="space-y-10">
    <!-- Order Filter Area -->
    <div class="card px-4 py-3">
        <div class="flex justify-between items-center flex-col lg:flex-row">
            <!-- Search Form -->
            <div class="w-full md:w-1/3 relative overflow-hidden">
                <!-- Search Input -->
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-muted-foreground"><i
                        class="ri-search-2-line"></i></span>
                <input type="search" wire:model.live="order_id" class="default-input pl-8 focus:ring-0"
                    placeholder="Search by order id...">
            </div>

            <!-- Filter Buttons -->
            <div
                class="w-full md:w-auto mt-4 md:mt-0 bg-accent p-1 rounded-md flex items-center gap-2 overflow-x-auto scrollbar-thin scrollbar-thumb-primary scrollbar-track-transparent">
                <!-- Filter Buttons -->
                <button wire:click="selectedStatus('all')"
                    class="inline-flex cursor-pointer whitespace-nowrap items-center px-3 py-2 gap-1.5 text-sm font-semibold rounded-sm {{ $selectStatus === 'all' ? 'text-primary bg-background' : 'text-foreground/90 hover:text-primary/80' }}">
                    <i class="ri-stack-line"></i>
                    All
                </button>

                <button wire:click="selectedStatus('pending')"
                    class="inline-flex cursor-pointer whitespace-nowrap items-center px-3 py-2 gap-1.5 text-sm font-semibold rounded-sm {{ $selectStatus === 'pending' ? 'text-primary bg-background' : 'text-foreground/90 hover:text-primary/80' }}">
                    <i class="ri-loader-4-line"></i>
                    Pending
                </button>

                <button wire:click="selectedStatus('delivered')"
                    class="inline-flex cursor-pointer whitespace-nowrap items-center px-3 py-2 gap-1.5 text-sm font-semibold rounded-sm {{ $selectStatus === 'delivered' ? 'text-primary bg-background' : 'text-foreground/90 hover:text-primary/80' }}">
                    <i class="ri-checkbox-circle-line"></i>
                    Delivered
                </button>

                <button wire:click="selectedStatus('rejected')"
                    class="inline-flex cursor-pointer whitespace-nowrap items-center px-3 py-2 gap-1.5 text-sm font-semibold rounded-sm {{ $selectStatus === 'rejected' ? 'text-primary bg-background' : 'text-foreground/90 hover:text-primary/80' }}">
                    <i class="ri-close-line"></i>
                    Rejected
                </button>
            </div>
        </div>
    </div>
    <!-- Order Filter Area -->


    <!-- Order List -->
    <div class="card px-4 py-3">
        @if ($this->orderList()->count() > 0)
            <!-- Order List -->
            <div
                class="overflow-x-auto w-full border border-border rounded-md scrollbar-thin scrollbar-thumb-primary scrollbar-track-transparent">
                <table class="w-full table-auto">
                    <!-- Table Header -->
                    <thead>
                        <tr class="bg-muted text-foreground text-sm font-semibold text-left">
                            <th class="px-3 py-4 pl-5 whitespace-nowrap">No.</th>
                            <th class="px-3 py-4 whitespace-nowrap">Order ID</th>
                            <th class="px-3 py-4 whitespace-nowrap">Customer</th>
                            <th class="px-3 py-4 whitespace-nowrap">Title</th>
                            <th class="px-3 py-4 whitespace-nowrap">Order Date</th>
                            <th class="px-3 py-4 whitespace-nowrap">Price</th>
                            <th class="px-3 py-4 whitespace-nowrap">Status</th>
                            <th class="px-3 py-4 whitespace-nowrap text-center">Actions</th>
                        </tr>
                    </thead>
                    <!-- Table Body -->
                    <tbody>

                        @foreach ($this->orderList() as $key => $item)
                            <tr
                                class="border-y border-border odd:bg-background text-foreground/80 font-normal tracking-wide text-sm">
                                <td class="px-3 py-4 pl-5 whitespace-nowrap">{{ $key + 1 }}</td>
                                <td class="px-3 py-4 whitespace-nowrap">
                                    <span
                                        class="font-semibold text-sm tracking-wide px-2 py-1 bg-primary/10 text-primary rounded whitespace-nowrap">#{{ $item->order_id }}</span>
                                </td>
                                <td class="px-3 py-4 whitespace-nowrap">{{ $item->customer_name }}</td>
                                <td class="px-3 py-4">
                                    <span class="text-sm font-semibold">{{ $item->title }}</span>
                                </td>
                                <td class="px-3 py-4 whitespace-nowrap">
                                    <span
                                        class="text-sm font-semibold tracking-wide bg-sky-500/10 text-sky-500 rounded px-2 py-1 whitespace-nowrap">
                                        {{ $item->created_at->format('d-m-Y') }}
                                    </span>
                                    <br>
                                    <span
                                        class="text-xs font-medium text-white tracking-wide bg-sky-500 rounded px-2 py-1 whitespace-nowrap mt-2 inline-block">
                                        <i class="ri-time-line"></i> {{ $item->created_at->diffForHumans() }}
                                    </span>
                                </td>
                                <td class="px-3 py-4 whitespace-nowrap">৳ {{ number_format($item->price, 2) }}</td>
                                <td class="px-3 py-4 whitespace-nowrap">

                                    {!! statusBadge($item->status) !!}

                                </td>
                                <td class="px-3 py-4 text-center whitespace-nowrap">
                                    <div class="flex gap-2 justify-center">

                                        <a href="{{ route('admin.order-details', $item->order_id) }}"
                                            class="px-2.5 py-1.5 rounded bg-sky-500 text-sm text-white shadow-[0_2px_5px] shadow-sky-500/50 hover:shadow-none hover:bg-transparent hover:text-sky-500 border border-sky-500 font-normal transition-colors duration-200 cursor-pointer whitespace-nowrap">
                                            <i class="ri-eye-line"></i>
                                            View
                                        </a>

                                        <button onclick="confirmDelete({{ $item->id }}, 'order_lists')"
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

            <div class="mt-5 px-2">
                {{ $this->orderList()->links() }}
            </div>
        @else
            <div class="text-center py-10">
                <i class="ri-search-line text-4xl text-gray-400"></i>
                <p class="mt-2 text-gray-500">No orders found</p>
            </div>
        @endif
    </div>
</div>
