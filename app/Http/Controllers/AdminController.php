<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Counter;
use App\Sub_counter;
use App\BusName;
use App\Busdateli;
use App\PurchaseTicket;
use Carbon\Carbon;
class AdminController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('CheckRole');
      $this->middleware('BlockRole');

  }
    function booking_history(){
    return view('admin.booking',[
      'PurchaseTickets'=>PurchaseTicket::latest()->simplepaginate(8)
    ]);
    }
    function cencle_ticket($cencle_id){
        PurchaseTicket::find($cencle_id)->delete();
        return back()->with('cencle',' Ticket Cencle Successfully');

    }
}
