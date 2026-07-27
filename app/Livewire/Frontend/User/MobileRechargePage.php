<?php

namespace App\Livewire\Frontend\User;

use App\Models\MobileRecharge;
use App\Models\Notifications;
use App\Models\Transactions;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Mobile Recharge')]
#[Layout('layouts.user.user-app')]
class MobileRechargePage extends Component
{
    public string $username;
    public int $amount = 20;
    public string $mobile_number;
    public string $operator = '';

    public bool $lowBalance = false;

    public function mount(string $username)
    {
        $this->username = $username;
        $this->amount = 20;

        if(_auth()->balance >= $this->amount)
        {
            $this->lowBalance = false;
        }else{
            $this->lowBalance = true;
        }
    }


    public function updatedMobileNumber()
    {
        $prefixes = [
            '/^(013|017)\d{8}$/' => 'gp',
            '/^(018)\d{8}$/' => 'robi',
            '/^(016)\d{8}$/' => 'airtel',
            '/^(014|019)\d{8}$/' => 'banglalink',
            '/^(015)\d{8}$/' => 'teletalk',
        ];

        $this->mobile_number = trim($this->mobile_number);
        $this->operator = '';

        if (strlen($this->mobile_number) == 11) {
            foreach ($prefixes as $pattern => $operator) {
                if (preg_match($pattern, $this->mobile_number)) {
                    $this->operator = $operator;
                    break;
                }
            }
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


    public function mobileRecharge()
    {
        $validated = $this->validate([
            'mobile_number' => ['required', 'digits:11', 'regex:/^(013|017|018|016|014|019|015)\d{8}$/'],
            'amount' => ['required', 'integer', 'min:20', 'max:'. _auth()->balance],
        ]);


        User::query()->where('id', _auth()->id)->where('username', $this->username)->decrement('balance', $validated['amount']);


        $insert = MobileRecharge::create([
            'user_id' => _auth()->id,
            'mobile_number' => $validated['mobile_number'],
            'amount' => $validated['amount'],
            'operator' => $this->operator ?: null,
        ]);

        if($insert)
        {
            //Add Transactions data
            $transactionData = Transactions::create([
                'user_id' => _auth()->id,
                'service_id' => $insert->id,
                'type' => 'recharge',
                'balance_before' => _auth()->balance + $validated['amount'],
                'balance_after' => _auth()->balance,
            ]);

            Notifications::create([
                'title' => 'Mobile Recharge Request',
                'user_id' => _auth()->id,
                'service_id' => $insert->id,
                'type' => 'recharge',
                'role' => 'admin',
                'is_seen' => false,
            ]);



            if($transactionData)
            {
                return redirect(route('user.home', ['username' => $this->username]))->with('success', 'Recharge submit successfully');
            }

        }
    }


    public function render()
    {
        $data = [];
        $data['username'] = $this->username;

        return view('livewire.frontend.user.mobile-recharge-page', $data);
    }
}
