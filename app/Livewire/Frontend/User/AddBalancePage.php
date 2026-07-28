<?php

namespace App\Livewire\Frontend\User;

use App\Models\AddBalance;
use App\Models\Notifications;
use App\Models\PaymentMethod;
use App\Models\Transactions;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Add Balance')]
#[Layout('layouts.user.user-app')]
class AddBalancePage extends Component
{
    public $username;

    public $pageTitle = 'amount';
    public $step = 1;
    public int $amount;

    public $pay_method_id = '';
    public $pay_method_name = '';
    public $payment_number = '';

    public $sender_number = '';
    public $trx_id = '';

    public bool $is_btn_disable = true;
    public bool $is_sbtn_disable = true;


    public function mount(string $username)
    {
        $this->username = $username;
        $this->pageTitle = 'amount';
        $this->step = 1;
        $this->amount = 0;
        $this->pay_method_id = '';
        $this->pay_method_name = '';
        $this->payment_number = '';
        $this->sender_number = '';
        $this->trx_id = '';
        $this->is_btn_disable = true;
        $this->is_sbtn_disable = true;
    }


    public function updatedAmount()
    {
        if($this->amount >= 50){
            $this->is_btn_disable = false;
        }else{
            $this->is_btn_disable = true;
        }
    }


    public function rechargeAmount()
    {
        $this->step = 2;
        $this->pageTitle = 'Payment Method';
    }


    public function previousStep()
    {
        $this->step--;

        if ($this->step == 1) {
            $this->pageTitle = 'Amount';
        } elseif ($this->step == 2) {
            $this->pageTitle = 'Payment Method';
        }
    }


    public function nextStep(string $title, string $amount, int $step)
    {
        $this->amount = $amount;
        $this->step = $step;
        $this->pageTitle = $title;
        
    }
    

    public function paymentMethod(string $title, string $id, int $step)
    {

        $method = PaymentMethod::where('id', $id)->first();

        $this->pay_method_id = $method->id;
        $this->pay_method_name = $method->name;
        $this->payment_number = $method->pay_number;
        $this->step = $step;
        $this->pageTitle = $title;
    }

    public function updated()
    {
        $this->is_sbtn_disable = !(
            preg_match('/^[0-9]{11}$/', $this->sender_number) &&
            filled($this->trx_id)
        );
    }


    public function addbalance()
    {
        // 1. Validation
        $this->validate([
            'sender_number' => ['required', 'min:11', 'max:11', 'regex:/^[0-9]+$/'],
            'trx_id' => 'required',
        ]);

        $insert = AddBalance::create([
            'user_id' => _auth()->id,
            'amount' => $this->amount,
            'sender_number' => $this->sender_number,
            'trx_id' => $this->trx_id,
            'payment_method' => $this->pay_method_name,
            'payment_number' => $this->payment_number,
        ]);

        if($insert)
        {
            //Add Transactions data
            $transactionData = Transactions::create([
                'user_id' => _auth()->id,
                'service_id' => $insert->id,
                'type' => 'deposit',
            ]);

            Notifications::create([
                'title' => 'Add Balance Request',
                'user_id' => _auth()->id,
                'service_id' => $insert->id,
                'type' => 'deposit',
                'role' => 'admin',
                'is_seen' => false,
            ]);



            if($transactionData){
                
                session()->flash('success', 'Request submit successful');
                return redirect(route('user.home', ['username' => $this->username]));
            }

        }
    }


    public function render()
    {
        $data = [];
        $data['username'] = $this->username;
        $data['paymentMethods'] = PaymentMethod::where('status', 'active')->get();

        return view('livewire.frontend.user.add-balance-page', $data);
    }
}
