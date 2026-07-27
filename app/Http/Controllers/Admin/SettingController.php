<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function payment_methods()
    {
        $data = [];
        $data['title'] = 'Payment Methods';
        $data['page'] = 'settings';
        return view('backend.settings.payment_methods', $data);
    }



    public function profile(){
        $data = [];
        $data['title'] = 'Profile';
        return view('backend.settings.profile', $data);
    }


    public function contact()
    {
        $data = [];
        $data['title'] = 'Conact Us';
        $data['page'] = 'settings';

        return view('backend.settings.contact', $data);

    }
}
