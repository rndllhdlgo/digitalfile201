<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailButton extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $ips;

    public function __construct($ips)
    {
        $this->ips = $ips;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.emailButton')->subject('EMAIL WITH BUTTON');
    }
}

// class EmailButton extends Mailable
// {
//     use Queueable, SerializesModels;

//     /**
//      * Create a new message instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         //
//     }

//     /**
//      * Build the message.
//      *
//      * @return $this
//      */
//     public function build()
//     {
//         $actionUrl = 'https://repository.apsoft.com.ph/';

//         return $this->view('emails.emailButton', compact('actionUrl'))
//                     ->subject('EMAIL WITH BUTTON');
//     }
// }
