<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AddBalance;
use App\Models\OrderList;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [];
        $data['title'] = 'Dashboard';
        $data['orderDetails'] = OrderList::all();
        $data['customer'] = User::query()->where('role', 'user')->count();
        $data['total_recharge'] = AddBalance::query()->where('status', 'approved')->sum('amount');
        $data['recentOrders'] = OrderList::with('sim_package')->with('gaming_package')->latest()->take(10)->get();
        $data['todayOrders'] = OrderList::query()->whereDate('created_at', today())->count();

        return view('backend.pages.dashboard', $data);
    }


    public function customers()
    {
        $data = [];
        $data['title'] = 'Customer List';
        return view('backend.pages.customer-list', $data);
    }


}
