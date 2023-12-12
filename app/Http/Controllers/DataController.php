<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\QueryException;
use App\Models\Children;
use App\Models\College;
use App\Models\Contract;
use App\Models\Evaluation;
use App\Models\EmployeeLogs;
use App\Models\Training;
use App\Models\Vocational;
use App\Models\JobHistory;
use App\Models\Memo;
use App\Models\Resignation;
use App\Models\Termination;
use App\Models\WorkLogs;
use App\Models\Hmo;
use App\Models\Secondary;
use App\Models\Primary;
use App\Models\LeaveCredits;
use DataTables;

class DataController extends Controller
{
    public function children_data(Request $request){
        try{
            return DataTables::of(Children::where('employee_id', $request->id)->get())->make(true);
        }
        catch(QueryException $e){
            return response()->json(['error' => 'Table children not found'], 500);
        }
    }

    public function college_data(Request $request){
        try{
            return DataTables::of(College::where('employee_id', $request->id)->get())->make(true);
        }
        catch(QueryException $e){
            return response()->json(['error' => 'Table college not found'], 500);
        }
    }

    public function leave_data(Request $request){
        $data = Http::get('http://tms.ideaserv.com.ph:8080/employees/leave_data?empno='.$request->empno);
        $jsonData = json_decode($data->body(), true);
        $BL = false;
        foreach($jsonData as $key => $value){
            foreach($value as $a => $b){
                if($a == 'lv_code'){
                    if($b == 'BL'){
                        $BL = true;
                        break;
                    }
                }
            }
            if($BL){
                break;
            }
        }
        if(!$BL){
            $newData = [
                "empno" => $request->empno,
                "lv_code" => "BL",
                "lv_balance" => "0.00",
                "no_days" => "1.00"
            ];
            $jsonData[] = $newData;
        }
        return DataTables::of($jsonData)->make(true);
    }

    public function secondary_data(Request $request){
        try{
            return DataTables::of(Secondary::where('employee_id', $request->id)->get())->make(true);
        }
        catch(QueryException $e){
            return response()->json(['error' => 'Table secondary not found'], 500);
        }
    }

    public function primary_data(Request $request){
        try{
            return DataTables::of(Primary::where('employee_id', $request->id)->get())->make(true);
        }
        catch(QueryException $e){
            return response()->json(['error' => 'Table primary not found'], 500);
        }
    }

    public function training_data(Request $request){
        try{
            return DataTables::of(Training::where('employee_id', $request->id)->get())->make(true);
        }
        catch(QueryException $e){
            return response()->json(['error' => 'Table training not found'], 500);
        }
    }

    public function vocational_data(Request $request){
        try{
            return DataTables::of(Vocational::where('employee_id', $request->id)->get())->make(true);
        }
        catch(QueryException $e){
            return response()->json(['error' => 'Table vocational not found'], 500);
        }
    }

    public function job_history_data(Request $request){
        try{
            return DataTables::of(JobHistory::where('employee_id', $request->id)->get())->make(true);
        }
        catch(QueryException $e){
            return response()->json(['error' => 'Table job not found'], 500);
        }
    }

    public function memo_data(Request $request){
        try{
            return DataTables::of(Memo::where('employee_id', $request->id)->get())->make(true);
        }
        catch(QueryException $e){
            return response()->json(['error' => 'Table memo not found'], 500);
        }
    }

    public function evaluation_data(Request $request){
        try{
            return DataTables::of(Evaluation::where('employee_id', $request->id)->get())->make(true);
        }
        catch(QueryException $e){
            return response()->json(['error' => 'Table evaluation not found'], 500);
        }
    }

    public function contracts_data(Request $request){
        try{
            return DataTables::of(Contract::where('employee_id', $request->id)->get())->make(true);
        }
        catch(QueryException $e){
            return response()->json(['error' => 'Table contract not found'], 500);
        }
    }

    public function resignation_data(Request $request){
        try{
            return DataTables::of(Resignation::where('employee_id', $request->id)->get())->make(true);
        }
        catch(QueryException $e){
            return response()->json(['error' => 'Table resignation not found'], 500);
        }
    }

    public function termination_data(Request $request){
        try{
            return DataTables::of(Termination::where('employee_id', $request->id)->get())->make(true);
        }
        catch(QueryException $e){
            return response()->json(['error' => 'Table termination not found'], 500);
        }
    }

    public function hmo_data(Request $request){
        try{
            return DataTables::of(Hmo::where('employee_id', $request->id)->get())->make(true);
        }
        catch(QueryException $e){
            return response()->json(['error' => 'Table hmo not found'], 500);
        }
    }

    public function college_summary_data(Request $request){
        return College::where('employee_id', $request->id)->get();
    }

    public function secondary_summary_data(Request $request){
        return Secondary::where('employee_id', $request->id)->get();
    }

    public function primary_summary_data(Request $request){
        return Primary::where('employee_id', $request->id)->get();
    }

    public function training_summary_data(Request $request){
        return Training::where('employee_id', $request->id)->get();
    }

    public function vocational_summary_data(Request $request){
        return Vocational::where('employee_id', $request->id)->get();
    }

    public function job_history_summary_data(Request $request){
        return JobHistory::where('employee_id', $request->id)->get();
    }

    public function history_data(Request $request){
        $data = WorkLogs::query()
            ->selectRaw('username, role, activity, work_logs.created_at AS date, DATE_FORMAT(work_logs.created_at, "%b. %d, %Y, %h:%i %p") AS datetime')
            ->where('employee_id', $request->id)
            ->where('username', '!=', '')
            ->orderBy('work_logs.id', 'DESC')
            ->get();
        return DataTables::of($data)->make(true);
    }

    public function logs_data(Request $request){
        $data = EmployeeLogs::query()
            ->selectRaw('username, role, activity, employee_logs.created_at AS date, DATE_FORMAT(employee_logs.created_at, "%b. %d, %Y, %h:%i %p") AS datetime')
            ->where('employee_id', $request->id)
            ->where('username', '!=', '')
            ->orderBy('employee_logs.id', 'DESC')
            ->get();
        return DataTables::of($data)->make(true);
    }
}
