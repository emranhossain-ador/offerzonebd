<?php

namespace App\Models;

use App\Models\BillPayment;
use Illuminate\Database\Eloquent\Model;

class BillOperators extends Model
{
    protected $table = 'bill_operators';
    protected $fillable = [
        'slug', 'title', 'status'
    ];

    public function billPayments()
    {
        return $this->hasMany(BillPayment::class, 'operator_id');
    }
}
