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
        $string = DB::connection()->getPdo()->getAttribute(PDO::ATTR_SERVER_INFO);
        $needle = 'Queries per second avg: ';
        return str_replace($needle, '', strstr($string, $needle, false));
    }
}
