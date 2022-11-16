<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checkbox;

class CheckboxRadioController extends Controller
{
    public function checkbox(){
        return view('checkbox');
    }
    public function insertcheckbox(Request $request){
        $fruit = new Checkbox;
        $fruit->fruits = json_encode($request->fruit);
        $fruit->save();
    }
}
