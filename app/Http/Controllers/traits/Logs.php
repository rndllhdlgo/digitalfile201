<?php
namespace App\Http\Controllers\traits;

use App\Models\{
    EmployeeLogs,
    UserLogs,
    WorkLogs
};

trait Logs
{
    public function save_user_logs($activity){
        $userlogs           = new UserLogs;
        $userlogs->username = auth()->user()->name;
        $userlogs->role     = auth()->user()->user_level;
        $userlogs->activity = $activity;
        $userlogs->save();
    }

    public function save_work_logs($employee_id, $activity){
        $userlogs              = new WorkLogs;
        $userlogs->employee_id = $employee_id;
        $userlogs->username    = auth()->user()->name;
        $userlogs->role        = auth()->user()->user_level;
        $userlogs->activity    = $activity;
        $userlogs->save();
    }

    public function save_employee_logs($employee_id, $activity){
        $userlogs              = new EmployeeLogs;
        $userlogs->employee_id = $employee_id;
        $userlogs->username    = auth()->user()->name;
        $userlogs->role        = auth()->user()->user_level;
        $userlogs->activity    = $activity;
        $userlogs->save();
    }

}