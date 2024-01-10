<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\UserLogs;
use App\Models\Region;
use App\Models\City;
use App\Models\Province;
use App\Models\Company;
use App\Models\Branch;
use App\Models\Shift;
use App\Models\JobPosition;
use App\Models\JobDescription;
use App\Models\Position;
use App\Models\Department;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use DataTables;

class PagesController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function employees(){
        try{
            $companies       = Company::select('entity','company_name')->get();
            $branches        = Branch::select('entity03','entity03_desc')->get();
            $jobPositions    = Position::select('id','job_position_name')->get();
            $jobDescriptions = Position::select('id','job_description')->get();
            $jobRequirements = Position::select('id','job_requirements')->get();
            $departments     = Department::select('deptcode','deptdesc')->get();
            $provinces       = Province::orderBy('provDesc', 'asc')->get();
            return view('pages.employees', compact('provinces','companies','branches','jobPositions','jobDescriptions','jobRequirements','departments'));
        }
        catch(QueryException $th){
            if(strpos($th->getMessage(), 'department') !== false){
                $errorMessage = $th->getMessage();
                return view('errors.500', compact('errorMessage'));
            }
        }
    }

    public function getCities(Request $request){
        $cities = City::query()->where('provCode', $request->provCode)->orderBy('citymunDesc', 'asc')->get();
        return response()->json($cities);
    }

    public function getRegion(Request $request){
        $cities = City::query()->where('citymunCode', $request->citymunCode)->first();
        $region = Region::query()->where('regCode', $cities->regCode)->get();
        return response()->json($region);
    }

    public function setJobPosition(Request $request){
        $list = Position::where('id',$request->id)->get()->sortBy('job_position_name');
        return response()->json($list);
    }

    public function setJobDescription(Request $request){
        $list = Position::where('id',$request->id)->get()->sortBy('job_description');
        return response()->json($list);
    }

    public function setJobRequirements(Request $request){
        $list = Position::where('id',$request->id)->get()->sortBy('job_requirements');
        return response()->json($list);
    }

    public function users(){
        if(Auth::user()->user_level != 'ADMIN'){
            return redirect('/');
        }
        $user_level = User::query()->select('user_level')->distinct()->get()->sortBy('user_level');
        return view('pages.users', compact('user_level'));
    }

    public function maintenance(){
        if(Auth::user()->user_level != 'ADMIN'){
            return redirect('/');
        }
        return view('pages.maintenance');
    }

    public function updates(){
        if(Auth::user()->user_level != 'ADMIN'){
            return redirect('/');
        }
        return view('pages.updates');
    }
}
