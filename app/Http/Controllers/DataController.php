<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Children;
use App\Models\College;
use App\Models\Training;
use App\Models\Vocational;
use App\Models\JobHistory;
use App\Models\Memo;
use App\Models\Evaluation;
use App\Models\Contract;
use App\Models\Resignation;
use App\Models\Termination;
use App\Models\WorkLogs;
use App\Models\EmployeeLogs;

use DataTables;

class DataController extends Controller
{
    public function children_data(Request $request){
        return DataTables::of(Children::where('employee_id',$request->id)->get())->make(true);
    }

    public function college_data(Request $request){
        return DataTables::of(College::where('employee_id',$request->id)->get())->make(true);
    }

    public function training_data(Request $request){
        return DataTables::of(Training::where('employee_id',$request->id)->get())->make(true);
    }

    public function vocational_data(Request $request){
        return DataTables::of(Vocational::where('employee_id',$request->id)->get())->make(true);
    }

    public function job_history_data(Request $request){
        return DataTables::of(JobHistory::where('employee_id',$request->id)->get())->make(true);
    }

    public function memo_data(Request $request){
        return DataTables::of(Memo::where('employee_id',$request->id)->get())->make(true);
    }

    public function evaluation_data(Request $request){
        return DataTables::of(Evaluation::where('employee_id',$request->id)->get())->make(true);
    }

    public function contracts_data(Request $request){
        return DataTables::of(Contract::where('employee_id',$request->id)->get())->make(true);
    }

    public function resignation_data(Request $request){
        return DataTables::of(Resignation::where('employee_id',$request->id)->get())->make(true);
    }

    public function termination_data(Request $request){
        return DataTables::of(Termination::where('employee_id',$request->id)->get())->make(true);
    }

    public function college_summary_data(Request $request){
        return College::where('employee_id',$request->id)->get();
    }

    public function training_summary_data(Request $request){
        return Training::where('employee_id',$request->id)->get();
    }

    public function vocational_summary_data(Request $request){
        return Vocational::where('employee_id',$request->id)->get();
    }

    public function job_history_summary_data(Request $request){
        return JobHistory::where('employee_id',$request->id)->get();
    }

    public function history_data(Request $request){
        $work_history = WorkLogs::selectRaw(
            'users.id AS user_id,
            work_logs.id,
            users.name AS username,
            users.user_level,
            work_logs.history,
            work_logs.created_at AS date,
            DATE_FORMAT(work_logs.created_at, "%b. %d, %Y, %h:%i %p") AS datetime')
        ->where('employee_id',$request->id)
        ->join('users', 'users.id','user_id')
        ->orderBy('work_logs.id', 'DESC')
        ->get();
        return DataTables::of($work_history)->make(true);
    }

    public function logs_data(Request $request){
        $employee_logs = EmployeeLogs::selectRaw(
                        'users.id AS user_id,
                        employee_logs.id,
                        users.name AS username,
                        users.user_level,
                        employee_logs.created_at AS date,
                        DATE_FORMAT(employee_logs.created_at, "%b. %d, %Y, %h:%i %p") AS datetime,
                        employee_logs.logs')
            ->where('employee_id',$request->id)
            ->join('users', 'users.id','user_id')
            ->orderBy('employee_logs.id', 'DESC')
            ->get();
        return DataTables::of($employee_logs)->make(true);
    }
}
