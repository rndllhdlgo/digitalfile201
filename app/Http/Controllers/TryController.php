<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

use App\Models\MultipleSave;
use App\Models\Tr;
use App\Models\Company;
use App\Imports\TestImport;
use App\Models\Import;
use App\Models\Export;
use App\Models\Report;
use App\Models\Status;
use App\Models\PdfToImage;
use App\Models\PersonalInformationTable;
use Carbon\Carbon;
use Spatie\PdfToText\Pdf;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Spatie\PdfToImage\Pdf as Jpg;
use Imagick;
use DataTables;
use Str;

class TryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function evaluation_blade(){
        $tries = Tr::select('id','sample_name')->get();
        return view('try.evaluation', compact('tries'));
    }

    public function evaluation_save(Request $request){
        if($request->memo_subject && $request->memo_date && $request->memo_penalty && $request->hasFile('memo_file')){
            foreach($request->file('memo_file') as $key => $value){
                $memoFileName = time().rand(1,100).'_Memo_File.'.$request->memo_file[$key]->extension();
                $request->memo_file[$key]->storeAs('public/multiple_files',$memoFileName);

                $memo = new MultipleSave;

                $memo->memo_subject = $request->memo_subject[$key];
                $memo->memo_date = $request->memo_date[$key];
                $memo->memo_penalty = $request->memo_penalty[$key];
                $memo->memo_file = $memoFileName;
                $memo->save();
            }
        }
    }

    public function chosen_blade(){
        $companies = Company::select('id','company_name')->get();

        return view('try.chosen' ,compact('companies'));
    }

    public function chosen_save(Request $request){
        $sample_company = new Tr;
        $sample_company->sample_company = implode(",",$request->sample_company);
        $sample_company->save();
        return 'true';
    }

    public function import_blade(){
        return view('try.import');
    }

    public function test_import(Request $request){
        $file = $request->file('xlsx');
        $import = new Import;
        $data = Excel::toArray($import, $file);
        if(count($data[0]) == 0){
            return redirect()->to('/import?import=failed');
        }

        foreach ($data[0] as $row) {
            if($row[0] != 'FIRST_NAME' && $row[1] != 'MIDDLE_NAME' && $row[2] != 'LAST_NAME'){
                $employee = new Import;
                $employee->test_fname = $row[0];
                $employee->test_mname = $row[1];
                $employee->test_lname = $row[2];
                $employee->save();
            }
        }
        return redirect()->to('/import?import=success');
    }

    public function passwordValidation_blade(){
        return view('try.passwordValidation');
    }

    public function tabPane_blade(){
        return view('try.tabPane');
    }

    public function spatie_blade(){
        return view('try.spatie');
    }

    public function export_blade(){
        return view('try.export');
    }

    public function export_data()
    {
        return DataTables::of(Export::all())->make(true);
    }

    public function cropImage_blade(){
        return view('try.cropImage');
    }

    public function cropImage_save(Request $request){
        $imageData = $request->input('employee_image');
        $imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);
        $imageName = 'cropped_image_' . time() . '.jpeg';

        Storage::disk('public')->put($imageName, base64_decode($imageData));

        return response()->json($imageName);
    }

    public function reports(){
        return view('try.reports');
    }

    public function reports_data(Request $request){
        $selectedMonth = $request->selectedMonth;
        $selectedYear = $request->selectedYear;
        $selectedDate = Carbon::createFromDate($selectedYear, $selectedMonth)->format('Y-m');
        $data = Report::where('date', 'like', $selectedDate.'%')->get();
        return DataTables::of($data)->make(true);
    }

    public function status(){
        return view('try.status');
    }

    public function status_data(Request $request){
        return DataTables::of(Status::all())->make(true);
    }

    public function chart_blade(){
        return view('try.chart');
    }

    public function getDataForChart(){
        $data = Tr::select('gender')
            ->groupBy('gender')
            ->selectRaw('gender, COUNT(*) as count')
            ->get()
            ->toArray();

        $formattedData = [['Gender', 'Count']];

        foreach ($data as $item) {
            $formattedData[] = [$item['gender'], $item['count']];
        }

        return response()->json($formattedData);
    }

    public function pdf_blade(){
        return view('try.pdfImage');
    }

    public function save_pdf(Request $request){
        $pdf_file = $request->file('pdf_file');

        // Check if a file was uploaded
        if($pdf_file && $pdf_file->getClientOriginalExtension() === 'pdf'){
            // Create a new Imagick instance
            $imagick = new Imagick();
            // Read the PDF file
            $imagick->readImage($pdf_file->getPathname());
            // Convert each page of the PDF to an image
            $imagick->setImageFormat('png');

            // foreach ($imagick as $page) {
            //     // Save each page as a separate image
            //     $page->writeImage(storage_path('app/public/' . uniqid() . '.png'));
            // }

            foreach($imagick as $page){
                // Save each page as a separate image
                $imagePath = storage_path('app/public/' . Str::random(4) . '.png');
                $page->writeImage($imagePath);
                // Remove the base storage path from the image file path
                $imagePath = str_replace(storage_path('app/public/'), '', $imagePath);
                // Save the image details to the database
                $pdfToImage = new PdfToImage();
                $pdfToImage->pdf_file = $imagePath;
                $pdfToImage->save();
            }

            // Destroy the Imagick instance
            $imagick->destroy();

            return 'success';
        }
        else{
            return 'Invalid File Format';
        }
    }
}
