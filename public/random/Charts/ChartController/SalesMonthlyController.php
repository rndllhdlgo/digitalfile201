<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalesMonthly;
use DB;
class SalesMonthlyController extends Controller
{
    public function salesMonthlyBlade(){
        
        $fetch_year =  SalesMonthly::select("year")
        ->groupBy('year')
        ->orderBy('year', 'DESC')
        ->get();
        return view('charts.sales_monthly', compact('fetch_year', $fetch_year));
    }

    public function salesMonthlyData(Request $request){
        if($request->input('year')){
            $chart_data = $this->fetch_chart_data($request->input('year'));
            foreach($chart_data->toArray() as $row){
                $output[] = array(
                'month'  => $row['month'],
                'profit' => floatval($row['profit'])
                );
            }
            echo json_encode($output);
        }
    }

    function fetch_chart_data($year){
        $data =  SalesMonthly::select("id", "month", "year", "profit")
                ->orderBy('year', 'ASC')
                ->where('year', $year)
                ->get();
        return $data;
    }
    
}
