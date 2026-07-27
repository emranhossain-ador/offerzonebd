<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class BrilliantRecharge extends Model
{
    protected $table = 'brilliant_recharges';
    protected $fillable = ['user_id', 'brilliant_number', 'amount', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
