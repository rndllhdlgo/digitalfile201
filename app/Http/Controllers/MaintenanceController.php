<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\UserLogs;
use App\Models\Branch;
use App\Models\Shift;
use App\Models\Position;
use App\Models\Department;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use DataTables;

class MaintenanceController extends Controller
{
    public function companyData(){
        try{
            return DataTables::of(Company::all())->make(true);
        }
        catch(QueryException $e){
            return response()->json(['error' => 'Table company not found'], 500);
        }
    }

    public function departmentData(){
        try{
            return DataTables::of(Department::all())->make(true);
        }
        catch(QueryException $e){
            return response()->json(['error' => 'Table department not found'], 500);
        }
    }

    public function branchData(){
        try{
            return DataTables::of(Branch::all())->make(true);
        }
        catch(QueryException $e){
            return response()->json(['error' => 'Table branch not found'], 500);
        }
    }

    public function shiftData(){
        try{
            $shift = Shift::select('shift','break','desc','in','out','break_out','break_in')->get();
            return DataTables::of($shift)->make(true);
        }
        catch(QueryException $e){
            return response()->json(['error' => 'Table shift not found'], 500);
        }
    }

    public function positionData(){
        try{
            return DataTables::of(Position::all())->make(true);
        }
        catch(QueryException $e){
            return response()->json(['error' => 'Table position not found'], 500);
        }
    }

    public function positionSave(Request $request){
        $position = new Position;
        $position->job_position_name = strtoupper($request->job_position_name);
        $position->job_description = $request->job_description;
        $position->job_requirements = $request->job_requirements;
        $save = $position->save();

        if($save){
            $userlogs = new UserLogs;
            $userlogs->username = auth()->user()->name;
            $userlogs->role = auth()->user()->user_level;
            $userlogs->activity = "ADDED JOB POSITION: USER SUCCESSFULLY ADDED JOB POSITION: ['$request->job_position_name'].";
            $userlogs->save();
            return 'true';
        }
        else{
            return 'false';
        }
    }

    public function positionUpdate(Request $request){
        $update = Position::where('id', $request->position_id)->update([
            'job_position_name' => $request->job_position_name,
            'job_description' => $request->job_description,
            'job_requirements' => $request->job_requirements
        ]);

        if($update){
            $userlogs = new UserLogs;
            $userlogs->username = auth()->user()->name;
            $userlogs->role = auth()->user()->user_level;
            $userlogs->activity = "UPDATED POSITION: USER UPDATED DETAILS OF JOB POSITION: ['$request->job_position_name']";
            $userlogs->save();
            return 'true';
        }
        else{
            return 'false';
        }
    }

    public function checkDuplicate(Request $request){
        if(Position::where('job_position_name',$request->job_position_name)->count() > 0){
            return 'true';
        }
    }
}
