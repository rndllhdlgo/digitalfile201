<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MultipleUpload;

class MultipleFileUpload extends Controller
{
    public function multipleFileUpload(){
        return view('multipleFileUpload');
    }
    
    public function saveMultipleFileUpload(Request $request){
        if($request->hasFile('files')){
            foreach($request->file('files') as $file){
                    $name = time().rand(1,100).'.sample_file.'.$file->extension();
                    $file->storeAs('public/multipleFile',$name);
                    
                    $file_sample = new MultipleUpload;
                    $file_sample->file_name = $name;
                    $file_sample->save();
            }
        }
    }
}
