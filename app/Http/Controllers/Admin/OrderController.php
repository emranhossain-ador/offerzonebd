<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notifications;
use App\Models\OrderList;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $data = [];
        $data['title'] = 'Order List';
        $data['page'] = 'order';
        return view('backend.orders.orders', $data);
    }


    public function orderDetails($order_id)
    {
        
        $data = [];
        $data['title'] = 'Order Details';
        $data['page'] = 'order';
        $data['orderDetails'] = OrderList::with('sim_package')->with('gaming_package')->where('order_id', $order_id)->first();

        $id = $data['orderDetails']->id;

        Notifications::where('service_id', $id)->where('role', 'admin')->update(['is_seen'=> true]);
        
        // dd($data['orderDetails']);exit();

        return view('backend.orders.order-details', $data);
    }
}
