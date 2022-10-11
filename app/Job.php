<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'job_name',
        'job_position',
        'job_address',
        'job_contact_details',
        'job_inclusive_years'
    ];
}
