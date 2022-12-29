<?php

namespace App\Http\Controllers;

use DB;
use PDO;
use Illuminate\Http\Request;
use App\Models\PersonalInformationTable;


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
        $employees = PersonalInformationTable::count();
        return view('pages.index', compact('employees'));
    }

    public function ping(){
        // $start = microtime(true);
        // $conn = DB::connection();
        // $end = microtime(true) - $start;
        // $time = number_format($end * 100000, 3);
        // return $time;

        $start = microtime(true);
        // $conn = DB::connection();
        $conn = UserLogs::all();
        $end = microtime(true) - $start;
        $time = number_format($end, 3);
        return $time;
    }
}
