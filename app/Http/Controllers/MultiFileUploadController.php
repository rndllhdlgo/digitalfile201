<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FileUp;

class MultiFileUploadController extends Controller
{
    public function filesUpload(Request $request){
     
        $files = [];
        $first_name = [];
        
        if($request->first_name && $request->hasFile('filenames')){
            
            foreach($request->file('filenames') as $file){    
                $file->first_name = $request->first_name;
                $name = time().rand(1,100).'.'.$file->extension();
                $file->storeAs('public/files',$name);
                $files[] = $name;
            }
        }
        $file = new FileUp();
        $file->filenames = $files;
        $file->first_name = $first_name;
        $file->save();
    }
}
