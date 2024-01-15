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
}
