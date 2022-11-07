<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\UserLogs;
use App\Models\Branch;
use App\Models\Supervisor;
use App\Models\Shift;
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
        $company_name = ucwords($request->company);

        if(Company::whereRaw('UPPER(company) = ?', strtoupper($company_name))->count() > 0){
            return 'duplicate';
        }
        $company = new Company;
        $company->company = $company_name;
        $sql = $company->save();

        if($sql){
            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "ADDED COMPANY: User successfully added Company: '$company_name'."; //Display logs in home page
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
            $userlogs->activity = "UPDATED COMPANY: User successfully updated Company: FROM '$company_orig' TO '$company_new'.";
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
        $branch_nme = ucwords($request->branch_name);

        if(Branch::whereRaw('UPPER(branch_name) = ?', strtoupper($branch_nme))->count() > 0){
            return 'duplicate';
        }

        $branch = new Branch;
        $branch->branch_name = $branch_nme;
        $sql = $branch->save();

        if($sql){
            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "ADDED BRANCH: User successfully added Branch: '$branch_nme'."; //Display logs in home page
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
            $userlogs->activity = "UPDATED BRANCH: User successfully updated Branch: FROM '$branch_orig' TO '$branch_new'.";
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
        $supervisor_nme = ucwords($request->supervisor_name);

        if(Supervisor::whereRaw('UPPER(supervisor_name) = ?', strtoupper($supervisor_nme))->count() > 0){
            return 'duplicate';
        }

        $supervisor = new Supervisor;
        $supervisor->supervisor_name = $supervisor_nme;
        $sql = $supervisor->save();

        if($sql){
            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "ADDED SUPERVISOR: User successfully added Supervisor: '$supervisor_nme'."; //Display logs in home page
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
            $userlogs->activity = "UPDATED BRANCH: User successfully updated Branch: FROM '$supervisor_orig' TO '$supervisor_new'.";
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
        $shift = new Shift;
        $shift->shift_code = strtoupper($request->shift_code);
        $shift->shift_working_hours = $request->shift_working_hours;
        $shift->shift_break_time = $request->shift_break_time;
        $sql = $shift->save();

        if($sql){
            return 'true';
        }
        else{
            return 'false';
        }
    }
}
