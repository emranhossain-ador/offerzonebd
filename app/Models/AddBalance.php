<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class AddBalance extends Model
{
    protected $table = 'add_balance';

    protected $fillable = [
        'user_id',
        'sender_number',
        'amount',
        'trx_id',
        'payment_method',
        'payment_number',
        'status',
        'reject_reason',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
