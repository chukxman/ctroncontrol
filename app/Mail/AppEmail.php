<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     protected $details;
     protected $filePath;
     public $subject;

    public function __construct($details, $filePath=null, $subject)
    {
        $this->details = $details;
        $this->filePath = $filePath;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('user.email')
        ->subject($this->subject)
        ->with('details', $this->details)
        ->from('ctronreport@gmail.com');
        if ($this->filePath) {
            $this->attach($this->filePath);
        }
    }
}
