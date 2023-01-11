<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Models\UserLogs;
use App\User;
use DataTables;

class UsersController extends Controller
{
    public function listOfUsers(){
        $users = User::all();
        return DataTables::of($users)->make(true);
    }

    // public function saveUser(Request $request){
        
    //     //check email duplication
    //     if(User::where('email',$request->email)->count() > 0){
    //         return response('duplicate');
    //     }
    //     $users = new User;
    //     $users->user_level = $request->user_level;
    //     $users->name = ucwords($request->name);
    //     $users->email = $request->email;
    //     $users->status = $request->status;
    //     $users->password = Hash::make($request->password);
    //     $sql = $users->save();//To save data

    //     return $sql ? 'true' : 'false';
    // }

    public function updateUser(Request $request){
        
        $users = User::find($request->id);
        $users->user_level = $request->user_level;
        $users->name = ucwords($request->name);
        $users->email = $request->email;
        $sql = $users->save();

        return $sql ? 'true':'false';
    }

    public function saveUser(Request $request){
        $char = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $charLength = strlen($char) - 1;
        for($i = 0; $i < 8; $i++){
            $n = rand(0, $charLength);
            $pass[] = $char[$n];
        }
        $password = implode($pass);

        $name = ucwords($request->name);

        $users = new User;
        $users->name = $name;
        $users->email = strtolower($request->email);
        $users->password = Hash::make($password);
        $users->user_level = $request->user_level;
        $users->status = 'ACTIVE';
        $sql = $users->save();
        $id = $users->id;

        if(!$sql){
            $result = 'false';
        }
        else{
            $result = 'true';

            Password::broker()->sendResetLink(['email'=>strtolower($request->email)]);

            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "USER ADDED: User successfully saved details of $name with UserID#$id.";
            $userlogs->save();
        }

        return response($result);
    }
    
    public function change_validate(Request $request){
        if(Hash::check($request->current, auth()->user()->password)){
            $result = 'true';
        }
        else{
            $result = 'false';
        }

        return response($result);
    }

    public function change_password(Request $request){
        do{
            $users = User::find(auth()->user()->id);
            $users->password = Hash::make($request->new);
            $sql = $users->save();
        }
        while(!$sql);

        if(!$sql){
            $result = 'false';
        }
        else{
            $result = 'true';

            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            $userlogs->activity = "CHANGE PASSWORD: User successfully changed own account password.";
            $userlogs->save();
        }

        return response($result);
    }
    
}
