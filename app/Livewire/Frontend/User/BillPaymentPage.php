<?php

namespace App\Livewire\Frontend\User;

use App\Models\BillOperators;
use App\Models\BillPayment;
use App\Models\Notifications;
use App\Models\Transactions;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Bill Payment')]
#[Layout('layouts.user.user-app')]
class BillPaymentPage extends Component
{
    public string $username;

    // Bill Input Name
    public string $bill_number;
    public $bill_amount;
    public $mobile_number;
    public $month;
    public $note;

    // Operator Select States
    public int $selectedOperatorId;
    public string $selectedOperatorTitle;
    public string $selectedOperatorSlug;


    public bool $lowBalance = false;

    public function mount(string $username){
        $this->username = $username;
        $this->bill_amount = null;

        if(_auth()->balance >= $this->bill_amount){
            $this->lowBalance = false;
        }else{
            $this->lowBalance = true;
        }
    }



    public function selectOperator(int $id){
        $operator = BillOperators::query()->find($id);
        $this->selectedOperatorId = $operator->id;
        $this->selectedOperatorTitle = $operator->title;
        $this->selectedOperatorSlug = $operator->slug;

        $this->dispatch('operator-select');
    }


    public function updatedBillAmount()
    {
        if(_auth()->balance >= $this->bill_amount){
            $this->lowBalance = false;
        }else{
            $this->lowBalance = true;
        }
    }


    public function billPayment()
    {
        $this->validate([
            'selectedOperatorId' => 'required',
            'bill_number' => 'required',
            'bill_amount' => 'required',
            'mobile_number' => 'required',
            'month' => 'required',
            'note' => 'nullable',
        ]);

        if(_auth()->balance < $this->bill_amount){
            return $this->addError('bill_amount', 'Low balance');
        }


        User::query()->where('id', _auth()->id)->where('username', $this->username)->decrement('balance', $this->bill_amount);


        $insert = BillPayment::create([
            'user_id' => _auth()->id,
            'operator_id' => $this->selectedOperatorId,
            'bill_number' => $this->bill_number,
            'amount' => $this->bill_amount,
            'mobile_number' => $this->mobile_number,
            'month' => $this->month,
            'note' => $this->note,
        ]);

        if($insert)
        {
            //Add Transactions data
            $transactionData = Transactions::create([
                'user_id' => _auth()->id,
                'service_id' => $insert->id,
                'type' => 'bill_payment',
                'balance_before' => _auth()->balance + $this->bill_amount,
                'balance_after' => _auth()->balance,
            ]);

            Notifications::create([
                'title' => 'Bill Payment Request',
                'user_id' => _auth()->id,
                'service_id' => $insert->id,
                'type' => 'bill_payment',
                'role' => 'admin',
                'is_seen' => false,
            ]);



            if($transactionData)
            {
                return redirect(route('user.home', ['username' => $this->username]))->with('success', 'Bill Pay submit successfully');
            }
        }else{
            session()->flash('error', 'Something went wrong');
        }

    }



    public function render()
    {
        $data = [];
        $data['username'] = $this->username;
        $data['billOperators'] = BillOperators::query()->where('status', 'active')->get();

        return view('livewire.frontend.user.bill-payment-page', $data);
    }
}
