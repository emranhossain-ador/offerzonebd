<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function alert()
    {
        $data = [];
        $data['page'] = 'basic component';
        $data['title'] = 'Alert';
        return view('backend.basic-components.alert', $data);

    }


    public function badge()
    {
        $data = [];
        $data['page'] = 'basic component';
        $data['title'] = 'Badge';
        return view('backend.basic-components.badge', $data);
    }


    public function button()
    {
        $data = [];
        $data['page'] = 'basic component';
        $data['title'] = 'Button';
        return view('backend.basic-components.button', $data);
    }


    public function tooltips()
    {
        $data = [];
        $data['page'] = 'basic component';
        $data['title'] = 'Tooltips';
        return view('backend.basic-components.tooltips', $data);
    }



    // __________ Advance Components Area ___________//

    public function tab()
    {
        $data = [];
        $data['page'] = 'advance component';
        $data['title'] = 'Tab';
        return view('backend.advance-component.tabs', $data);
    }

    public function collapse()
    {
        $data = [];
        $data['page'] = 'advance component';
        $data['title'] = 'Collapse';
        return view('backend.advance-component.collapse', $data);
    }

    public function dropdown()
    {
        $data = [];
        $data['page'] = 'advance component';
        $data['title'] = 'Dropdown';
        return view('backend.advance-component.dropdown', $data);
    }

    public function modal()
    {
        $data = [];
        $data['page'] = 'advance component';
        $data['title'] = 'Modal';
        return view('backend.advance-component.modal', $data);
    }

}
