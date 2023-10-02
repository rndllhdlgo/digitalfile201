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

    public function shift(){
        return $this->belongsTo(Shift::class,'shift','shift');
    }

    public function education_information(){
        return $this->belongsTo(EducationalAttainment::class,'id','employee_id');
    }

    public function medical_information(){
        return $this->belongsTo(MedicalHistory::class, 'id', 'employee_id');
    }

    public function documents(){
        return $this->belongsTo(Document::class, 'id', 'employee_id');
    }

    public function benefits(){
        return $this->belongsTo(Benefits::class, 'id', 'employee_id');
    }
}
