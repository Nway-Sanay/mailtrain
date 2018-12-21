<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        if ($this->content['attach_file']) {
            # code...
        $attach_path = public_path().'/storage/attach_files/'.$this->content['attach_file'];

        return $this->from('example@example.com',$this->content['sender_mail'])->attach($attach_path)->markdown('emails.testmail')->with('content',$this->content);
        
        }else return $this->from('example@example.com',$this->content['sender_mail'])->markdown('emails.testmail')->with('content',$this->content);
    }
}
