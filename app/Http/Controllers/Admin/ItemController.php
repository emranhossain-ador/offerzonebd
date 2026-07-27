<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function simPackage(){
        $data = [];
        $data['title'] = 'SIM Package';
        $data['page'] = 'offer';
        return view('backend.items.sim-package', $data);
    }


    public function createSimPackage(){
        $data = [];
        $data['title'] = 'Create SIM Package';
        $data['page'] = 'offer';
        return view('backend.items.create-sim-package', $data);
    }


    public function editSimPackage(int $id){
        $data = [];
        $data['title'] = 'Edit SIM Package';
        $data['page'] = 'offer';
        $data['package_id'] = $id;
        return view('backend.items.create-sim-package', $data);
    }




    public function freeFireDiamond(){
        $data = [];
        $data['title'] = 'Free Fire Diamond';
        $data['page'] = 'free-fire-diamond';
        return view('backend.items.free-fire-diamond', $data);
    }

    public function createFreeFireDiamond(){
        $data = [];
        $data['title'] = 'Create Free Fire Diamond';
        $data['page'] = 'free-fire-diamond';
        return view('backend.items.create-freefire-diamond', $data);
    }

    public function editFreeFireDiamond($id){
        $data = [];
        $data['title'] = 'Edit Free Fire Diamond';
        $data['page'] = 'free-fire-diamond';
        $data['item_id'] = $id;
        return view('backend.items.create-freefire-diamond', $data);
    }

}
