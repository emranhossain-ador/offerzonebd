<?php

namespace App\Livewire\Frontend\User;

use App\Models\Notifications;
use App\Models\OrderList;
use App\Models\SimPackages;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Regular Package')]
#[Layout('layouts.user.user-app')]
class RegularPackage extends Component
{
    public string $username;
    public $operator = 'gp';
    public $type = 'all';

    public $showSelectedOffer = false;
    public $orderConfirmModal = false;

    public $selectedpackage = null;

    public $mobile_number = null;
    

    public function mount(string $username)
    {
        $this->username = $username;
    }


    public function packages()
    {
        return SimPackages::query()
            ->where('status', 'active')
            ->where('package_type', 'regular')
            ->when($this->operator, function ($query) {
                $query->where('operator', $this->operator);
            })
            ->when($this->type !== 'all', function ($query) {
                $query->where('type', $this->type);
            })
            ->orderBy('price', 'asc')
            ->get();
    }


    public function filterByOperator(string $operator)
    {
        $this->operator = $operator;
    }

    public function filterByType(string $type)
    {
        $this->type = $type;
    }



    public function selectedPack(int $id)
    {
        $package = SimPackages::findOrFail($id);
        $this->selectedpackage = $package;
        $this->showSelectedOffer = true;
    }

    public function closeSelectedOffer()
    {
        $this->showSelectedOffer = false;
        $this->mobile_number = '';
    }


    public function backToSelectedOffer(){
        $this->showSelectedOffer = true;
        $this->orderConfirmModal = false;
    }


    public function closeOrderConfirmModal(){
        $this->orderConfirmModal = false;
        $this->mobile_number = '';

    }

    public function selectPackageSave()
    {

        $this->validate([
            'mobile_number' => ['required', 'digits:11', 'regex:/^(013|017|018|016|014|019|015)\d{8}$/'],
        ]);

        if($this->mobile_number ){
            $this->showSelectedOffer = false;
            $this->orderConfirmModal = true;

        }else{
            $this->showSelectedOffer = true;
        }

    }



    public function confirmPurchase()
    {
        $order_id = $this->_orderId();
        $user = _auth();
        if($user->balance < $this->selectedpackage->price){
            session()->flash('error', 'Insufficient Balance');
            return redirect()->route('add-balance', ['username' => $this->username]);   
        }

        User::where('id', _auth()->id)->decrement('balance', $this->selectedpackage->price);

        $insertData = OrderList::create([
            'order_id' => $order_id,
            'user_id' => _auth()->id,
            'sim_package_id' => $this->selectedpackage->id,
            'order_type' => 'sim_package',
            'title' => $this->selectedpackage->title,
            'price' => $this->selectedpackage->price,
            'offer_number' => $this->mobile_number,
            'operator' => $this->selectedpackage->operator,
            'validity' => $this->selectedpackage->validity,
            'package_type' => $this->selectedpackage->package_type,
            'package_category' => $this->selectedpackage->type,
            'customer_name' => _auth()->name,
            'customer_email' => _auth()->email,
            'customer_username' => _auth()->username,
        ]);

        if($insertData){

            Notifications::create([
                'user_id' => _auth()->id,
                'title' => 'Regular Package Order',
                'service_id' => $insertData->id,
                'role' => 'admin',
                'type' => 'order',
            ]);

            session()->flash('success', 'Regular Package Order Successfully');
            return redirect()->route('user.home', ['username' => $this->username]);
        }else{
            session()->flash('error', 'Failed to purchase Regular Package');
            return redirect()->route('user.home', ['username' => $this->username]);
        }
   
        
    }


    public function _orderId(){
        do {
            $orderId = strtoupper(Str::random(10));
        } while (OrderList::where('order_id', $orderId)->exists());

        return $orderId;
    }


    public function render()
    {
        $data = [];
        $data['username'] = $this->username;
        $data['packages'] = $this->packages();
        // dd($data['packages']);exit();

        return view('livewire.frontend.user.regular-package', $data);
    }
}
