<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $fillable = [
        'shift_code',
        'shift_working_hours',
        'shift_break_time'
    ];
}
