<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MultipleFile;

class UploadMultipleFileController extends Controller
{
    public function uploadMultipleFile(){
        return view('uploadMultipleFile');
    }

    public function saveuploadMultipleFile(Request $request){
        if($request->hasFile('memo_file')){
            foreach($request->file('memo_file') as $key => $value){
                $memoFileName = time().'_Memo_File.'.$request->memo_file[$key]->extension();
                $request->memo_file[$key]->storeAs('public/multipleUploadFile',$memoFileName);
                
                $memo = new Multiplefile;
                $memo->memo_subject = $request->memo_subject[$key];
                $memo->memo_date = $request->memo_date[$key];
                $memo->memo_penalty = $request->memo_penalty[$key];
                $memo->memo_file = $memoFileName;
                $memo->save();
            }
        }
    }
}
