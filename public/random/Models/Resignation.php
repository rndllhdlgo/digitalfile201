<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resignation extends Model
{
    protected $fillable = [
        'resignation_letter',
        'resignation_date',
        'resignation_file'
    ];
}
