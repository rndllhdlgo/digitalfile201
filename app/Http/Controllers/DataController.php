<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChildrenTable;
use App\Models\CollegeTable;
use App\Models\TrainingTable;
use App\Models\VocationalTable;
use App\Models\JobHistoryTable;
use App\Models\MemoTable;
use App\Models\EvaluationTable;
use App\Models\ContractTable;
use App\Models\ResignationTable;
use App\Models\TerminationTable;
use App\Models\History;
use App\Models\EmployeeLogs;

use DataTables;

class DataController extends Controller
{
    public function children_data(Request $request){
        return DataTables::of(ChildrenTable::where('employee_id',$request->id)->get())->make(true);
    }

    public function college_data(Request $request){
        return DataTables::of(CollegeTable::where('employee_id',$request->id)->get())->make(true);
    }

    public function training_data(Request $request){
        return DataTables::of(TrainingTable::where('employee_id',$request->id)->get())->make(true);
    }

    public function vocational_data(Request $request){
        return DataTables::of(VocationalTable::where('employee_id',$request->id)->get())->make(true);
    }

    public function job_history_data(Request $request){
        return DataTables::of(JobHistoryTable::where('employee_id',$request->id)->get())->make(true);
    }

    public function memo_data(Request $request){
        return DataTables::of(MemoTable::where('employee_id',$request->id)->get())->make(true);
    }

    public function evaluation_data(Request $request){
        return DataTables::of(EvaluationTable::where('employee_id',$request->id)->get())->make(true);
    }

    public function contracts_data(Request $request){
        return DataTables::of(ContractTable::where('employee_id',$request->id)->get())->make(true);
    }

    public function resignation_data(Request $request){
        return DataTables::of(ResignationTable::where('employee_id',$request->id)->get())->make(true);
    }

    public function termination_data(Request $request){
        return DataTables::of(TerminationTable::where('employee_id',$request->id)->get())->make(true);
    }

    public function college_summary_data(Request $request){
        return CollegeTable::where('employee_id',$request->id)->get();
    }

    public function training_summary_data(Request $request){
        return TrainingTable::where('employee_id',$request->id)->get();
    }

    public function vocational_summary_data(Request $request){
        return VocationalTable::where('employee_id',$request->id)->get();
    }

    public function job_history_summary_data(Request $request){
        return JobHistoryTable::where('employee_id',$request->id)->get();
    }

    public function history_data(Request $request){
        $work_history = History::selectRaw(
            'users.id AS user_id,
            history_logs.id,
            users.name AS username,
            users.user_level,
            history_logs.history,
            history_logs.created_at AS date,
            DATE_FORMAT(history_logs.created_at, "%b. %d, %Y, %h:%i %p") AS datetime')
        ->where('employee_id',$request->id)
        ->join('users', 'users.id','user_id')
        ->orderBy('history_logs.id', 'DESC')
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
