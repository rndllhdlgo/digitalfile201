<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalesByMonth;

class SalesByMonthController extends Controller
{
    public function salesByMonthBlade(){
        $year_list =  SalesByMonth::select('year')
                    ->groupBy('year')
                    ->orderBy('year', 'DESC')
                    ->get();
        return view('donut.sales_by_month', compact('year_list', $year_list));
    }

    public function salesByMonthData(Request $request){
        if($request->input('year')){
            $chart_data = $this->fetch_chart_data($request->input('year'));
            foreach($chart_data->toArray() as $row){
                $sales_data[] = array(
                'month'  => $row['month'],
                'profit' => floatval($row['profit'])
                );
            }
            return json_encode($sales_data);
        }
    }

    function fetch_chart_data($year){
        $sales_by_month_data =  SalesByMonth::select("id", "month", "year", "profit")
                                ->orderBy('year', 'ASC')
                                ->where('year', $year)
                                ->get();
        return $sales_by_month_data;
    }
}
