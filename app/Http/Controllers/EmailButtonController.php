<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\EmailButton;
use App\Models\IpAddress;
use Illuminate\Support\Facades\Mail;

class EmailButtonController extends Controller
{
    public function EmailButton(){
        $ips = IpAddress::whereNotNull('hrms')->take(5)->get();
        return view('emails.emailButton', compact('ips'));
        try{
            Mail::to('rendellhidalgo11@gmail.com')->send(new EmailButton($ips));
            return 'email sent';
        }
        catch(\Throwable $th){
            $errorMessage = $th->getMessage();
            return $errorMessage;
        }
    }
}