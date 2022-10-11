<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    protected $fillable = [
        'memo_subject',
        'memo_date',
        'memo_option',
        'memo_file'
    ];
}
