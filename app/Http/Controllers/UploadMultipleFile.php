<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MultipleFile;

class UploadMultipleFile extends Controller
{
    public function uploadMultipleFile(){
        return view('uploadMultipleFile');
    }

    public function saveuploadMultipleFile(Request $request){
        if($request->hasFile('memo_file')){
            foreach($request->file('memo_file') as $memoFile){
                $memoFileName = time().'_Memo_File.'.$memoFile->extension();
                $memoFile->storeAs('public/multipleUploadFile',$memoFileName);
                
                $memo = new Multiplefile;
                $memo->memo_file = $memoFileName;
                $memo->save();
            }
        }
    }
}
