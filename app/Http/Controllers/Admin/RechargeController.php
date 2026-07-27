<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AddBalance;
use App\Models\Notifications;

class RechargeController extends Controller
{
    public function addBalance()
    {
        $data = [];
        $data['title'] = 'Add Balance Requests';
        $data['page'] = 'recharge';

        return view('backend.pages.customer-add-balance', $data);
    }

    public function addBalanceDetails(int $id)
    {

        Notifications::where('service_id', $id)->where('role', 'admin')->where('is_seen', false)->update(['is_seen' => true]);

        $data = [];
        $data['title'] = 'Add Balance Details';
        $data['page'] = 'recharge';
        $data['recharge'] = AddBalance::with('user')->where('id', $id)->first();

        return view('backend.pages.add-balance-details', $data);
    }

    public function mobile_recharge_request()
    {
        $data = [];
        $data['title'] = 'Mobile Recharge';
        $data['page'] = 'recharge';

        Notifications::where('role', 'admin')->where('type', 'recharge')->update(['is_seen' => true]);

        return view('backend.pages.mobile-recharge', $data);
    }

    public function brilliant_recharge_request()
    {
        $data = [];
        $data['title'] = 'Brilliant Recharge';
        $data['page'] = 'recharge';

        Notifications::where('role', 'admin')->where('type', 'brilliant_recharge')->update(['is_seen' => true]);

        return view('backend.pages.brilliant-recharge', $data);
    }
}
