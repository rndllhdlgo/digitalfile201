<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = [
        'training_name',
        'training_title',
        'training_inclusive_years'
    ];
}
