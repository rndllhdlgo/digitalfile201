<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;

class QrController extends Controller
{
    //

    public function qr(){
        return view('try.qr');
    }

    public function qrshow(Request $request) {
        // $url = 'https://youtube.com'; // Replace with your desired URL
        return QrCode::size(200)->generate($request->content);
    }

    public function qrsshow(Request $request){
        $data = QrCode::size(200)
            ->format('png')
            ->merge('/public/storage/dashboard_icons/active.png')
            ->errorCorrection('M')
            ->generate($request->content);

        return response($data)->header('Content-type', 'image/png');
    }
}
