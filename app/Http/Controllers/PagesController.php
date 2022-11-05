<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\UserLogs;
use App\Models\Region;
use App\Models\City;
use App\Models\Province;
use App\Models\Company;
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
        $companies = Company::select('id','company')->get()->sortBy('company');
        return view('pages.employees', compact('regions','companies'));
    }

    public function setprovince(Request $request){
        $list = Province::where('regCode',$request->regCode)->get()->sortBy('provDesc');
        return response()->json($list);
    }

    public function setcity(Request $request){
        $list = City::where('provCode',$request->provCode)->get()->sortBy('citymunDesc');
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
        // return view('pages.maintenance');
        
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
