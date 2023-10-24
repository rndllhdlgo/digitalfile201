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
use App\Models\Tr;
use Auth;
use Mail;
use DataTables;
use Carbon\Carbon;

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
        $active = WorkInformationTable::whereNotIn('employment_status',['RESIGNED','TERMINATED','RETIRED'])->count();
        $inactive = WorkInformationTable::whereIn('employment_status',['RESIGNED','TERMINATED','RETIRED'])->count();
        $regular = WorkInformationTable::where('employment_status','Regular')->count();
        $probationary = WorkInformationTable::where('employment_status','Probationary')->count();
        $part_time = WorkInformationTable::where('employment_status','Part Time')->count();
        $agency = WorkInformationTable::where('employment_status','Agency')->count();
        $male = PersonalInformationTable::where('gender','Male')->count();
        $female = PersonalInformationTable::where('gender','Female')->count();
        // $male = PersonalInformationTable::join('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
        //     ->where('personal_information_tables.gender', 'Male')
        //     ->whereNotIn('work_information_tables.employment_status', ['RESIGNED','TERMINATED','RETIRED'])
        //     ->count();
        // $female = PersonalInformationTable::join('work_information_tables','work_information_tables.employee_id','personal_information_tables.id')
        //     ->where('personal_information_tables.gender', 'Female')
        //     ->whereNotIn('work_information_tables.employment_status', ['RESIGNED','TERMINATED','RETIRED'])
        //     ->count();
        $intern = WorkInformationTable::where('employment_status','Intern')->count();
        $user_level = User::query()->select('user_level')->distinct()->get()->sortBy('user_level');
        return view('pages.index', compact('active','inactive','regular','probationary','part_time','agency','intern','user_level','male','female'));
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

    // public function index_data(){
    //     $list = UserLogs::selectRaw('user_logs.id,
    //                                  users.id AS user_id,
    //                                  users.name AS username,
    //                                  users.email AS email,
    //                                  users.user_level AS role,
    //                                  user_logs.activity AS activity,
    //                                  user_logs.created_at AS date,
    //                                  DATE_FORMAT(user_logs.created_at, "%b. %d, %Y, %h:%i %p") AS datetime')
    //         ->join('users', 'users.id', '=', 'user_id')
    //         ->orderBy('user_logs.id', 'DESC')
    //         ->get();
    //     return DataTables::of($list)->make(true);
    // }

    public function index_data(Request $request){
        $list = UserLogs::query()
            ->selectRaw('username, role, activity, user_logs.created_at AS date, DATE_FORMAT(user_logs.created_at, "%b. %d, %Y, %h:%i %p") AS datetime')
            ->where('username', '!=', '')
            ->orderBy('user_logs.id', 'DESC')
            ->get();
        return DataTables::of($list)->make(true);
    }
}