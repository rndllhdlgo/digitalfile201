<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Chart;
use App\Technology;
use App\Sale;
use App\NetProfit;

class ChartController extends Controller
{
   public function chartsView(){
        $result=DB::select("select count(name) as total_name, name from charts group by name");
        $chartData="";

        foreach($result as $list){
            $chartData.="['".$list->name."', ".$list->total_name."],";
        }
        $arr['chartData'] = rtrim($chartData,",");
        return view('charts.charts',$arr);
   }

    public function chartsSave(Request $request){
        $charts = new Chart;
        $charts->name = $request->name;
        $sql = $charts->save();

        if($sql){
            return 'true';
        }
        else{
            return 'false';
        }
    }

    // public function technologyView(){
    //     $technology = Technology::get();
    //     foreach($technology as $key => $value){
    //         $technologyData[] = [$value['device_name'], $value['quantity']];
    //     }
    //     return view('charts.technologies',compact('technologyData'));
    // }

    public function donutSalesView(){
        
        $fetch_year =  NetProfit::select("year")
        ->groupBy('year')
        ->orderBy('year', 'DESC')
        ->get();
        return view('charts.barchart', compact('fetch_year', $fetch_year));
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
        $data =  NetProfit::select("id", "month", "year", "profit")
                ->orderBy('year', 'ASC')
                ->where('year', $year)
                ->get();
        return $data;
    }

    // public function fetch_year(){
    //     $data = DB::table('net_profits')
    //     ->select(DB::raw('year'))
    //     ->groupBy('year')
    //     ->orderBy('year','DESC')
    //     ->get();
    //     return $data;
    // }

    // public function donutSalesFetch(Request $request){
    //     if($request->input('year')){
    //         $chart_data = $this->fetch_chart_data($request->input('year'));

    //         foreach($chart_data->toArray() as $row){
    //             $output[] = array(
    //                 'month' => $row->month,
    //                 'profit' => floatval($row->profit)
    //             );
    //         }
    //         echo json_encode($output);
    //     }
    // }

    // public function fetch_chart_data($year){
    //     $data = DB::table('net_profits')
    //     ->orderBy('year','ASC')
    //     ->where('year', $year)
    //     ->get();
    //     return $data;
    // }
}
