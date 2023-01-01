<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use App\Counter;
use App\Sub_counter;
use App\BusName;
use App\Busdateli;
use Auth;
use Carbon\Carbon;
class AjaxIDController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('BlockRole');

  }
  function bus_ajax_id($id){
return view('customer.detalis',[
  'busdatelis'=>Busdateli::where('avaliable_bus_id',$id)->get()
]);

  }

  function bus_date(Request $Request){

    $bus_dates_id= Busdateli::where('avaliable_bus_id',$Request->bus_date_id)->get();
    foreach ($bus_dates_id as  $value) {
      $bus_dates_bus_name=BusName::where('id',$value->id)->get();
      foreach ($bus_dates_bus_name as  $values) {
        echo $values;
      }
    }


  }










}
