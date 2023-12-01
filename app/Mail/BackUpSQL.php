<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BackUpSQL extends Mailable
{
    use Queueable, SerializesModels;

    protected $filePaths;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $filePaths)
    {
        $this->filePaths = $filePaths;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Database Backups';

        $mail = $this->view('backupsql')->subject($subject);

        foreach($this->filePaths as $filePath){
            $mail->attach($filePath, [
                'as'   => basename($filePath),
                'mime' => 'application/sql',
            ]);
        }

        return $mail;
    }
}
