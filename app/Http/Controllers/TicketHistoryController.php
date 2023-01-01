<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use App\Counter;
use App\Sub_counter;
use App\BusName;
use App\Busdateli;
use Auth;
use App\PurchaseTicket;
use Carbon\Carbon;
use PDF;
class TicketHistoryController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function customer_history()
  {
      return view('customer.deshbord.history',[
           'ticket_history'=>PurchaseTicket::Where('user_id',Auth::id())->get()
      ]);
  }
  public function customerdownload_invoice($ticket_id)
  {

     $php=Auth::id().rand(1,100000);
       $cookies_generated_card_id=Str::random(10).Auth::id();
       $pdf = Pdf::loadView('customer.pdf.index',[
        'history'=>PurchaseTicket::find($ticket_id),
        'cookies_generated'=>$cookies_generated_card_id,
      ]);
      return $pdf->download('invoice'.$php);
    //   return $pdf->download(Time().'.'.'Pdf');
  }


}
