<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = [
        'training_name',
        'training_title',
        'training_inclusive_years'
    ];
}
