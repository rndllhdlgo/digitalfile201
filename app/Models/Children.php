<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    protected $fillable = [
        'child_name',
        'child_birthday',
        'child_gender'
    ];
}
