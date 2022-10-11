<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $fillable = [
        'college_name',
        'college_degree',
        'college_inclusive_years'
    ];
}
