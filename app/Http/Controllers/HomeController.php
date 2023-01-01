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
use Mail;
use PDF;
use App\Mail\Userblock;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
     {
         $this->middleware('auth');
         $this->middleware('CheckRole');
         $this->middleware('BlockRole');

     }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        return view('home',[
          'admin'=>User::where('role',1)->count(),
          'totle_customer'=>User::where('role',2)->count(),
          'totle_block'=>User::where('role',3)->count(),
        'Busdateli'=>Busdateli::count(),
        'BusName'=>BusName::count(),
        'Sub_counter'=>Sub_counter::count(),
        'Counter'=>Counter::count(),


        'Busdateligets'=>Busdateli::all(),
        'BusNameget'=>BusName::all(),
        'Sub_counterget'=>Sub_counter::all(),
        'Counterget'=>Counter::all(),



        'bus_ac'=>DB::select("SELECT * from bus_names where bus_class = 'AC'"),
        'bus_nonac'=>DB::select("SELECT * from bus_names where bus_class = 'NON_AC'"),
        'PurchaseTicketget_payment_status'=>DB::select("SELECT * from purchase_tickets where payment_status  = '2'"),

      ]);
    }
    public function all_users()
    {
        return view('admin.deshbord.all_users',[
   'uesrs'=>User::latest()->simplepaginate(8),
      ]);
    }
    public function block_users()
    {
        return view('admin.deshbord.block_user',[
           'block_users'=>DB::select("SELECT * from users where role  = '3'"),

      ]);
    }
    public function view_all_buss()
    {
        return view('admin.deshbord.view_all_bus',[
          'bus_ac'=>DB::select("SELECT * from bus_names where bus_class = 'AC'"),
          'bus_nonac'=>DB::select("SELECT * from bus_names where bus_class = 'NON_AC'"),
           'BusNameget'=>BusName::all(),
        ]);
    }

function aount_amount(){

     return view('admin.deshbord.totle_counter_amount',[
       'sub_counters'=>Sub_counter::all(),
       'PurchaseTicketget_payment_status'=>DB::select("SELECT * from purchase_tickets where payment_status  = '2'"),

]);
}
function totle_ticket(){

     return view('admin.deshbord.totle_counter_ticket',[
          'Busdateligets'=>Busdateli::all(),
]);
}
function ajax_totle_bus_amount(Request $request){
$totle_ticket=PurchaseTicket::where('from_station',$request->sub_counter_id)->get();
$sum=0;
foreach ($totle_ticket as $key => $value) {
  if ($value->payment_status==2) {
      $sum+=$value->ticket_quentity*$value->class_price;
  }

}
echo "Totle = ".$sum." Taka";

}

//public function bus_totle_amount($bus_id){
  //$totle_ticket=PurchaseTicket::where('from_station',$bus_id)->get();
  //$sum=0;
  //foreach ($totle_ticket as $key => $value) {
    //sum+=$value->ticket_quentity*$value->class_price;
  //}
  //echo $sum;


//}






    public function user_block($block_id){
$names=User::find($block_id)->name;
User::find($block_id)->update([
  'role'=>3
]);
//block user sms sent
$user_email= Auth::user()->email;
$user_name= Auth::user()->name;
Mail::to($user_email)->send(new Userblock($user_name));

return back()->with('block',$names.' block Successfully');

    }
    public function user_unblock($unblock_id){
$names=User::find($unblock_id)->name;
User::find($unblock_id)->update([
  'role'=>2
]);
return back()->with('unblock',$names.' Unblock Successfully');

    }
    public function delete($delete_id){
$names=User::find($delete_id)->name;
User::find($delete_id)->delete();
return back()->with('delete',$names.' Delected Successfully');

    }


}
