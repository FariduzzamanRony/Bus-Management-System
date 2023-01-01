<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use App\User;
use App\BusName;
use App\Busdateli;
use App\PurchaseTicket;
use Auth;
use Mail;
use App\Mail\FurchaseConfim;
use Carbon\Carbon;
class StripePaymentController extends Controller

{

  public function stripe(){
  if (session('insert_id')) {
      return view('stripe');
  }
  else {
         abort(404);
  }
}

    public function stripePost(Request $request){
      $totle_taka=session('quantity_ticket')*session('class_price');
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100*$totle_taka,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Payment from Bus Counter ID : ".session('insert_id')

        ]);
        //ticket decrement
        Busdateli::find(session('ticket_deatils_id'))->decrement('totle_seat',session('quantity_ticket'));
$start_id=1;
  if (session('insert_id')==1) {
    PurchaseTicket::find($start_id)->update([
  'payment_status'=>'2'
]);
  }
  else {
    PurchaseTicket::find(session('insert_id'))->update([
  'payment_status'=>'2'
]);
}

// User email Sent
          $history=PurchaseTicket::find(session('insert_id'));
          $user_purchus_gmail=User::find(Auth::id())->email;
          Mail::to($user_purchus_gmail)->send(new FurchaseConfim($history));

        Session::flash('success', 'Payment successful!');
//all session Null
        session([
        'insert_id'=>'',
        'avalivle_bus_id'=>'',
        'from_station'=>'',
       'to_station'=>'',
       'ticket_date'=>'',
       'bus_time'=>'',
       'bus_name'=>'',
       'totle_seat'=>'',
       'avaliable_seat'=>'',
       'journey_time'=>'',
       'breck_time'=>'',
       'bus_route'=>'',
       'quantity_ticket'=>'',
       'class_price'=>''

          ]);
        return redirect('customer/history');
      

    }

}
