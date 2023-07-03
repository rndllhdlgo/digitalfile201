<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $content;
    public $file_path;

    /**
     * Create a new message instance.
     *
     * @param  string  $subject
     * @param  string  $content
     * @param  string  $file_path
     * @return void
     */
    public function __construct($subject, $content, $file_path)
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->file_path = $file_path;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $file_path_data = Storage::get($this->file_path);
        $file_path_filename = basename($this->file_path);
        $file_path_mime_type = Storage::mimeType($this->file_path);

        return $this->subject($this->subject)
            ->with('content', $this->content)
            ->attachData($file_path_data, $file_path_filename, ['mime' => $file_path_mime_type])
            ->view('try.email');
    }
}
