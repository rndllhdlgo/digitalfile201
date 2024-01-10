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
    public function index(){
        try{
            $active       = WorkInformationTable::whereNotIn('employment_status',['RESIGNED','TERMINATED','RETIRED'])->count();
            $inactive     = WorkInformationTable::whereIn('employment_status',['RESIGNED','TERMINATED','RETIRED'])->count();
            $regular      = WorkInformationTable::where('employment_status','Regular')->count();
            $probationary = WorkInformationTable::where('employment_status','Probationary')->count();
            $part_time    = WorkInformationTable::where('employment_status','Part Time')->count();
            $agency       = WorkInformationTable::where('employment_status','Agency')->count();
            $male         = PersonalInformationTable::where('gender','Male')->count();
            $female       = PersonalInformationTable::where('gender','Female')->count();
            $intern       = WorkInformationTable::where('employment_status','Intern')->count();
            $user_level   = User::query()->select('user_level')->distinct()->get()->sortBy('user_level');
            return view('pages.index', compact('active','inactive','regular','probationary','part_time','agency','intern','user_level','male','female'));
        }
        catch(\Exception $th){
            $errorMessage = $th->getMessage();
            return view('errors.500', compact('errorMessage'));
        }
    }

    public function index_data(Request $request){
        $data = UserLogs::query()
            ->selectRaw('username, role, activity, user_logs.created_at AS date, DATE_FORMAT(user_logs.created_at, "%b. %d, %Y, %h:%i %p") AS datetime')
            ->where('username', '!=', '')
            ->orderBy('user_logs.id', 'DESC')
            ->get();
        return DataTables::of($data)->make(true);
    }
}