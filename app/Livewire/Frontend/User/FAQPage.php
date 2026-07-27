<?php

namespace App\Livewire\Frontend\User;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('FAQ')]
#[Layout('layouts.user.user-app')]
class FAQPage extends Component
{
    public string $username;

    public function mount(string $username)
    {
        $this->username = $username;
    }

    public function render()
    {
        $data = [];
        $data['username'] = $this->username;
        return view('livewire.frontend.user.faq-page', $data);
    }
}
