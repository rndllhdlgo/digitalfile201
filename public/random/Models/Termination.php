<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Termination extends Model
{
    protected $fillable = [
        'termination_letter',
        'termination_date',
        'termination_file'
    ];
}
