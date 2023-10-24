<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveCredits extends Model
{
    protected $connection = 'leave_credits';
    protected $table = 'emp_leave';
    // public $incrementing = false;
    // public $timestamps = false;
    protected $guarded = [];
}
