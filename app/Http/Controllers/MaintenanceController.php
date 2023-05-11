<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\UserLogs;
use App\Models\Branch;
use App\Models\Shift;
use App\Models\Position;
use App\Models\Department;

use Illuminate\Http\Request;
use DataTables;

class MaintenanceController extends Controller
{
    public function companyData(){
        $company = Company::all();
        return DataTables::of($company)->make(true);
    }

    public function departmentData(){
        $department = Department::all();
        return DataTables::of($department)->make(true);
    }

    public function branchData(){
        $branch = Branch::all();
        return DataTables::of($branch)->make(true);
    }

    public function shiftData(){
        $shift = Shift::select('shift','break','desc','in','out','break_out','break_in')->get();
        return DataTables::of($shift)->make(true);
    }

    public function positionData(){
        $position = Position::all();
        return DataTables::of($position)->make(true);
    }

    public function positionSave(Request $request){
        $position = new Position;
        $position->job_position_name = strtoupper($request->job_position_name);
        $position->job_description = $request->job_description;
        $position->job_requirements = $request->job_requirements;
        $save = $position->save();

        if($save){
            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "ADDED JOB POSITION: User successfully added Job Position: ['$request->job_position_name']."; //Display logs in home page
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
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "UPDATED POSITION: User successfully updated details of Job Position: ['$request->job_position_name']"; //Display logs in home page
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
