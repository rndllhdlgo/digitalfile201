<?php

namespace App\Http\Controllers;

use Auth;
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
        return view('pages.employees');
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
