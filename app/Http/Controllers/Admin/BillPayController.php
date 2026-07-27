<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BillPayment;
use App\Models\Notifications;
use Illuminate\Http\Request;

class BillPayController extends Controller
{
    public function billOperator()
    {
        $data = [];
        $data['title'] = 'Bill Operator';
        $data['page'] = 'bill-pay';
        return view('backend.bill-pay.bill-operator', $data);
    }


    public function billPaymentRequest()
    {
        $data = [];
        $data['title'] = 'Bill Payment Request';
        $data['page'] = 'bill-pay';
        return view('backend.bill-pay.bill-payment-request', $data);
    }


    public function billPaymentDetails(int $id)
    {
        Notifications::where('service_id', $id)->where('type', 'bill_payment')->update(['is_seen' => true]);

        $data = [];
        $data['title'] = 'Bill Payment Details';
        $data['page'] = 'bill-pay';
        $data['billPayment'] = BillPayment::query()
            ->where('id', $id)
            ->with(['user', 'operator'])
            ->first();
        return view('backend.bill-pay.bill-payment-details', $data);
    }



}
