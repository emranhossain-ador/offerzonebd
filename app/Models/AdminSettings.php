<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminSettings extends Model
{
    protected $table ='admin_settings';
    protected $fillable = [
        'is_drive_active'
    ];
}
