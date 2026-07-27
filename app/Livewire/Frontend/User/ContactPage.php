<?php

namespace App\Livewire\Frontend\User;

use App\Models\Contact;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Contact')]
#[Layout('layouts.user.user-app')]
class ContactPage extends Component
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
        $data['contactInfo'] = Contact::query()->where('id', 1)->first();

        return view('livewire.frontend.user.contact', $data);
    }
}
