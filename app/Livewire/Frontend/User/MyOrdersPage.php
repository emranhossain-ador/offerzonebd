<?php

namespace App\Livewire\Frontend\User;

use App\Models\OrderList;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Title('My Orders')]
#[Layout('layouts.user.user-app')]
class MyOrdersPage extends Component
{

    public string $usrname;
    public int $user_id;

    public bool $showDetails = false;

    public $orderDetails = null;

    public string $package_type = 'regular';

    public function mount(string $username)
    {
        $this->usrname = $username;
        $this->user_id = _getByUsername($username)->id;
    }


    public function getMyOrders()
    {
        return OrderList::query()
        ->when($this->package_type === 'regular', function ($query) {
            return $query->where('package_type', 'regular');
        })
        ->when($this->package_type === 'drive', function ($query) {
            return $query->where('package_type', 'drive');
        })
        ->when($this->package_type === 'gaming_package', function ($query) {
            return $query->where('order_type', 'gaming_package');
        })
        ->where('user_id', $this->user_id)
        ->latest()
        ->get();
    }


    public function packageFilter(string $type)
    {
        $this->package_type = $type;
    }


    public function orderDetailShow(int $id){
        $order = OrderList::findOrFail($id);

        if($order)
        {
            $this->orderDetails = $order;
            $this->showDetails = true;
        }
    }


    public function closeDetails(){
        $this->showDetails = false;
        $this->orderDetails = null;
    }


    public function render()
    {

        $data = [];
        $data['username'] = $this->usrname;
        $data['orders'] = $this->getMyOrders();

        return view('livewire.frontend.user.my-orders-page', $data);
    }
}
