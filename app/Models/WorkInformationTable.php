<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkInformationTable extends Model
{
    protected $guarded = [];
    protected $table = 'work_information_tables';

    public function position(){
        return $this->belongsTo(Position::class,'employee_position','id');
    }

    public function branch(){
        return $this->belongsTo(Branch::class,'employee_branch','entity03');
    }

    public function company(){
        return $this->belongsTo(Company::class,'employee_company','entity');
    }

    public function department(){
        return $this->belongsTo(Department::class,'employee_department','deptcode');
    }
}
