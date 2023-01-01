<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ChangePasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     private $user_name_to_send=" ";
    public function __construct($mone_kori_user_name)
    {
      $this->user_name_to_send = $mone_kori_user_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.user.Password_change_mail',[
           'user_name_to_send_mail'=>$this->user_name_to_send
        ]);
    }
}
