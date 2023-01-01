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
use PDF;
use Hash;
use Image;
use Carbon\Carbon;
use App\Mail\ChangePasswordMail;
class ProfileSettingController extends Controller
{  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('BlockRole');

  }
  function user_setting(){
       return view('profile.profile_edit',[
         'user_profile'=>User::find(Auth::id())
       ]);
  }
  function profile_name(Request $request){
    $request->validate([
      'name'=>'required'
    ],[
      'name.required'=>'please fill out this field?',
    ]);

  if (Auth::user()->updated_at->addDays(30) < Carbon::now()) {
    User::find($request->userid)->update([
      'name'=>$request->name
    ]);
    return back()->with('edit','Name Edit Sucessfully');
  }
  else {
   return back()->with('time','You Can after 30 days');
}



  }
  function profile_photo(Request $request){
    $request->validate([
      'photo'=>'required|image'
    ]);
        if ($request->hasFile('photo')) {
          ///delete old photo
          if (Auth::user()->photo!='null.png') {
              $old_photo_location='profile_photo/'.Auth::user()->photo;
            unlink(public_path($old_photo_location));


          }

          $user_uplode_photo=$request->file('photo');
          $last_extension_photo=$user_uplode_photo->getClientOriginalExtension();
           $new_photo_name=Auth::id().".".$last_extension_photo;
          $new_location_photo_uplode='profile_photo/'.$new_photo_name;
Image::make($user_uplode_photo)->resize(150,150)->save(public_path($new_location_photo_uplode,50));
User::find(Auth::id())->update([
  'photo'=>$new_photo_name
]);
return back()->with('photo_SU','Photo Uplode Successfully');

        }
        else {
          return back()->with('photo_empty','Photo uplode empty');
        }
  }




  function password_change_post(Request $request){
$request->validate([
   'password'=>'required | confirmed',
   'password_confirmation'=>'required'
]);


if (Hash::check($request->old_password,Auth::user()->password)) {
    if ($request->old_password==$request->password) {
      return back()->with('old_pass_math','old password and new password same');
    }
    else {
   User::find(Auth::id())->update([
      'password'=>Hash::make($request->password)
   ]);


   $user_email= Auth::user()->email;
   $user_name= Auth::user()->name;
   Mail::to($user_email)->send(new ChangePasswordMail($user_name));
   return back()->with('change_success','Password change Successfully');


    }
}
else {
   return back()->with('on_math_pass','old password dose not math');
}
}
}
