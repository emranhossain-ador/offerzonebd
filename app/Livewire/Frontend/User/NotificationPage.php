<?php

namespace App\Livewire\Frontend\User;

use App\Models\Notifications;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Notifications')]
#[Layout('layouts.user.user-app')]
class NotificationPage extends Component
{
    public string $username = '';
    public bool $showNotification = false;
    public ?Notifications $selectedNotification = null;



    public function mount(string $username): void
    {
        $this->username = $username;
    }

    /**
     * Get User notifications.
     */
    public function getNotificationsProperty(): Collection
    {
        return Notifications::query()
                ->where('user_id', _auth()->id)
                ->where('role', 'user')
                ->latest()
                ->get();
    }



     /**
     * Get unread notification count.
     */
    public function getUnreadCountProperty(): int
    {
        return Notifications::query()
            ->where('user_id', _auth()->id)
            ->where('role', 'user')
            ->where('is_seen', false)
            ->count();
    }


    /**
     * View notification.
     */
    public function viewNotification(int $id): void
    {
        $notification = Notifications::query()
            ->where('id', $id)
            ->where('user_id', _auth()->id)
            ->where('role', 'user')
            ->firstOrFail();

        if (! $notification->is_seen) {
            $notification->update(['is_seen' => true,]);
        }

        $this->selectedNotification = $notification;
        $this->showNotification = true;

    }


    public function closeNotification(): void
    {
        $this->showNotification = false;
    }



    public function deleteNotification(int $id)
    {
        Notifications::query()
            ->where('id', $id)
            ->where('user_id', _auth()->id)
            ->where('role', 'user')
            ->delete();

    }


    public function deleteAllNotifications()
    {
        Notifications::query()
            ->where('user_id', _auth()->id)
            ->where('role', 'user')
            ->delete();
    }


    public function render()
    {
        $data = [];
        $data['username'] = $this->username;
        $data['notifications'] = $this->Notifications;
        $data['unreadCount'] = $this->unreadCount;

        return view('livewire.frontend.user.notification-page', $data);
    }
}
