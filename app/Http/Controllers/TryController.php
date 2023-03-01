<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;

use App\Models\MultipleSave;
use App\Models\Tr;
use App\Models\Company;
use App\Imports\TestImport;
use App\Models\Import;
use App\Models\Export;
use DataTables;

class TryController extends Controller
{
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
}