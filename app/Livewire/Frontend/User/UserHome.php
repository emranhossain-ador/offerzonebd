<?php

namespace App\Livewire\Frontend\User;

use App\Models\Transactions;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Home')]
#[Layout('layouts.user.user-app')]
class UserHome extends Component
{

    public $username;

    public function mount(string $username)
    {
        $this->username = $username;
    }


    public function getTransactionsProperty()
    {
        return Transactions::query()
            ->where('user_id', _auth()->id)
            ->latest('id')
            ->take(5)
            ->get();
    }

    public function render()
    {
        $data = [];
        $data['username'] = $this->username;
        $data['transactions'] = $this->transactions;

        return view('livewire.frontend.user.user-home', $data);
    }
}
