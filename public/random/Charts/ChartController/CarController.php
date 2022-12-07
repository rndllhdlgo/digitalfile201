<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use DB;

class CarController extends Controller
{
    public function carsView(){
        return view('charts.car');
    }
    public function carsSave(Request $request){
        $car = new Car;
        $car->car_name = $request->car_name;
        $car->save();
    }
    public function carsFetch(){
        $car_data = Car::select(DB::raw('COUNT(*) as total_cars, car_name'))
        ->groupBy('car_name')->get();

        // $car_data = Car::select(DB::raw('COUNT(*) as total_cars, car_name'))
        // ->groupBy('car_name')->get();

        foreach($car_data->toArray() as $row){
            $output_data[] = array(
                'car_name' => $row['car_name'],
                'total_cars' => $row['total_cars']
            );
        }
        echo json_encode($output_data);
    }
}
