<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiCall extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'app_id',
        'device_id',
        'app_token',
        'package_name',
        'app_version',
        'version_code',
        'ip_address'
    ];
}
