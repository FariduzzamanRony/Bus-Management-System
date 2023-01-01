<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Mail\FurchaseConfim;
class FurchaseConfim extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     private $customer_invoices_sent_gmail="";
 public function __construct($history)
 {
     $this->customer_invoices_sent_gmail=$history;
 }


    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        return $this->view('mail.user.index',[
          "customer_invoices_sent_gmails"=>$this->customer_invoices_sent_gmail
        ]);
    }
}
