<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vocational extends Model
{
    protected $fillable = [
        'vocational_name',
        'vocational_course',
        'vocational_inclusive_years'
    ];
}
