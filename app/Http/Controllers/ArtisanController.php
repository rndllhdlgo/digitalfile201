<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ArtisanController extends Controller
{
    public function artisan(){
        try{
            Artisan::call('inspire');
            $output = Artisan::output();
            return $output;
        }
        catch(\Exception $e){
            return "An error occurred: " . $e->getMessage();
        }
    }
}
