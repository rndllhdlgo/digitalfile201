<?php

namespace App\Http\Controllers;

use Auth;
use App\Region;
use App\City;
use App\Province;
use App\Company;
use Illuminate\Http\Request;

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
        return view('pages.employees', compact('regions'));
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
    
}
