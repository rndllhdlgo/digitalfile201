<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tr;
use App\Models\UserLogs;
use App\Models\Hmo;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use Imagick;
use Spatie\PdfToText\Pdf;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Spatie\PdfToImage\Pdf as Jpg;

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

    // Pdf text extractor
    public function pdf_extract_blade(){
        return view('templates.pdf');
    }

    public function pdf_extract_text(Request $request){
        $file = $request->file('pdf_file');
        if($file->getClientOriginalExtension() === 'pdf'){
            $pdfPath = $file->getPathname();
            $text = Pdf::getText($pdfPath);
        }
        else{
            return redirect()->back()->with('error', 'Invalid file format. Please upload a PDF or an image.');
        }

        if(stripos($text, 'grace') !== false){
            return 'meron';
        }

        return view('templates.extracted', compact('text'));
    }

    // Split multiple pages PDF
    public function pdf_split_blade(){
        return view('templates.pdf_split');
    }

    public function pdf_split_save(Request $request){
        $pdfFile = $request->file('pdf_file');
        $filename = uniqid('pdf_') . '.' . $pdfFile->getClientOriginalExtension();
        $pdfFile->storeAs('public', $filename);
        $pdfPath = storage_path('app/public/' . $filename);
        $outputPath = storage_path('app/public/split_pages/');

        if(!file_exists($outputPath)){
            mkdir($outputPath, 0777, true);
        }

        $imagick = new Imagick();
        $imagick->readImage($pdfPath);

        foreach($imagick as $key => $pdfPage){
            $pdfPage->setImageFormat('png');
            $pdfPage->writeImage($outputPath . 'page_' . ($key + 1) . '.png');
        }

        $imagick->clear();
        $imagick->destroy();

        return 'PDF pages split and saved as images.';
    }

    // rowspan
    public function rowspan_blade(){
        return view('templates.rowspan');
    }

    public function rowspan_save(Request $request){
        $employee = new Hmo;
        $employee->employee_id      = $request->employee_id;
        $employee->hmo              = $request->hmo;
        $employee->coverage         = $request->coverage;
        $employee->particulars      = $request->particulars;
        $employee->room             = $request->room;
        $employee->effectivity_date = $request->effectivity_date;
        $employee->expiration_date  = $request->expiration_date;
        $save = $employee->save();

        if($save){
            return 'true';
        }
        else{
            return 'false';
        }
    }

    public function rowspan_data(Request $request){
        return DataTables::of(Hmo::where('employee_id', $request->id)->get())->make(true);
        // return DataTables::of(Hmo::select('*')->where('id', '>=', 5)->get()->makeHidden(['created_at', 'updated_at']))->make(true);
    }
}
