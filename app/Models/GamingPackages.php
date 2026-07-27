<?php

namespace App\Models;

use App\Models\OrderList;
use Illuminate\Database\Eloquent\Model;

class GamingPackages extends Model
{
    protected $table = 'gaming_packages';
    protected $fillable = [
        'title',
        'price',
        'status',
    ];

    public function orderList(){
        return $this->hasMany(OrderList::class, 'gaming_package_id');
    }
}
