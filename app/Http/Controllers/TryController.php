<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

use App\Models\MultipleSave;
use App\Models\Tr;
use App\Models\Example;
use App\Models\Company;
use App\Imports\TestImport;
use App\Models\Import;
use App\Models\Export;
use App\Models\Report;
use App\Models\Status;
use App\Models\Receipt;
use App\Models\PdfToImage;
use App\Models\PersonalInformationTable;
use Carbon\Carbon;
use Spatie\PdfToText\Pdf;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Spatie\PdfToImage\Pdf as Jpg;
use Dompdf\Dompdf;
use Imagick;
use DataTables;
use Str;
use Illuminate\Support\Facades\Mail;
use Swift_Attachment;
use Swift_Message;

class TryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function querySample(){
        // 1 $query = Example::find(1);
        // 2 try{
        //     $query = Example::findOrFail(3);
        //     // Do something with the $user record
        //     return $query;
        // }
        // catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
        //     // Handle the exception (user not found)
        //     // For example, return an error response or redirect
        //     return response('error');
        // }
        // 3 $query = Example::select('fullname')->get();
        // 4 $query = Example::where('fullname', '=','Mario')->get();
        $query = Example::select('fullname','age')->where('fullname', '=','Mario')->where('age', 18)->get();
        return $query;
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
        if($pdf_file && $pdf_file->getClientOriginalExtension() === 'pdf'){
            $imagick = new Imagick();
            $imagick->readImage($pdf_file->getPathname());
            $imagick->setImageFormat('png');
            $imagick->destroy();

            return 'success';
        }
        else{
            return 'Invalid File Format';
        }
    }

    public function imageToPdf(Request $request)
    {
        // Get the uploaded image file
        $imageFile = $request->file('fileInput');

        // Create a unique filename for the PDF
        $pdfFilename = time() . '_' . $imageFile->getClientOriginalName() . '.pdf';

        // Move the uploaded image to a temporary location
        $imagePath = $imageFile->storeAs('temp', $imageFile->getClientOriginalName());

        // Initialize Dompdf
        $dompdf = new Dompdf();

        // Load HTML or image file
        $dompdf->loadHtml('<img src="' . $imagePath . '">');

        // (Optional) Set PDF options
        $dompdf->setPaper('A4', 'portrait');

        // Render the PDF
        $dompdf->render();

        // Save the generated PDF to a temporary location
        $pdfPath = storage_path('app/temp/' . $pdfFilename);
        file_put_contents($pdfPath, $dompdf->output());

        // Remove the temporary image file
        unlink(storage_path('app/' . $imagePath));

       // Return the PDF file path
        return response()->json([
            'pdf_path' => $pdfPath,
        ]);
    }

    // public function splitPdf(Request $request){
    //     $pdfFile = $request->file('pdf_file');
    //     // Generate a unique filename for the uploaded PDF
    //     $filename = uniqid('pdf_') . '.' . $pdfFile->getClientOriginalExtension();
    //     // Store the uploaded PDF in the storage/app/public directory
    //     $pdfFile->storeAs('public', $filename);
    //     // Construct the full path to the uploaded PDF file
    //     $pdfPath = storage_path('app/public/' . $filename);
    //     // Set the output directory path for the split pages
    //     $outputPath = storage_path('app/public/split_pages/');

    //     if(!file_exists($outputPath)){
    //         mkdir($outputPath, 0777, true);
    //     }

    //     $imagick = new Imagick();
    //     $imagick->readImage($pdfPath);

    //     foreach ($imagick as $key => $pdfPage) {
    //         $pdfPage->setImageFormat('png');
    //         $pdfPage->writeImage($outputPath . 'page_' . ($key + 1) . '.png');
    //     }

    //     $imagick->clear();
    //     $imagick->destroy();

    //     return 'PDF pages split and saved as images.';
    // }

    // public function save_pdf(Request $request){
    //     $pdf_file = $request->file('pdf_file');

    //     // Check if a file was uploaded
    //     if($pdf_file && $pdf_file->getClientOriginalExtension() === 'pdf'){
    //         // Create a new Imagick instance
    //         $imagick = new Imagick();
    //         // Read the PDF file
    //         $imagick->readImage($pdf_file->getPathname());
    //         // Convert each page of the PDF to an image
    //         // Count the number of pages of the PDF
    //         // $numPages = $imagick->getNumberImages();
    //         // return $numPages;

    //         $imagick->setImageFormat('png');

    //         // foreach ($imagick as $page) {
    //         //     // Save each page as a separate image
    //         //     $page->writeImage(storage_path('app/public/' . uniqid() . '.png'));
    //         // }

    //         foreach($imagick as $page){
    //             // Save each page as a separate image
    //             $imagePath = storage_path('app/public/' . Str::random(4) . '.png');
    //             $page->writeImage($imagePath);
    //             // Remove the base storage path from the image file path
    //             $imagePath = str_replace(storage_path('app/public/'), '', $imagePath);
    //             // Save the image details to the database
    //             $pdfToImage = new PdfToImage();
    //             $pdfToImage->pdf_file = $imagePath;
    //             $pdfToImage->save();
    //         }

    //         // Destroy the Imagick instance
    //         $imagick->destroy();

    //         return 'success';
    //     }
    //     else{
    //         return 'Invalid File Format';
    //     }
    // }

    public function receipt(){
        // $gender_array = Tr::where('gender', '=', 'MALE')
        //                     ->get()
        //                     ->toArray();

        // $gender_ids = array_map(function($item){
        //     return $item['id'];
        // }, $gender_array);
        // return $gender_ids;
        return view('try.receipt');
    }
    public function save_receipt(Request $request){
        if(Receipt::where('receipt', $request->receipt)->count() > 0) {
            return 'RECEIPT Already Exist';
        }

        $file = $request->file('pdf_file');
        if($file->getClientOriginalExtension() === 'pdf'){
            $imagick = new \Imagick(); // Create a new Imagick object
            $imagick->readImage($file->getPathname() . '[0]'); // Read the image file, using only the first page
            $imagick->setImageFormat('png'); // Set the output image format to JPEG
            $imagick->setImageType(\Imagick::IMGTYPE_GRAYSCALE);
            $imagick->despeckleImage();
            $imagick->unsharpMaskImage(0, 0.5, 1, 0);
            $imagick->contrastImage(1);
            $imagePath = storage_path("app/public/{$request->receipt}.png"); // Set the path for the output image
            $imagick->writeImage($imagePath); // Write the modified image to the specified path
            $text = str_replace(' ', '', (new TesseractOCR($imagePath))->run());
            // return $text;
            // $imagick->brightnessContrastImage(15, 15); // Adjust the brightness and contrast of the image
            // $imagick->setImageType(\Imagick::IMGTYPE_GRAYSCALE); // Convert the image to grayscale

            if(stripos($text, $request->receipt) === false){
                return 'Input Receipt No. does not match with the uploaded document.';
            }
            else{
                // $filename = $request->receipt.'.'.$fileExtension;
                // $file->storeAs('public/receipt',$filename);

                // Receipt::create([
                //     'receipt' => $request->receipt,
                //     'pdf_file' => $filename
                // ]);
                return 'success';
            }
        }
        else if (in_array(strtolower($file->getClientOriginalExtension()), ['jpg', 'jpeg', 'png', 'gif'])) {
            $x = 0;
            $imagick = new \Imagick();
            $imagick->readImage($file->getPathname() . '[0]');
            $imagick->unsharpMaskImage(0, 0.5, 1, 0.05);
            $imagePath = $file->getPathname();
            $imagick->writeImage($imagePath);
            $text = (new TesseractOCR($imagePath))->run();

            if(stripos(str_replace(' ', '', $text), $request->receipt) !== false){
                $x++;
            }

            $imagick = new \Imagick();
            $imagick->readImage($file->getPathname() . '[0]');
            $imagePath = $file->getPathname();
            $imagick->writeImage($imagePath);
            $text = (new TesseractOCR($imagePath))->run();
            // return str_replace(' ', '', $text);

            if(stripos(str_replace(' ', '', $text), $request->receipt) !== false){
                $x++;
            }

            if($x == 0){
                return str_replace(' ', '', $text);
                return 'Input Receipt No. does not match with the uploaded document.';
            }
            return 'success';
        }
        else{
            return 'Invalid file format';
        }
    }

    public function responsive(){
        return view('try.responsive');
    }

    public function dynamic(){
        return view('try.dynamicColumns');
    }

    public function dynamicColumns(){
        $tableColumns = ['first', 'second', 'third','fourth'];
        return $tableColumns;
    }

    public function exportTable(){
        return view('try.exportExcel');
    }

    public function print(){
        return view('try.print');
    }

    public function sql_save(){
        $name_array = ["RENDELL", "MENDEZ", "HIDALGO"];
        $sql_file = new Tr;
        $sql_file->fullname = implode(", ", $name_array);
        $sql_file->age = '18';
        $sql_file->save();

        if($sql_file){
            $data = Tr::all();
            $sql = '';
            foreach($data as $record){
                $sql .= "INSERT INTO `try` (`fullname`, `age`) VALUES ('$record->fullname', '$record->age');\n";
            }

            Storage::disk('public')->put('try.sql', $sql);
            $sqlFilePath = public_path('storage/try.sql');

            if($sqlFilePath){
                Mail::raw('See the attached SQL file.', function($message) use ($sqlFilePath){
                    $message
                        ->to('hidalgorendell20@gmail.com')
                        ->subject('SQL Export')
                        ->attach($sqlFilePath, ['as' => 'file_title',]);
                });
            }
            return 'SQL file created and data saved and sent via email.';
        }
        else{
            return 'FAILED';
        }
    }
}
