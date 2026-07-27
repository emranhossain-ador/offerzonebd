<?php

namespace App\Livewire\Frontend\User;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Notification Settings')]
#[Layout('layouts.user.user-app')]
class NotificationSettings extends Component
{
    public $username;

    public function mount($username)
    {
        $this->username = $username;
    }

    public function render()
    {
        $data = [];
        $data['username'] = $this->username;
        return view('livewire.frontend.user.notification-settings');
    }
}
