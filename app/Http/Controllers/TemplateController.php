<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tr;

class TemplateController extends Controller
{
    // Google Chart
    public function google_chart(){
        return view('templates.google_chart');
    }

    public function google_chart_data(){
        $data = Tr::select('gender')
            ->groupBy('gender')
            ->selectRaw('gender, COUNT(*) as count')
            ->get();
        $formattedData = [['Gender', 'Count']];

        foreach($data as $item){
            $formattedData[] = [$item['gender'], $item['count']];
        }
        return response()->json($formattedData);
    }

    // Import Excel File
    public function import_blade(){
        return view('templates.import');
    }

    public function import_save(Request $request){
        $file = $request->file('xlsx');
        $import = new Tr;
        $data = Excel::toArray($import, $file);
        if(count($data[0]) == 0 || count($data) == 0){
            return redirect()->to('/import_blade?import=failed');
        }

        $rows = array_slice($data[0], 1);
        foreach($rows as $row){
            $employee = new Tr;
            $employee->first_name  = $row[0];
            $employee->last_name   = $row[1];
            $employee->middle_name = $row[2];
            $employee->gender      = $row[3];
            $employee->save();
        }
        return redirect()->to('/import_blade?import=success');
    }
}
