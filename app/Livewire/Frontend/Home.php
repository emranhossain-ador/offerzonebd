<?php

namespace App\Livewire\Frontend;

use App\Models\GamingPackages;
use App\Models\PaymentMethod;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\SimOfferPackage;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\AddBalance;

#[Title('Home')]
#[Layout('layouts.app')]
class Home extends Component
{

    public $selectedMethod = '';
    public $selectedPayNumber = '';

    public function mount(){
        $method = PaymentMethod::where('status', 'active')->first();
        $this->selectedMethod = $method->name ?? '';
        $this->selectedPayNumber = $method->pay_number ?? '';
    }


    // Render home page
    public function render()
    {
        $data = [];
        $data['paymentMethod'] = PaymentMethod::where('status', 'active')->get();
        $data['users'] = User::where('role', 'user')->count() ?? 0;

        return view('livewire.frontend.home', $data);
    }
}

