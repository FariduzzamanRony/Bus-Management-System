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
class AdminEditController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('CheckRole');
      $this->middleware('BlockRole');

  }
  function edit_counter($edit_id){
    return view('admin.edit.counter_edit',[
      'counters'=>Counter::find($edit_id)
    ]);

  }

  function counter_edit_post(Request $request){
    $request->validate([
     'counter'=>'required|regex:/^[\pL\s\-]+$/u|max:255|unique:counters,counter',
     'totle_counter'=>'required |regex:/^([0-9\s\-\+\(\)]*)$/| digits:1',
   ],[
        'counter.required'=>'please fill out this field?',
        'counter.regex'=>'Please Inser Cearector',
        'counter.unique'=>'The '.$request->counter.' counter has already been taken',
        'totle_counter.required'=>'please fill out this field?',
        'totle_counter.regex'=>'Please Insert Integer Number??',

      ]);
    Counter::find($request->id)->update([
      'counter'=>$request->counter,
      'totle_counter'=>$request->totle_counter
    ]);
    return back()->with('counter_edit','Counter Edit Successfull');

  }


  function delete_counter($delete_id){
    $counter_id= Counter::find($delete_id);
    $counter_name= Counter::find($delete_id)->counter;
    Counter::find($delete_id)->delete();
    return back()->with('counter_delete',$counter_name.' Contact Delete Successfully');
  }
function dactive_counter($dactive_id){

 $allow_counter_statusss= Sub_counter::where('counter_id',$dactive_id)->get();
 foreach ($allow_counter_statusss as $key => $value) {
    Sub_counter::find($value->id)->update([
            'allow_counter_status'=>2
  ]);

 }
 return back()->with('active_status','Dactive Successfull');
}
function active_counter ($active_id){

 $allow_counter_statusss= Sub_counter::where('counter_id',$active_id)->get();
 foreach ($allow_counter_statusss as $key => $value) {
    Sub_counter::find($value->id)->update([
            'allow_counter_status'=>1
  ]);

}
return back()->with('active_status','Active Successfull');

}





function delete_sub_counter($sub_counter_id){
  $all_bus= BusName::where('sub_counter_id',$sub_counter_id)->get();
  session(['all_bussd'=>$all_bus]);
 BusName::where('sub_counter_id',$sub_counter_id)->delete();

 foreach (session('all_bussd') as $key => $valuess) {
   $totle_id= Busdateli::where('avaliable_bus_id',$valuess->id)->delete();

 }
Sub_counter::find($sub_counter_id)->delete();

        return back()->with('format','Formate Successfully');
}
function edit_sub_counter($edit_counter_id){

  return view('admin.edit.sub_counter_edit',[
    'sub_counters'=>Sub_counter::find($edit_counter_id)
  ]);
}

function edit_sub_counter_post(Request $request){
  $request->validate([
   'sub_counter'=>'required|regex:/^[\pL\s\-]+$/u|max:255',
 ],[
      'sub_counter.required'=>'please fill out this field?',
      'sub_counter.regex'=>'Please Inser Caracter',
      'sub_counter.max'=>'Long text not suppeded'


    ]);

  Sub_counter::find($request->id)->update([
    'sub_counter'=>$request->sub_counter
  ]);
return back()->with('sub_counter','Sub Counter Updated Successfull');
}


function bus_name_edit($bus_id){
  return view('admin.edit.bus_name_edit',[
    'bus_all'=>BusName::find($bus_id)
  ]);
}
function bus_name_edit_post(Request $request){
  $request->validate([
   'to_station'=>'required|regex:/^[\pL\s\-]+$/u',
   'bus_name'=>'required |regex:/^[\pL\s\-]+$/u',
   'bus_class'=>'required |regex:/^[\pL\s\-]+$/u|',
   'class_price'=>'required |regex:/^([0-9\s\-\+\(\)]*)$/',
   'bus_time'=>'required'
   //'bus_time'=>'nullable|date|after_or_equal:start_date|date_format:H:i ',
 ]);
 BusName::find($request->buuss_id)->update([
   'to_station'=>$request->to_station,
   'bus_name'=>$request->bus_name,
   'bus_class'=>$request->bus_class,
   'class_price'=>$request->class_price,
   'bus_time'=>$request->bus_time
 ]);

return back()->with('bus_information','Bus Information Updated Successfull');
}

}
