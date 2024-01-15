<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tr;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use Imagick;

class TemplateController extends Controller
{
    // Google Chart
    public function google_chart_blade(){
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
        return $formattedData;
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
            $employee->middle_name = !empty($row[1]) ? $row[1] : '';
            $employee->last_name   = $row[2];
            $employee->gender      = $row[3];
            $employee->save();
        }
        return redirect()->to('/import_blade?import=success');
    }

    // Export to Excel
    public function export_blade(){
        return view('templates.export');
    }

    public function export_data(){
        return DataTables::of(Tr::all())->make(true);
    }

    // crop image with recrop
    public function image_crop_blade(){
        return view('templates.image_crop');
    }

    // count pdf uploaded files
    public function pdf_count_blade(){
        return view('templates.pdf_count');
    }

    public function pdf_count_save(Request $request){
        $pdf_file = $request->file('pdf_file');
        if($pdf_file && $pdf_file->getClientOriginalExtension() === 'pdf'){
            $imagick = new Imagick();
            $imagick->readImage($pdf_file->getPathname());
            $numPages = $imagick->getNumberImages();
            return $numPages;
            $imagick->destroy();
        }
        else{
            return 'Invalid File Format';
        }
    }
}
