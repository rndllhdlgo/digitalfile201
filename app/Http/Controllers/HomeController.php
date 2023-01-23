<?php

namespace App\Http\Controllers;

use DB;
use PDO;
use App\Models\UserLogs;
use App\Models\Ping;
use Illuminate\Http\Request;
use App\Models\PersonalInformationTable;
use App\Models\WorkInformationTable;


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
        $employees = WorkInformationTable::where('employee_company', '<>', '')->count();
        $regular = WorkInformationTable::where('employment_status','Regular')->count();
        $probationary = WorkInformationTable::where('employment_status','Probationary')->count();
        $part_time = WorkInformationTable::where('employment_status','Part Time')->count();
        $agency = WorkInformationTable::where('employment_status','Agency')->count();
        $intern = WorkInformationTable::where('employment_status','Intern')->count();
        return view('pages.index', compact('employees','regular','probationary','part_time','agency','intern'));
    }

    public function org()
    {
        $employees = PersonalInformationTable::selectraw('empno, CONCAT(first_name, " ", last_name) as fname, employee_supervisor')
                    ->join('work_information_tables', 'employee_id', 'personal_information_tables.id')
                    ->where('employee_supervisor', '!=', '')
                    ->get();
        return view('pages.org', compact('employees'));
    }

    public function ping(){
        // $start = microtime(true);
        // $conn = DB::connection();
        // $end = microtime(true) - $start;
        // $time = number_format($end * 100000, 3);
        // return $time;

        $start = microtime(true);
        // $conn = DB::connection();
        $conn = Ping::limit(50000)->get();
        $end = microtime(true) - $start;
        $time = number_format($end, 3);
        return $time;
    }
}
