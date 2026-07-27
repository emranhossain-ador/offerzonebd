<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $table = 'notifications';
    protected $fillable = [
        'title',
        'user_id',
        'service_id',
        'role',
        'type',
        'description',
        'is_seen',
        'read_at'
    ];
}
