<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalInformationTable extends Model
{
    protected $guarded = [];
    protected $table = 'personal_information_tables';

    public function work_information(){
        return $this->belongsTo(WorkInformationTable::class,'id','employee_id');
    }
}
