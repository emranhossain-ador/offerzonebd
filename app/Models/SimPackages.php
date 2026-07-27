<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SimPackages extends Model
{
    protected $table = "sim_packages";
    protected $fillable = [
        'title',
        'operator',
        'price',
        'type',
        'validity',
        'package_type',
        'status'
    ];


    public function orderList(){
        return $this->hasMany(OrderList::class, 'sim_package_id');
    }
}
