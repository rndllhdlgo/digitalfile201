<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\UserLogs;
use App\Models\Branch;
use App\Models\Supervisor;
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

    public function companySave(Request $request){
        $company_name_logs = strtoupper($request->company_name);

        //To prevent add/Capital Letters
        // if(Company::whereRaw('UPPER(company_name) = ?', strtoupper($company_name_logs))->count() > 0){
        //     return 'duplicate';
        // }

        $company = new Company;
        $company->company_name = $company_name_logs;
        $sql = $company->save();

        if($sql){
            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "ADDED COMPANY: User successfully added Company: [$company_name_logs]."; //Display logs in home page
            $userlogs->save();
            return 'true';
        }
        else{
            return 'false';
        }
    }

    public function companyUpdate(Request $request){
        $company_name_orig = strtoupper($request->company_name_orig);
        $company_name_new = strtoupper($request->company_name_new);

        if(strtoupper($company_name_orig) != strtoupper($company_name_new)){
            if(Company::whereRaw('UPPER(company_name) = ?', strtoupper($company_name_new))->count() > 0){
                return 'duplicate';
            }
        }

        $company = Company::find($request->company_id);
        $company->company_name = $company_name_new;
        $sql = $company->save();

        if($sql){
            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "UPDATED COMPANY: User successfully updated the Company: FROM [$company_name_orig] TO [$company_name_new].";
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
        $branch_name_logs = strtoupper($request->branch_name);

        // if(Branch::whereRaw('UPPER(branch_name) = ?', strtoupper($branch_name_logs))->count() > 0){
        //     return 'duplicate';
        // }

        $branch = new Branch;
        $branch->branch_name = $branch_name_logs;
        $sql = $branch->save();

        if($sql){
            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "ADDED BRANCH: User successfully added Branch: [$branch_name_logs]."; //Display logs in home page
            $userlogs->save();
            return 'true';
        }
        else{
            return 'false';
        }
    }

    public function branchUpdate(Request $request){
        $branch_name_orig = strtoupper($request->branch_name_orig);
        $branch_name_new = strtoupper($request->branch_name_new);

        if(strtoupper($branch_name_orig) != strtoupper($branch_name_new)){
            if(Branch::whereRaw('UPPER(branch_name) = ?', strtoupper($branch_name_new))->count() > 0){
                return 'duplicate';
            }
        }

        $branch = Branch::find($request->branch_id);
        $branch->branch_name = $branch_name_new;
        $sql = $branch->save();

        if($sql){
            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "UPDATED BRANCH: User successfully updated the Branch: FROM [$branch_name_orig] TO [$branch_name_new].";
            $userlogs->save();
            return 'true';
        }
        else{
            return 'false';
        }
    }

    //Shift
    public function shiftData(){
        $shift = Shift::all();
        return DataTables::of($shift)->make(true);
    }

    public function shiftSave(Request $request){
        $shift_code_logs = strtoupper($request->shift_code);
        $shift_working_hours_logs = strtoupper($request->shift_working_hours);
        $shift_break_time_logs = strtoupper($request->shift_break_time);

        // if(Shift::whereRaw('UPPER(shift_code) = ?', strtoupper($shift_code_logs))->count() > 0){
        //     return 'duplicate';
        // }
        
        $shift = new Shift;
        $shift->shift_code = $shift_code_logs;
        $shift->shift_working_hours = $shift_working_hours_logs;
        $shift->shift_break_time = $shift_break_time_logs;
        $sql = $shift->save();

        if($sql){
            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "ADDED SHIFT: User successfully added Shift: with SHIFT CODE: [$shift_code_logs] WORKING HOURS: [$shift_working_hours_logs] BREAK TIME: [$shift_break_time_logs]."; //Display logs in home page
            $userlogs->save();
            return 'true';
        }
        else{
            return 'false';
        }
    }

    public function shiftUpdate(Request $request){
        $shift_code_orig = strtoupper($request->shift_code_orig);
        $shift_code_new = strtoupper($request->shift_code_new);

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
                $shift_code_change = "[Shift Code: FROM '$shift_code_orig' TO '$shift_code_new']";
            }
            else{
                $shift_code_change = NULL;
            }

            if($shift_working_hours_orig != $shift_working_hours_new){
                $shift_working_hours_change = "[Working Hours: FROM '$shift_working_hours_orig' TO '$shift_working_hours_new']";
            }
            else{
                $shift_working_hours_change = NULL;
            }

            if($shift_break_time_orig != $shift_break_time_new){
                $shift_break_time_change = "[Break Time: FROM '$shift_break_time_orig' TO '$shift_break_time_new']";
            }
            else{
                $shift_break_time_change = NULL;
            }

            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "UPDATED SHIFT: User successfully updated details of '$shift_code_orig' with the following CHANGES: $shift_code_change $shift_working_hours_change $shift_break_time_change.";
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
        $supervisor_name_logs = strtoupper($request->supervisor_name);

        // if(Supervisor::whereRaw('UPPER(supervisor_name) = ?', strtoupper($supervisor_name_logs))->count() > 0){
        //     return 'duplicate';
        // }

        $supervisor = new Supervisor;
        $supervisor->supervisor_name = $supervisor_name_logs;
        $sql = $supervisor->save();

        if($sql){
            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "ADDED SUPERVISOR: User successfully added Supervisor: [$supervisor_name_logs]."; //Display logs in home page
            $userlogs->save();
            return 'true';
        }
        else{
            return 'false';
        }
    }

    public function supervisorUpdate(Request $request){
        $supervisor_name_orig = strtoupper($request->supervisor_name_orig);
        $supervisor_name_new = strtoupper($request->supervisor_name_new);

        if(strtoupper($supervisor_name_orig) != strtoupper($supervisor_name_new)){
            if(Supervisor::whereRaw('UPPER(supervisor_name) = ?', strtoupper($supervisor_name_new))->count() > 0){
                return 'duplicate';
            }
        }

        $supervisor = Supervisor::find($request->supervisor_id);
        $supervisor->supervisor_name = $supervisor_name_new;
        $sql = $supervisor->save();

        if($sql){
            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "UPDATED SUPERVISOR: User successfully updated Supervisor: FROM [$supervisor_name_orig] TO [$supervisor_name_new].";
            $userlogs->save();

            return 'true';
        }
        else{
            return 'false';
        }
    }

    public function jobPositionAndDescriptionData(){
        $jobPositionAndDescription = Position::all();
        return DataTables::of($jobPositionAndDescription)->make(true);
    }

    public function jobPositionAndDescriptionSave(Request $request){
        $job_position_name_logs = strtoupper($request->job_position_name);
        
        // if(Position::whereRaw('UPPER(job_position_name) = ?', strtoupper($job_position_name_logs))->count() > 0){
        //     return 'duplicate';
        // }

        $jobPositionAndDescription = new Position;
        $jobPositionAndDescription->job_position_name = $job_position_name_logs;
        $jobPositionAndDescription->job_description = $request->job_description;
        $jobPositionAndDescription->job_requirements = $request->job_requirements;
        $sql = $jobPositionAndDescription->save();

        if($sql){
            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "ADDED JOB POSITION: User successfully added Job Position: [$job_position_name_logs]"; //Display logs in home page
            $userlogs->save();
            return 'true';
        }
        else{
            return 'false';
        }
    }

    public function jobPositionAndDescriptionUpdate(Request $request){
        $job_position_name_orig = $request->job_position_name_orig;
        $job_position_name_new = $request->job_position_name_new;
        $job_description_orig = $request->job_description_orig;
        $job_description_new = $request->job_description_new;
        $job_requirements_orig = $request->job_requirements_orig;
        $job_requirements_new = $request->job_requirements_new;

        $jobPositionAndDescription = new Position;
        $jobPositionAndDescription = Position::find($request->job_position_and_description_id);
        $jobPositionAndDescription->job_position_name = $job_position_name_new;
        $jobPositionAndDescription->job_description = $job_description_new;
        $jobPositionAndDescription->job_requirements = $job_requirements_new;
        $sql = $jobPositionAndDescription->save();

        if($sql){
            return 'true';
        }
        else{
            return 'false';
        }
    }
    
    public function departmentData(){
        $department = Department::all();
        return DataTables::of($department)->make(true);
    }

    public function departmentSave(Request $request){
        $department_logs = ucfirst($request->department);

        $department = new Department;
        $department->department = $department_logs;
        $save = $department->save();

        if($save){
            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "ADDED DEPARTMENT: User successfully added Department: ['$department_logs']."; //Display logs in home page
            $userlogs->save();
            return 'true';
        }
        else{
            return 'false';
        }
    }
    
    public function departmentUpdate(Request $request){
        $department_orig = strtoupper($request->department_orig);
        $department_new = strtoupper($request->department_new);

        $department = Department::find($request->department_id);
        $department->department = $department_new;
        $save = $department->save();

        if($save){
            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "UPDATED DEPARTMENT: User successfully updated Maintenance Department: ['$department_orig' TO '$department_new']"; //Display logs in home page
            $userlogs->save();
            return 'true';
        }
        else{
            return 'false';
        }
    }

    public function checkDuplicate(Request $request){
        if(Department::where('department',$request->department)->count() > 0){
            return 'duplicate_department';
        }
        if(Company::where('company_name',$request->company_name)->count() > 0){
            return 'duplicate_company_name';
        }
        if(Branch::where('branch_name',$request->branch_name)->count() > 0){
            return 'duplicate_branch_name';
        }
        if(Shift::where('shift_code',$request->shift_code)->count() > 0){
            return 'duplicate_shift_code';
        }
        if(Supervisor::where('supervisor_name',$request->supervisor_name)->count() > 0){
            return 'duplicate_supervisor_name';
        }
        if(Position::where('job_position_name',$request->job_position_name)->count() > 0){
            return 'duplicate_job_position_name';
        }
    }
}
