<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\UserLogs;
use App\Models\Branch;
use App\Models\Supervisor;
use App\Models\Shift;
use App\Models\JobPosition;
use App\Models\JobDescription;
use Illuminate\Http\Request;
use DataTables;

class MaintenanceController extends Controller
{
    // Company
    public function companyData(){
        $company = Company::all();
        return DataTables::of($company)->make(true);
    }

    public function companySave(Request $request){
        // $company_name = ucwords($request->company);

        if(Company::whereRaw('UPPER(company) = ?', strtoupper($request->company))->count() > 0){
            return 'duplicate';
        }
        $company = new Company;
        $company->company = ucwords($request->company);
        $sql = $company->save();

        if($sql){
            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "COMPANY ADDED: User successfully added Company: ($request->company)."; //Display logs in home page
            $userlogs->save();

            return 'true';
        }
        else{
            return 'false';
        }
    }

    public function companyUpdate(Request $request){
        $company_orig = $request->company_orig;
        $company_new = ucwords($request->company_new);

        if(strtoupper($company_orig) != strtoupper($company_new)){
            if(Company::whereRaw('UPPER(company) = ?', strtoupper($company_new))->count() > 0){
                return 'duplicate';
            }
        }

        $company = Company::find($request->company_id);
        $company->company = $company_new;
        $sql = $company->save();

        if($sql){
            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "COMPANY UPDATED: User successfully updated the Company: FROM ($company_orig) TO ($company_new).";
            $userlogs->save();
            return 'true';
        }
        else{
            return 'false';
        }
    }

    //Branch
    public function branchData(){
        $branch = Branch::all();
        return DataTables::of($branch)->make(true);
    }

    public function branchSave(Request $request){
        $branch_details_name = ucwords($request->branch_name);

        if(Branch::whereRaw('UPPER(branch_name) = ?', strtoupper($branch_details_name))->count() > 0){
            return 'duplicate';
        }

        $branch = new Branch;
        $branch->branch_name = $branch_details_name;
        $sql = $branch->save();

        if($sql){
            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "BRANCH ADDED: User successfully added Branch: ($branch_details_name)."; //Display logs in home page
            $userlogs->save();
            return 'true';
        }
        else{
            return 'false';
        }
    }

    public function branchUpdate(Request $request){
        $branch_orig = $request->branch_orig;
        $branch_new = ucwords($request->branch_new);

        if(strtoupper($branch_orig) != strtoupper($branch_new)){
            if(Branch::whereRaw('UPPER(branch_name) = ?', strtoupper($branch_new))->count() > 0){
                return 'duplicate';
            }
        }

        $branch = Branch::find($request->branch_id);
        $branch->branch_name = $branch_new;
        $sql = $branch->save();

        if($sql){
            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "BRANCH UPDATED: User successfully updated the Branch: FROM ($branch_orig) TO ($branch_new).";
            $userlogs->save();

            return 'true';
        }
        else{
            return 'false';
        }
    }

    // Supervisor
    public function supervisorData(){
        $supervisor = Supervisor::all();
        return DataTables::of($supervisor)->make(true);
    }

    public function supervisorSave(Request $request){
        // $supervisor_details_name = ucwords($request->supervisor_name);

        if(Supervisor::whereRaw('UPPER(supervisor_name) = ?', strtoupper($request->supervisor_name))->count() > 0){
            return 'duplicate';
        }

        $supervisor = new Supervisor;
        // $supervisor->supervisor_name = $supervisor_details_name;
        $supervisor->supervisor_name = ucwords($request->supervisor_name);
        $sql = $supervisor->save();

        if($sql){
            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "SUPERVISOR ADDED: User successfully added Supervisor: ($request->supervisor_name)."; //Display logs in home page
            $userlogs->save();
            return 'true';
        }
        else{
            return 'false';
        }
    }

    public function supervisorUpdate(Request $request){
        $supervisor_orig = $request->supervisor_orig;
        $supervisor_new = ucwords($request->supervisor_new);

        if(strtoupper($supervisor_orig) != strtoupper($supervisor_new)){
            if(Supervisor::whereRaw('UPPER(supervisor_name) = ?', strtoupper($supervisor_new))->count() > 0){
                return 'duplicate';
            }
        }

        $supervisor = Supervisor::find($request->supervisor_id);
        $supervisor->supervisor_name = $supervisor_new;
        $sql = $supervisor->save();

        if($sql){
            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "SUPERVISOR UPDATED: User successfully updated Supervisor: FROM ($supervisor_orig) TO ($supervisor_new).";
            $userlogs->save();

            return 'true';
        }
        else{
            return 'false';
        }
    }

    public function shiftData(){
        $shift = Shift::all();
        return DataTables::of($shift)->make(true);
    }

    public function shiftSave(Request $request){
        $shift_code_logs = strtoupper($request->shift_code);
        $shift_working_hours_logs = strtoupper($request->shift_working_hours);
        $shift_break_time_logs = strtoupper($request->shift_break_time);

        if(Shift::whereRaw('UPPER(shift_code) = ?', strtoupper($shift_code_logs))->count() > 0){
            return 'duplicate';
        }
        
        $shift = new Shift;
        $shift->shift_code = $shift_code_logs;
        $shift->shift_working_hours = $shift_working_hours_logs;
        $shift->shift_break_time = $shift_break_time_logs;
        $sql = $shift->save();

        if($sql){
            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "SHIFT ADDED: User successfully added Shift: with SHIFT CODE ($shift_code_logs) WORKING HOURS ($shift_working_hours_logs) BREAK TIME ($shift_break_time_logs)'."; //Display logs in home page
            $userlogs->save();
            return 'true';
        }
        else{
            return 'false';
        }
    }

    public function shiftUpdate(Request $request){
        $shift_code_orig = $request->shift_code_orig;
        $shift_code_new = ucwords($request->shift_code_new);

        if(strtoupper($shift_code_orig) != strtoupper($shift_code_new)){
            if(Shift::whereRaw('UPPER(shift_code) = ?', strtoupper($shift_code_new))->count() > 0){
                return 'duplicate';
            }
        }

        $shift_working_hours_orig = $request->shift_working_hours_orig;
        $shift_working_hours_new = strtoupper($request->shift_working_hours_new);

        $shift_break_time_orig = $request->shift_break_time_orig;
        $shift_break_time_new = strtoupper($request->shift_break_time_new);

        $shift = Shift::find($request->shift_id);
        $shift->shift_code = $shift_code_new;
        $shift->shift_working_hours = $shift_working_hours_new;
        $shift->shift_break_time = $shift_break_time_new;
        $sql = $shift->save();

        if($sql){
            if($shift_code_orig != $shift_code_new){
                $shift_code_change = "(Shift Code: FROM '$shift_code_orig' TO '$shift_code_new')";
            }
            else{
                $shift_code_change = NULL;
            }

            if($shift_working_hours_orig != $shift_working_hours_new){
                $shift_working_hours_change = "(Working Hours: FROM '$shift_working_hours_orig' TO '$shift_working_hours_new')";
            }
            else{
                $shift_working_hours_change = NULL;
            }

            if($shift_break_time_orig != $shift_break_time_new){
                $shift_break_time_change = "(Working Hours: FROM '$shift_break_time_orig' TO '$shift_break_time_new')";
            }
            else{
                $shift_break_time_change = NULL;
            }

            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "SHIFT UPDATED: User successfully updated details of '$shift_code_orig' with the following CHANGES: $shift_code_change $shift_working_hours_change $shift_break_time_change.";
            $userlogs->save();

            return 'true';
        }
        else{
            return 'false';
        }
    }

    public function jobPositionData(){
        $jobPosition = JobPosition::all();
        return DataTables::of($jobPosition)->make(true);
    }

    public function jobPositionSave(Request $request){

        if(JobPosition::whereRaw('UPPER(job_position_name) = ?', strtoupper($request->job_position_name))->count() > 0){
            return 'duplicate';
        }

        $jobPosition = new JobPosition;
        $jobPosition->job_position_name = ucwords($request->job_position_name);
        $sql = $jobPosition->save();

        if($sql){
            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "JOB POSITION ADDED: User successfully added Job Position: ($request->job_position_name)."; //Display logs in home page
            $userlogs->save();

            $result = 'true';
            $id = $jobPosition->id;
        }
        else{
            $result = 'false';
            $id = '';
        }

        $data = array('result' => $result, 'id' => $id);
        return response()->json($data);
    }

    public function jobPositionUpdate(Request $request){
        $job_position_name_orig = $request->job_position_name_orig;
        $job_position_name_new = $request->job_position_name_new;
        
        //To prevent update/Capital Letters
        if(strtoupper($job_position_name_orig) != strtoupper($job_position_name_new)){
            if(JobPosition::whereRaw('UPPER(job_position_name) = ?', strtoupper($job_position_name_new))->count() > 0){
                return 'duplicate';
            }
        }

        $jobPosition = JobPosition::find($request->job_position_name_id);
        $jobPosition->job_position_name = $job_position_name_new;
        $sql = $jobPosition->save();

        if($sql){

                $userlogs = new UserLogs;
                $userlogs->user_id = auth()->user()->id;
                $userlogs->activity = "JOB POSITION UPDATED: User successfully updated Job Position: FROM ($job_position_name_orig) TO ($job_position_name_new)."; //Display logs in home page
                $userlogs->save();
            return 'true';
        }
        else{
            return 'false';
        }
    }

    public function jobDescriptionData(){
        $jobDescription = JobDescription::all();
        return DataTables::of($jobDescription)->make(true);
    }

    public function jobDescriptionSave(Request $request){

        $jobDescription = new JobDescription;
        $jobDescription->job_position_id = $request->job_position_id;
        $jobDescription->job_description = ucfirst($request->job_description);
        $jobDescription->save();

        $userlogs = new UserLogs;
        $userlogs->user_id = auth()->user()->id;
        $userlogs->activity = "JOB DESCRIPTION ADDED: User successfully added Job Description: ($request->job_description) with Job Position ID: ($request->job_position_id)."; //Display logs in home page
        $userlogs->save();
    }

    public function jobDescriptionUpdate(Request $request){
        $job_description_orig = $request->job_description_orig;
        $job_description_new = $request->job_description_new;

        $jobDescription = JobDescription::find($request->job_description_id);
        $jobDescription->job_description = ucfirst($request->job_description_new);
        $sql = $jobDescription->save();

        if($sql){
            return 'true';
        }
        else{
            return 'false';
        }
    }
}
