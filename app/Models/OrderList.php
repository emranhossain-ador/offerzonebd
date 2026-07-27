<?php

namespace App\Models;

use App\Models\GamingPackages;
use App\Models\SimPackages;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{
    protected $table = 'order_lists';
    protected $fillable = [
        'order_id',
        'user_id',
        'sim_package_id',
        'gaming_package_id',
        'order_type',
        'title',
        'price',
        'offer_number',
        'operator',
        'validity',
        'package_type',
        'package_category',
        'game_name',
        'player_id',
        'customer_name',
        'customer_username',
        'customer_email',
        'status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];


    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sim_package(){
        return $this->belongsTo(SimPackages::class, 'sim_package_id');
    }

    public function gaming_package(){
        return $this->belongsTo(GamingPackages::class, 'gaming_package_id');
    }


}
