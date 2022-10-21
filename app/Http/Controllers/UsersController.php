<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use DataTables;

class UsersController extends Controller
{
    public function listOfUsers(){
        $users = User::all();
        return DataTables::of($users)->make(true);
    }

    public function saveUser(Request $request){
        
        //check email duplication
        if(User::where('email',$request->email)->count() > 0){
            return response('duplicate');
        }
        $users = new User;
        $users->user_level = $request->user_level;
        $users->name = ucwords($request->name);
        $users->email = $request->email;
        $users->status = $request->status;
        $users->password = Hash::make($request->password);
        $sql = $users->save();//To save data

        return $sql ? 'true' : 'false';
    }

    public function updateUser(Request $request){
        
        $users = User::find($request->id);
        $users->user_level = $request->user_level;
        $users->name = ucwords($request->name);
        $users->email = $request->email;
        $users->status = $request->status;
        $sql = $users->save();

        return $sql ? 'true':'false';
    }
    
}
