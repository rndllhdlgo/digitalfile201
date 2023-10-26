<?php
namespace App\Http\Controllers\traits;

use App\Models\EmployeeLogs;
use App\Models\UserLogs;

trait Logs
{
    public function save_employee_logs($employee_id, $activity){
        $userlogs              = new EmployeeLogs;
        $userlogs->employee_id = $employee_id;
        $userlogs->username    = auth()->user()->name;
        $userlogs->role        = auth()->user()->user_level;
        $userlogs->activity    = $activity;
        $userlogs->save();
    }

    public function save_user_logs($activity){
        $userlogs           = new UserLogs;
        $userlogs->username = auth()->user()->name;
        $userlogs->role     = auth()->user()->user_level;
        $userlogs->activity = $activity;
        $userlogs->save();
    }
}