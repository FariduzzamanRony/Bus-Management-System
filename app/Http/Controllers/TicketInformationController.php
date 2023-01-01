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
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
class TicketInformationController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('BlockRole');

  }
  function index(){
    return view('customer.index',[
      'Sub_counter'=>Sub_counter::all(),
    ]);
  }

  function ajax_post(Request $request){


  $totle_Sub_counter=Sub_counter::where('counter_id',$request->counter_id)->get();
  $totle_Sub_counter_name="";
  foreach ($totle_Sub_counter as $key => $value) {

    $totle_Sub_counter_name.="<option value='".$value->id."' selected>".$value->sub_counter."</option>";
  }
return $totle_Sub_counter_name;


  }
  function ajax_bus_post(Request $request){
  $totle_bus_name=BusName::where('sub_counter_id',$request->counter_bus_id)->get();
   $start=1;
  $totle_bus_counter_name="";
  foreach ($totle_bus_name as $key => $value){
    $totle_bus_counter_name.="<hr>";
    $totle_bus_counter_name.="<h2"." ". " "."style="."color:#111;".">".$start++."."." "."To Station :".$value->to_station."</h2 >";
    $totle_bus_counter_name.="<hr>";
    $totle_bus_counter_name.="<div class="."priya"." ". " "."style="."color:#e0006c;padding:5px"."80px"." "." " ."5px"."80px;"."border:2px"." "."solid#fff;".">";
     $totle_bus_counter_name.="<p>Bus Name :".$value->bus_name."</p>";
    $totle_bus_counter_name.="<p>Bus Time :".$value->bus_time."</p>";
    $totle_bus_counter_name.="<p>Bus Class :".$value->bus_class."</p>";
    $totle_bus_counter_name.="<p>Bus Price :".$value->class_price."</p>";
   $totle_bus_counter_name.="<a class =btn-infos href= bus/"."$value->id".">Go To Detalis"."</a>";
  $totle_bus_counter_name.="</div>";



  }
   return $totle_bus_counter_name;
  }
  function counter_post(Request $request){
     $avaliable_bus_detalis= Busdateli::where('avaliable_bus_id',$request->avaliable_bus_id)->get();
     $totle_bus="";
   $start=1;
     foreach ($avaliable_bus_detalis as $value){

           $totle_bus.="<hr>";
           $totle_bus.="<h2"." ". " "."style="."color:#111;".">".$start++."."." "."Ticket Date :".$value->ticket_date."</h2 >";
           $totle_bus.="<hr>";
           $totle_bus.="<div class="."priya"." ". " "."style="."color:#e0006c;padding:5px"."80px"." "." " ."5px"."80px;"."border:2px"." "."solid#fff;".">";
            $totle_bus.="<p>AC Price :".$value->ac_price."</p>";
           $totle_bus.="<p>Non AC Price :".$value->non_ac_price."</p>";
           $totle_bus.="<p>Totle Seat : 50</p>";
          $totle_bus.="<p>Avaliable Seat :".$value->totle_seat."</p>";
           $totle_bus.="<p>Bus Route :".$value->bus_route."</p>";
          $totle_bus.="<p>Breck Time :".$value->breck_time."Minute"."</p>";
          $totle_bus.="<p>journey Time :".$value->journey_time."Hours"."</p>";
          $totle_bus.="<a class =btn-infos href= bus/"."$value->id".">Purchase Ticket"."</a>";
         $totle_bus.="</div>";

     }
      return $totle_bus;

  }

  function ticket_information(){
    return view('customer.deshbord.ticket_information',[
      'BusNames'=>BusName::all()
    ]);
  }
  function ticket_information_deatiles($deatils_id){
return view('customer.deshbord.ticket_infor_deatils',[
  'all_bus_deatils'=>Busdateli::where('avaliable_bus_id',$deatils_id)->get()
]);

  }

}
