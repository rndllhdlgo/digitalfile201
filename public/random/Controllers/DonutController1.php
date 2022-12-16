<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donut;
class DonutController extends Controller
{
    // public function monthlySalesView(){
    //     return view('charts.monthly_sales');
    // }
    
    public function donutImageView(){
        return view('uploadPicture');
    }

    public function insertDonutImage(Request $request){//This function is to save the image
        $donutImage = new Donut;
        if($request->hasFile('file')){
            $filenameWithExt = $request->file('file')->getClientOriginalName();//Get filename with the extension
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);//Get Just filename
            $extension = $request->file('file')->getClientOriginalExtension();//Get just extension
            $fileNameToStore = time().'_'.'donut_images'.'.'.$extension;// Filename to store
            $path = $request->file('file')->storeAs('public/donut_images',$fileNameToStore);//To create folder for images under public folder
            $donutImage->donut_image = $fileNameToStore;
        }
        $donutImage->save();
    }
}
