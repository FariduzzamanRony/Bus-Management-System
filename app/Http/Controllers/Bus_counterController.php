<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Counter;
use App\Sub_counter;
use App\BusName;
use App\Busdateli;
use Auth;
use Carbon\Carbon;


class Bus_counterController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('CheckRole');
      $this->middleware('BlockRole');

  }
    function index(){
      return view('admin.counter.index',[
        'counters'=>Counter::all(),
      ]);
    }
    function counter_post(Request $request){
      $request->validate([
       'counter'=>'required|regex:/^[\pL\s\-]+$/u|max:255|unique:counters,counter',
       'totle_counter'=>'required |regex:/^([0-9\s\-\+\(\)]*)$/| digits:1',
     ],[
          'counter.required'=>'please Enter Your Counter??',
          'counter.regex'=>'Please Inser validate Name',
          'counter.unique'=>'The '.$request->counter.' counter has already been taken',
          'totle_counter.required'=>'please Enter  Totle Counter??',
          'totle_counter.regex'=>'Please Insert Integer Number??',

        ]);
      Counter::insert([
        'user_id'=>Auth::id(),
       'counter'=>$request->counter,
       'totle_counter'=>$request->totle_counter,
       'created_at'=>Carbon::now()
      ]);
   return back()->with('success_counter',$request->counter." ".'Counter Successfully Add');

    }


    function counter_point($counter_id){


    return view('admin.sub_counter.index',[
        'counter_id_value'=>Counter::find($counter_id),
        'Sub_counter_name'=>Sub_counter::where('counter_id',$counter_id)->get()
      ]);

}


    function sub_counter_post(Request $request){
      $request->validate([
       'sub_counter'=>'required|regex:/^[\pL\s\-]+$/u',
     ],[
          'sub_counter.required'=>'please Enter Your Counter??',
          'sub_counter.regex'=>'Please Inser validate Name',
        ]);



    $division_counter = Counter::find($request->division_counter_id)->totle_counter;
    $totle = Sub_counter::where('counter_id',$request->division_counter_id)->count();


 if ($division_counter > $totle ) {
   Sub_counter::insert([
        'user_id'=>Auth::id(),
        'counter_id'=>$request->counter_id,
       'sub_counter'=>$request->sub_counter,
       'created_at'=>Carbon::now()
       ]);
 }
 else {
   return back()->with('success_sub_counter_error',$request->counter." ".'Counter Error You Can Add Only '.$totle .' Times');
 }
 return back()->with('success_sub_counter',$request->counter." ".'Counter Successfully Add');

 }

function available_bus($sub_counter_id){

    return view('admin.available_bus.index',[
              'sub_counters_ids'=>Sub_counter::find($sub_counter_id),
              'BusNames'=>BusName::where('sub_counter_id',$sub_counter_id)->get(),
              'all_bus_deatils'=> Busdateli::all(),

    ]);
}

function bus_name_post(Request $request){
  $request->validate([
    'to_station'=>'required|regex:/^[\pL\s\-]+$/u',
    'bus_name'=>'required |regex:/^[\pL\s\-]+$/u',
    'bus_class'=>'required',
    'class_price'=>'required |regex:/^([0-9\s\-\+\(\)]*)$/',
    'bus_time'=>'required',
   //'bus_time'=>'nullable|date|after_or_equal:start_date|date_format:H:i '
 ]);

  BusName::insert([
        'user_id'=>Auth::id(),
        'sub_counter_id'=>$request->sub_counter_id,
       'from_station'=>$request->from_station,
       'to_station'=>$request->to_station,
       'bus_name'=>$request->bus_name,
       'bus_class'=>$request->bus_class,
       'class_price'=>$request->class_price,
       'bus_time'=>$request->bus_time,
       'created_at'=>Carbon::now()
       ]);
       Sub_counter::find($request->sub_counter_id)->update([
          'bus_status'=>2
        ]);
       return back()->with('success_bus_name',$request->bus_name." ".'Bus Successfully Add');
}

function bus_deatils($bus_deatils_id){
  return view('admin.available_bus.deatils',[
                'bus_deatils_ids'=>BusName::find($bus_deatils_id),
                'all_bus_deatils'=>Busdateli::where('avaliable_bus_id',$bus_deatils_id)->get()
  ]);

}




function bus_deatils_post(Request $request){
Busdateli::insert([
  'user_id'=>Auth::id(),
  'avaliable_bus_id'=>$request->bus_deatils_ids,
  'totle_seat'=>$request->totle_seat,
  'ticket_date'=>$request->ticket_date,
  'bus_route'=>$request->bus_route,
  'breck_time'=>$request->breck_time,
  'journey_time'=>$request->journey_time,
  'created_at'=>Carbon::now()
]);

return back()->with('success_bsdatelis','Bus Deatelis Successfully');
}


}
