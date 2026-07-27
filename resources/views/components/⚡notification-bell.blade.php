<?php

use App\Models\Notifications;
use Livewire\Component;

new class extends Component {
    public function getUnreadCount()
    {
        if (!auth()->check()) {
            return 0;
        }
        return Notifications::where('user_id', auth()->id())
            ->where('role', 'user')
            ->where('is_seen', 0)
            ->count();
    }
};
?>

<a wire:poll.3s href="{{ route('notification-page', ['username' => _auth()->username]) }}"
    class="relative grid h-10 w-10 place-items-center rounded-xl border border-border bg-surface/60 text-foreground/80 transition hover:text-foreground hover:scale-105"
    wire:navigate>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="lucide lucide-bell h-5 w-5" aria-hidden="true">
        <path d="M10.268 21a2 2 0 0 0 3.464 0"></path>
        <path
            d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326">
        </path>
    </svg>

    @if ($this->getUnreadCount() > 0)
        <span class="absolute top-0 right-0 flex size-2">
            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-sky-400 opacity-75"></span>
            <span class="relative inline-flex size-2 rounded-full bg-sky-500"></span>
        </span>
    @endif
</a>
