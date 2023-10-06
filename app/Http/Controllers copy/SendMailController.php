<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class SendMailController extends Controller
{
    public function email()
    {
        return view('try.test_mail');
    }

    public function sendEmail(Request $request)
    {
        $file = $request->file('file_path');
        $customFileName = $request->input('filename');
        $extension = $file->getClientOriginalExtension();
        $file_path = $file->storeAs('public/file_path', $customFileName.'.'.$extension);

        $details = [
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'content' => $request->input('content'),
            'file_path' => $file_path,
        ];

        Mail::to($details['email'])
            ->send(new SendMail(
                $details['subject'],
                $details['content'],
                $details['file_path']
            ));

        return "Email sent successfully!";
    }
}
