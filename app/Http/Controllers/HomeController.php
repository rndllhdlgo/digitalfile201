<?php

namespace App\Http\Controllers;

use DB;
use PDO;
use App\Models\UserLogs;
use App\Models\Ping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\PersonalInformationTable;
use App\Models\PersonalInformationTablePending;
use App\Models\WorkInformationTable;
use App\Models\Position;
use App\Models\EmployeeStatus;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use Auth;
use DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $employee_list = PersonalInformationTable::all();

        // foreach($employee_list as $key => $value){
        //     if(!User::where('emp_number',$value['empno'])->first()){
        //         $users = new User;
        //         $users->user_level = 'EMPLOYEE';
        //         $users->emp_number = $value['empno'];
        //         $users->name = $value['first_name'].' '. $value['last_name'];
        //         $users->email = $value['empno'];
        //         $users->status = 'ACTIVE';
        //         $users->password = Hash::make($value['empno']);
        //         $users->save();
        //     }

        // }

        // Role::create(['name' => 'ENCODER']);
        // This code creates a new role in a Laravel application with the name "ADMIN".
        // Permission::create(['name' => 'delete employee']);
        // This code creates a new permission in a Laravel application with the name "add employee".
        // auth()->user()->givePermissionTo('add employee');
        // This code grants the currently authenticated user in a Laravel application the permission to perform the action "add employee".
        // auth()->user()->assignRole('ADMIN');
        // This code assigns the "ADMIN" role to the currently authenticated user in a Laravel application.
        // auth()->user()->permissions;
        // This code is to display all the current user permissions have.
        // $permission = Permission::select()->where('id','3')->get();
        // $role = Role::findById(1);
        // $role->givePermissionTo($permission);
        // This code is to give permission based on ID in Role Table.

        // $success = Role::create(['name'=>'ADMIN']);
        // if($success){
        //     return 'save';
        // }
        // else{
        //     return 'not save';
        // }

        // auth()->user()->givePermissionTo('update employee');
        // return auth()->user()->getAllPermissions();
        // return User::role('ADMIN')->get();
        // return auth()->user()->revokePermissionTo('edit');
        // return User::permission('edit')->get();
        // if(auth()->user()->hasPermissionTo('edit')){ to check if current role hasPermission('value')
        //     return 'true';
        // }
        // else{
        //     return 'false';
        // }
        // auth()->user()->givePermissionTo('add employee');
        // auth()->user()->assignRole('ADMIN');
        // return auth()->user()->permissions;

        if(Auth::user()->user_level == 'EMPLOYEE'){
            return redirect('/employees');
        }

        $employees = WorkInformationTable::where('employee_company', '<>', '')->count();
        $regular = WorkInformationTable::where('employment_status','Regular')->count();
        $probationary = WorkInformationTable::where('employment_status','Probationary')->count();
        $part_time = WorkInformationTable::where('employment_status','Part Time')->count();
        $agency = WorkInformationTable::where('employment_status','Agency')->count();
        $intern = WorkInformationTable::where('employment_status','Intern')->count();
        $pending = PersonalInformationTablePending::where('status','Pending')->count();
        $user_level = User::query()->select('user_level')->distinct()->get()->sortBy('user_level');
        return view('pages.index', compact('employees','regular','probationary','part_time','agency','intern','pending','user_level'));
    }

    public function org()
    {
        $employees = PersonalInformationTable::selectraw('empno, CONCAT(first_name, " ", last_name) as fname, employee_supervisor')
                    ->join('work_information_tables', 'employee_id', 'personal_information_tables.id')
                    ->where('employee_supervisor', '!=', '')
                    ->get();
        return view('pages.org', compact('employees'));
    }

    public function index_reload_data(){
        if(UserLogs::count() == 0){
            return 'NULL';
        }
        $data_update = UserLogs::latest('updated_at')->first()->updated_at;
        return $data_update;
    }

    public function index_data(){
        $list = UserLogs::selectRaw('user_logs.id,
                                     users.id AS user_id, 
                                     users.name AS username, 
                                     users.email AS email, 
                                     users.user_level AS role, 
                                     user_logs.activity AS activity, 
                                     user_logs.created_at AS date, 
                                     DATE_FORMAT(user_logs.created_at, "%b. %d, %Y, %h:%i %p") AS datetime')
            ->join('users', 'users.id', '=', 'user_id')
            ->orderBy('user_logs.id', 'DESC')
            ->get();

        return DataTables::of($list)->make(true);
    }
}