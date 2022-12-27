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
        $start = microtime(true);
        $conn = DB::connection();
        $end = microtime(true) - $start;
        $time = substr($end, 0, -13);
        return $time;
    }
}
