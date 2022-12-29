<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ping extends Model
{
    protected $guarded = [];
    protected $connection = 'bsms';
    protected $table = "user_logs";
}