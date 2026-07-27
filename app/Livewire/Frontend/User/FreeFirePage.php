<?php

namespace App\Livewire\Frontend\User;

use App\Models\GamingPackages;
use App\Models\Notifications;
use App\Models\OrderList;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Free Fire Diamonds')]
#[Layout('layouts.user.user-app')]
class FreeFirePage extends Component
{
    public string $username;

    public $showSelectedOffer = false;
    public $orderConfirmModal = false;

    public $selectedpackage = null;

    public string $game_name;
    public string $player_id;

    public function mount(string $username){
        $this->username = $username;
    }



    public function getPackagesProperty(): Collection
    {
        return GamingPackages::query()->where('status', 'active')->orderBy('price', 'asc')->get();
    }


    public function selectPackage(int $id)
    {
        $package = GamingPackages::findOrFail($id);
        $this->selectedpackage = $package;
        $this->showSelectedOffer = true;
    }

    public function closeSelectedOffer()
    {
        $this->showSelectedOffer = false;
        $this->game_name = '';
        $this->player_id = '';
    }

    
    public function backToSelectedOffer(){
        $this->showSelectedOffer = true;
        $this->orderConfirmModal = false;
    }


    public function closeOrderConfirmModal(){
        $this->orderConfirmModal = false;
        $this->game_name = '';
        $this->player_id = '';
    }



    public function selectPackageSave()
    {
        $this->validate([
            'game_name' => 'required|string|max:255',
            'player_id' => 'required|string|max:255',
        ]);

        if ($this->game_name && $this->player_id) {
            $this->showSelectedOffer = false;
            $this->orderConfirmModal = true;

        } else {
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

        $insertData = OrderList::create([
            'order_id' => $order_id,
            'user_id' => _auth()->id,
            'gaming_package_id' => $this->selectedpackage->id,
            'order_type' => 'gaming_package',
            'title' => $this->selectedpackage->title,
            'price' => $this->selectedpackage->price,
            'game_name' => $this->game_name,
            'player_id' => $this->player_id,
            'customer_name' => _auth()->name,
            'customer_email' => _auth()->email,
            'customer_username' => _auth()->username,
        ]);

        if($insertData)
        {

            User::where('id', _auth()->id)->decrement('balance', $this->selectedpackage->price);

            Notifications::create([
                'user_id' => _auth()->id,
                'title' => 'Diamond Package Order',
                'service_id' => $insertData->id,
                'role' => 'admin',
                'type' => 'order',
            ]);

            session()->flash('success', 'Diamond Package Order Successfully');
            return redirect()->route('user.home', ['username' => $this->username]);
        }else{
            session()->flash('error', 'Failed to purchase diamond Package');
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
        $data['packages'] = $this->packages;
        return view('livewire.frontend.user.free-fire-page', $data);
    }
}
