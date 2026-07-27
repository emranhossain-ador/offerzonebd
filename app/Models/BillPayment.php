<?php

namespace App\Models;

use App\Models\BillOperators;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class BillPayment extends Model
{
    protected $table = 'bill_payments';

    protected $fillable = [
        'user_id',
        'operator_id',
        'bill_number',
        'amount',
        'mobile_number',
        'month',
        'note',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function operator()
    {
        return $this->belongsTo(BillOperators::class, 'operator_id');
    }
}
