<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class SendMailController extends Controller
{
    public function email(){
        return view('try.test_mail');
    }

    public function sendEmail(Request $request){
        $details = [
            'email' => 'hidalgorendell20@gmail.com',
            'content' => $request->input('content')
        ];

        Mail::to($details['email'])->send(new SendMail($details['content']));

        return "Email sent successfully!";
    }
}
