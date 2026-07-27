<?php

use App\Models\MobileRecharge;
use App\Models\Notifications;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    public function mobileRecharge()
    {
        return MobileRecharge::with('user')->latest()->paginate(30);
    }

    //Handle delete
    protected $listeners = ['refresh-table' => 'refresh'];

    public function refresh()
    {
        $this->mobileRecharge();
    }

    public function statusChange($id, $status)
    {
        $recharge = MobileRecharge::find($id);
        if ($recharge) {
            $recharge->status = $status;
            $recharge->save();

            if ($status == 'rejected') {
                User::where('id', $recharge->user_id)->increment('balance', $recharge->amount);
            }

            // Notification
            Notifications::create([
                'title' => $status == 'success' ? 'আপনার রিচার্জ রিকোয়েস্টটি সফল করা হয়েছে ✅' : 'আপনার রিচার্জ রিকোয়েস্টটি রিজেক্ট করা হয়েছে ❌',
                'user_id' => $recharge->user_id,
                'service_id' => $recharge->id,
                'type' => 'recharge',
                'description' => $status == 'success' ? 'আপনার ৳' . $recharge->amount . 'মোবাইল রিচার্জ সফল হয়েছে। রিচার্জটি আপনার দেওয়া নম্বর ' . $recharge->mobile_number . '-এ সম্পন্ন হয়েছে। অনুগ্রহ করে নম্বরটি চেক করুন।' : 'আপনার ৳' . $recharge->amount . 'মোবাইল রিচার্জ রিকোয়েস্টটি রিজেক্ট করা হয়েছে। অনুগ্রহ করে আপনার দেওয়া নম্বর ' . $recharge->mobile_number . ' এবং রিচার্জের তথ্য যাচাই করে পুনরায় চেষ্টা করুন। ❌',
                'is_seen' => false,
            ]);

            $this->dispatch('refresh-table');
            session()->flash('success', 'Status updated successfully.');
        }
    }
};
?>

<div>
    @if ($this->mobileRecharge()->isEmpty())
        <div class="text-center py-10">
            <i class="ri-search-line text-4xl text-muted-foreground"></i>
            <p class="mt-2 text-muted-foreground">No Mobile Recharge Request found</p>
        </div>
    @else
        <div
            class="overflow-x-auto w-full border border-border rounded-md scrollbar-thin scrollbar-thumb-primary scrollbar-track-transparent">
            <table class="w-full table-auto">
                <!-- Table Header -->
                <thead>
                    <tr class="bg-muted divide-x divide-border text-foreground text-sm font-semibold text-left">
                        <th class="px-3 py-4 pl-5 whitespace-nowrap">No.</th>
                        <th class="px-3 py-4 whitespace-nowrap">Name</th>
                        <th class="px-3 py-4 whitespace-nowrap">Operator</th>
                        <th class="px-3 py-4 whitespace-nowrap">Mobile Number</th>
                        <th class="px-3 py-4 whitespace-nowrap">Amount</th>
                        <th class="px-3 py-4 whitespace-nowrap">Create Date</th>
                        <th class="px-3 py-4 whitespace-nowrap">Status</th>
                        <th class="px-3 py-4 whitespace-nowrap text-center">Actions</th>
                    </tr>
                </thead>
                <!-- Table Body -->
                <tbody>

                    @foreach ($this->mobileRecharge() as $key => $recharge)
                        <!-- Example Row -->
                        <tr wire:key="{{ $recharge->id }}"
                            class="border-y divide-x divide-border border-border odd:bg-background text-foreground/80 font-normal tracking-wide text-sm">
                            <td class="px-3 py-4 pl-5 whitespace-nowrap">{{ $key + 1 }}</td>
                            <td class="px-3 py-4 whitespace-nowrap">{{ $recharge->user->name }}</td>
                            <td class="px-3 py-4 whitespace-nowrap capitalize">
                                {{ $recharge->operator }}
                            </td>
                            <td class="px-3 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <span
                                        class="text-sm font-semibold bg-primary text-white px-2 py-1 rounded shadow-sm">{{ $recharge->mobile_number }}</span>
                                    <button type="button"
                                        class="w-8 h-8 border border-border/70 bg-muted text-foreground flex items-center justify-center cursor-pointer rounded-xs transition-all hover:border-primary hover:text-primary copyBtn"
                                        data-copy="{{ $recharge->mobile_number }}">
                                        <i class="ri-file-copy-line"></i>
                                    </button>
                                </div>
                            </td>
                            <td class="px-3 py-4 whitespace-nowrap">
                                ৳ {{ $recharge->amount }}
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

                                    <el-dropdown class="inline-block">
                                        <button
                                            class="inline-flex w-full justify-center gap-x-1.5 rounded cursor-pointer border border-border bg-blue-400 text-white px-2.5 py-1.5 text-sm font-semibold ">

                                            {{ $recharge->status }}

                                            <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon"
                                                aria-hidden="true" class="-mr-1 size-5 text-white">
                                                <path
                                                    d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                                    clip-rule="evenodd" fill-rule="evenodd" />
                                            </svg>
                                        </button>

                                        @if ($recharge->status === 'pending')
                                            <el-menu anchor="bottom end" popover
                                                class="w-40 origin-top-right rounded-sm bg-background outline-1 -outline-offset-1 outline-border transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in">
                                                <div class="px-3 py-2 text-start divide-y divide-border/40">
                                                    <button type="button"
                                                        wire:click="statusChange({{ $recharge->id }}, 'success')"
                                                        class="w-full flex items-center gap-2 px-2 py-1.5 text-sm text-emerald-500 hover:bg-green-500/10 focus:outline-hidden cursor-pointer">
                                                        <span class="text-green-600"><i
                                                                class="fa-regular fa-circle-check"></i></span>
                                                        Success
                                                    </button>
                                                    <button type="button"
                                                        wire:click="statusChange({{ $recharge->id }}, 'rejected')"
                                                        class="w-full flex items-center gap-2 px-2 py-1.5 text-sm text-red-500 hover:bg-red-500/10 focus:outline-hidden cursor-pointer">
                                                        <span class="text-red-600"><i
                                                                class="fa-regular fa-circle-xmark"></i></span>
                                                        Reject
                                                    </button>
                                                </div>
                                            </el-menu>
                                        @endif
                                    </el-dropdown>

                                    <button onclick="confirmDelete({{ $recharge->id }}, 'mobile_recharges')"
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

        <div class="mt-4">
            {{ $this->mobileRecharge()->links() }}
        </div>

    @endif
</div>
