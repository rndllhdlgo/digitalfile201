<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contracts extends Model
{
    protected $fillable = [
        'contracts_type',
        'contracts_date',
        'contracts_file',
    ];
}
