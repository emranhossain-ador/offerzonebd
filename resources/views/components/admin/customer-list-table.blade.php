<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\OrderList;
use Livewire\Attributes\On;

new class extends Component {
    use WithPagination;

    public function customers()
    {
        return User::where('role', 'user')->orderBy('id', 'desc')->paginate(100);
    }

    public function changeStatus($id)
    {
        $customer = User::find($id);
        $customer->status = $customer->status == 'active' ? 'deactive' : 'active';
        $customer->save();
        $this->customers();
    }

    protected $listeners = ['refresh-table' => 'refresh'];

    public function refresh()
    {
        $this->customers();
    }

    public function forgetPassword($id)
    {
        $user = User::findOrFail($id);
        $user->password = Hash::make('123456');
        $user->save();

        $this->dispatch('popup-alert', title: 'Password reset successfully!');
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
                    <th class="px-3 py-4 whitespace-nowrap">Name & Email</th>
                    <th class="px-3 py-4 whitespace-nowrap">Username</th>
                    <th class="px-3 py-4 whitespace-nowrap">Orders & Joined</th>
                    <th class="px-3 py-4 whitespace-nowrap">Balance</th>
                    <th class="px-3 py-4 whitespace-nowrap">Status</th>
                    <th class="px-3 py-4 whitespace-nowrap text-center">Actions</th>
                </tr>
            </thead>
            <!-- Table Body -->
            <tbody>
                @foreach ($this->customers() as $key => $customer)
                    @php
                        $customerOrder = OrderList::where('user_id', $customer->id)->count();
                    @endphp

                    <!-- Example Row -->
                    <tr
                        class="border-y border-border odd:bg-background text-foreground/80 font-normal tracking-wide text-sm">
                        <td class="px-3 py-4 pl-5 whitespace-nowrap">{{ $key + 1 }}</td>
                        <td class="px-3 py-4 whitespace-nowrap">
                            <p>{{ $customer->name }}</p>
                            <p class="text-xs text-foreground/50">{{ $customer->email }}</p>
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap">
                            <p>{{ $customer->username }}</p>
                        </td>
                        <td class="px-3 py-4">
                            @if ($customerOrder > 0)
                                <span
                                    class="px-3 py-1 rounded shadow-[0_3px_5px] shadow-pink-500/40 dark:bg-pink-600 whitespace-nowrap bg-pink-500 text-white text-xs font-semibold">{{ $customerOrder }}</span>
                            @endif

                            <div class="block my-2"></div>
                            <span
                                class="px-3 py-1 rounded shadow-[0_3px_5px] shadow-sky-500/40 dark:bg-sky-600 whitespace-nowrap bg-sky-500 text-white text-xs font-semibold">{{ $customer->created_at->format('d-m-Y') }}</span>
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap">
                            <span class="text-sm font-semibold tracking-wide text-foreground">৳
                                {{ number_format($customer->balance, 2) }}</span>
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap">
                            @if ($customer->status == 'active')
                                <button wire:click="changeStatus({{ $customer->id }})"
                                    class="px-2 py-1 cursor-pointer rounded shadow-[0_3px_5px] shadow-emerald-500/40 dark:bg-emerald-600 whitespace-nowrap bg-emerald-500 text-white text-xs font-semibold"><i
                                        class="ri-check-line font-black"></i> Active</button>
                            @else
                                <button wire:click="changeStatus({{ $customer->id }})"
                                    class="px-2 py-1 cursor-pointer rounded shadow-[0_3px_5px] shadow-red-500/40 dark:bg-red-600 whitespace-nowrap bg-red-500 text-white text-xs font-semibold"><i
                                        class="ri-prohibited-2-line font-black"></i> Deactive</button>
                            @endif
                        </td>
                        <td class="px-3 py-4 text-center whitespace-nowrap">
                            <div class="flex gap-2 justify-center">

                                <button type="button" wire:click="forgetPassword({{ $customer->id }})"
                                    class="px-2.5 py-1.5 rounded bg-cyan-500 text-sm text-white shadow-[0_2px_5px] shadow-cyan-500/50 hover:shadow-none hover:bg-transparent hover:text-cyan-500 border border-cyan-500 font-normal transition-colors duration-200 cursor-pointer whitespace-nowrap">
                                    <i class="ri-lock-line"></i>
                                    Forget
                                </button>

                                <button onclick="confirmDelete({{ $customer->id }}, 'users')" type="button"
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

    <div class="mt-4 px-4">
        {{ $this->customers()->links() }}
    </div>

</div>
