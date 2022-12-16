<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\UserLogs;
use App\Models\Region;
use App\Models\City;
use App\Models\Province;
use App\Models\Company;
use App\Models\Branch;
use App\Models\Supervisor;
use App\Models\Shift;
use App\Models\JobPosition;
use App\Models\JobDescription;
use App\Models\Position;
use App\Models\Department;
use Illuminate\Http\Request;
use DataTables;

class PagesController extends Controller
{
    
    public function employees(){
        if(!auth()->user()){
            return redirect('/login');
        }
        
        if(Auth::user()->user_level != 'ADMIN'){
            return redirect('/');
        }
        $regions = Region::select('regCode','regDesc')->get()->sortBy('regCode');
        $companies = Company::select('id','company_name')->get();
        $branches = Branch::select('id','branch_name')->get();
        $supervisors = Supervisor::select('id','supervisor_name')->get();
        $shifts = Shift::select('id','shift_code','shift_working_hours','shift_break_time')->get();
        $jobPositions = Position::select('id','job_position_name')->get();
        $jobDescriptions = Position::select('id','job_description')->get();
        $jobRequirements = Position::select('id','job_requirements')->get();
        $departments = Department::select('id','department')->get();
        
        return view('pages.employees', compact('regions','companies','branches','supervisors','shifts','jobPositions','jobDescriptions','jobRequirements','departments'));
    }

    public function setprovince(Request $request){
        $list = Province::where('regCode',$request->regCode)->get()->sortBy('provDesc');
        return response()->json($list);
    }

    public function setcity(Request $request){
        $list = City::where('provCode',$request->provCode)->get()->sortBy('citymunDesc');
        return response()->json($list);
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
        if(!auth()->user()){
            return redirect('/login');
        }
        if(Auth::user()->user_level != 'ADMIN'){
            return redirect('/');
        }
        return view('pages.users');
    }
    public function maintenance(){
        if(!auth()->user()){
            return redirect('/login');
        }
        if(Auth::user()->user_level != 'ADMIN'){
            return redirect('/');
        }        
        return view('pages.maintenance');
    }

    public function index_data(){
        $list = UserLogs::selectRaw('users.id AS user_id, users.name AS username, users.email AS email, 
        users.user_level AS role, user_logs.activity AS activity, user_logs.created_at AS date, 
        DATE_FORMAT(user_logs.created_at, "%b. %d, %Y, %h:%i %p") AS datetime')
            ->join('users', 'users.id', '=', 'user_id')
            ->orderBy('user_logs.id', 'DESC')
            ->get();

        return DataTables::of($list)->make(true);
    }
}
