<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DonutSales;
use DB;
class DonutSalesController extends Controller
{
    public function donutSalesBlade(){
        
        $year_list =  DonutSales::select("year")
                    ->groupBy('year')
                    ->orderBy('year', 'DESC')
                    ->get();
        return view('charts.donut_sales', compact('year_list', $year_list));
    }

    public function fetch_data(Request $request){
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
        $data =  DonutSales::select("id", "month", "year", "profit")
                ->orderBy('year', 'ASC')
                ->where('year', $year)
                ->get();
        return $data;
    }

}
