<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [
        'evaluation_reason',
        'evaluation_date',
        'evaluation_evaluated_by',
        'evaluation_file'
    ];
}
