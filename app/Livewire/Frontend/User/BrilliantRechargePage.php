<?php

namespace App\Livewire\Frontend\User;

use App\Models\BrilliantRecharge;
use App\Models\Notifications;
use App\Models\Transactions;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Brilliant Recharge')]
#[Layout('layouts.user.user-app')]

class BrilliantRechargePage extends Component
{
    public string $username;
    public string $brilliant_number;
    public string $amount;
    
    public bool $lowBalance = false;

    public function mount(string $username){
        $this->username = $username;
        $this->amount = 20;

        if(_auth()->balance >= $this->amount)
        {
            $this->lowBalance = false;
        }else{
            $this->lowBalance = true;
        }
    }


    public function setAmount(int $amount)
    {
        $this->amount = $amount;

        if(_auth()->balance >= $amount)
        {
            $this->lowBalance = false;
        }else{
            $this->lowBalance = true;
        }
    }

    public function updatedAmount()
    {
        if(_auth()->balance >= $this->amount){
            $this->lowBalance = false;
        }else{
            $this->lowBalance = true;
        }
    }


    public function brilliantRecharge()
    {
        $validated = $this->validate([
            'brilliant_number' => ['required'],
            'amount' => ['required', 'integer', 'min:20', 'max:'. _auth()->balance],
        ]);


        User::query()->where('id', _auth()->id)->where('username', $this->username)->decrement('balance', $validated['amount']);


        $insert = BrilliantRecharge::create([
            'user_id' => _auth()->id,
            'brilliant_number' => $validated['brilliant_number'],
            'amount' => $validated['amount'],
        ]);


        if($insert)
        {
            //Add Transactions data
            $transactionData = Transactions::create([
                'user_id' => _auth()->id,
                'service_id' => $insert->id,
                'type' => 'brilliant_recharge',
                'balance_before' => _auth()->balance + $validated['amount'],
                'balance_after' => _auth()->balance,
            ]);

            Notifications::create([
                'title' => 'Brilliant Recharge Request',
                'user_id' => _auth()->id,
                'service_id' => $insert->id,
                'type' => 'brilliant_recharge',
                'role' => 'admin',
                'is_seen' => false,
            ]);



            if($transactionData)
            {
                return redirect(route('user.home', ['username' => $this->username]))->with('success', 'Brilliant Recharge submit successfully');
            }

        }
    }


    public function render()
    {
        $data = [];
        $data['username'] = $this->username;
        return view('livewire.frontend.user.brilliant-recharge-page', $data);
    }
}
