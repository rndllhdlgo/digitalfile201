<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\UserLogs;
use Illuminate\Http\Request;
use DataTables;

class MaintenanceController extends Controller
{
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
            $userlogs->activity = "ADDED COMPANY: User successfully added Company: '$company_name'.";
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
}
