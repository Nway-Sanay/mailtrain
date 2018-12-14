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
    public function __construct($sender_mail)
    {
        $this->sender_mail = $sender_mail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->sender_mail);
        return $this->from('example@example.com',$this->sender_mail)->markdown('emails.testmail');
        // return $this->from("$this->sender_mail",'Pyae')->markdown('emails.testmail');
    }
}
