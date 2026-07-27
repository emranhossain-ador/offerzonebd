<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'user_id',
        'service_id',
        'type',
        'balance_before',
        'balance_after',
        'status',
    ];
}
