<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donut;
use DB;

class DonutController extends Controller
{
    public function donutView(){
        return view('charts.donut');
    }

    public function saveData(Request $request){
        $data_name = new Donut;
        $data_name->name = $request->name;
        $save = $data_name->save();

        if($save){
            return 'true';
        }
        else{
            return 'false';
        }
    }
    
    public function fetchData(){
        $data = Donut::select(DB::raw('COUNT(*) as total_sales, name'))
        ->groupBy('name')->get();
        
        foreach($data->toArray() as $row){
            $output[] = array(
                'name' => $row['name'],
                'total_sales' => $row['total_sales']
            );
        }
        echo json_encode($output);
    }
}
