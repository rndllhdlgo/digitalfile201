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

        if(User::where('email',$request->email)->count() > 0){
            return response('duplicate_email');
        }

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
            $userlogs->activity = "USER ADDED: User successfully added a new user with the following details NAME:[$name] USER LEVEL: [$users->user_level].";
            $userlogs->save();
        }

        return response($result);
    }

    public function updateUser(Request $request){
        $user_level_orig = $request->user_level_orig;
        $name_orig = $request->name_orig;
        $email_orig = $request->email_orig;
        
        $users = User::find($request->id);
        $users->user_level = $request->user_level_new;
        $users->name = ucwords($request->name_new);
        $users->email = $request->email_new;
        $sql = $users->save();

        if($sql){
            if($user_level_orig != $request->user_level_new){
                $users_level_change = "User Level FROM: [$user_level_orig] TO: [$users->user_level]";
            }
            else{
                $users_level_change = NULL;
            }
            if($name_orig != $request->name_new){
                $name_change = "Name FROM: [$name_orig] TO: [$users->name]";
            }
            else{
                $name_change = NULL;
            }
            if($email_orig != $request->email_new){
                $email_change = "Email Address FROM: [$email_orig] TO: [$users->email]";
            }
            else{
                $email_change = NULL;
            }

            if($user_level_orig != $request->user_level_new || $name_orig != $request->name_new || $email_orig != $request->email_new){

                $userlogs = new UserLogs;
                $userlogs->user_id = auth()->user()->id;
                $userlogs->activity = "USER UPDATED: User successfully updated details of [$users->name] with the following CHANGES: $email_change $name_change $users_level_change.";
                $userlogs->save();
            
                return $sql ? 'true':'false';
            }
        }
            
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

    public function users_status(Request $request){
        if($request->status == 'ACTIVE'){
            $status1 = 'ACTIVE';
            $status2 = 'INACTIVE';
        }
        else{
            $status1 = 'INACTIVE';
            $status2 = 'ACTIVE';
        }
        $name = ucwords($request->name);

        $users = User::find($request->id);
        $users->status = $request->status;
        $sql = $users->save();

        if(!$sql){
            $result = 'false';
        }
        else{
            $result = 'true';

            $status = "FROM: [$status2] TO [$status1]";

            $userlogs = new UserLogs;
            $userlogs->user_id = auth()->user()->id;
            // $userlogs->activity = "USER UPDATED: User successfully updated details of $name with UserID#$request->id with the following CHANGES: $status.";
            $userlogs->activity = "USER UPDATED: User successfully updated status of [$name] $status.";
            $userlogs->save();
        }
        return response($result);
    }
}
