<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IpAddress extends Model
{
    protected $connection = 'checkip';
    protected $table = 'ipaddress';
    // public $incrementing = false;
    // public $timestamps = false;
    protected $guarded = [];
}
