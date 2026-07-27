<?php

namespace App\Livewire\Frontend\User;

use App\Models\Transactions;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Transactions')]
#[Layout('layouts.user.user-app')]
class TransactionPage extends Component
{

    public string $username;
    public ?Transactions $selectedTransaction = null;
    public bool $showDetails = false;

    public function mount(string $username): void
    {
        $this->username = $username;
    }

    public function getTransactionsProperty(): Collection
    {
        return Transactions::orderBy('id', 'desc')->where('user_id', _auth()->id)->get();
    }


    public function viewTransaction(int $id): void
    {
        $this->selectedTransaction = Transactions::query()
                                    ->where('id', $id)
                                    ->where('user_id', _auth()->id)
                                    ->firstOrFail();
        $this->showDetails = true;
    }


    public function closeDetails(): void
    {
        $this->showDetails = false;
    }


    public function render()
    {
        $data = [];
        $data['username'] = $this->username;
        $data['transactions'] = $this->transactions;

        return view('livewire.frontend.user.transaction-page', $data);
    }
}
