<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class MobileRecharge extends Model
{
    protected $table = 'mobile_recharges';
    protected $fillable = [
        'user_id',
        'mobile_number',
        'amount',
        'operator',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
