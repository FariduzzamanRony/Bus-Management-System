<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Counter;
use App\Sub_counter;
use App\BusName;
use App\Busdateli;
use Auth;
use App\PurchaseTicket;
use Mail;
use App\Mail\FurchaseConfim;
use Carbon\Carbon;
class PurchaseTicketController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('BlockRole');

  }
    function purchaseticket_bay($ticket_id){
       $user_ticket_deatilssssss=Busdateli::find($ticket_id)->avaliable_bus_id;

      return view('customer.purchase_ticket.index',[
              'ticket_deatils'=>Busdateli::find($ticket_id),
                'user_ticket_bus_deatiles'=>BusName::find($user_ticket_deatilssssss)
      ]);
    }
  function tickt_post(Request $request){
    $request->validate([
     'quantity_ticket'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/||max:5|',
     'payment_opction'=>'required |regex:/^([0-9\s\-\+\(\)]*)$/|digits:1',
   ]);


    $have_ticket=Busdateli::find(session('Id'))->totle_seat;
  if ($have_ticket < $request->quantity_ticket) {
          return back()->with('quantity','Tker is Only '.$have_ticket.' Ticket');
  }
  else {

      $insert_id=PurchaseTicket::insertGetId([
     'user_id'=>Auth::id(),
     'ticket_quentity'=>$request->quantity_ticket,
     'class_price'=>session('class_price'),
     'from_station'=>session('from_station'),
     'to_station'=>session('to_station'),
     'ticket_date'=>session('ticket_date'),
     'bus_time'=>session('bus_time'),
     'bus_name'=>session('bus_name'),
     'bus_class'=>session('bus_class'),
     'journey_time'=>session('journey_time'),
     'breck_time'=>session('breck_time'),
     'bus_route'=>session('bus_route'),
     'payment_opction'=>$request->payment_opction,
     'created_at'=>Carbon::now()
   ]);

   if ($request->payment_opction=='1') {
            session(['insert_id'=>$insert_id]);
            session(['ticket_deatils_id'=>$request->ticket_deatils_id]);
            session(['quantity_ticket'=>$request->quantity_ticket]);
            session(['class_price'=>session('class_price')]);
            return redirect("stripe");
          }
          else {
            session(['insert_id'=>$insert_id]);
            session(['quantity_ticket'=>$request->quantity_ticket]);
            session(['class_price'=>session('class_price')]);
            return redirect("example2");
          }

  }


}



}
