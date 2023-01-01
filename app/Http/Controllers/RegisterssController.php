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
use Illuminate\Support\Facades\Hash;
class RegisterssController extends Controller
{
  function user_register(){
    return view('customer.register.index');
  }
  function user_register_post (Request $request){
    $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'phone' => ['required ','regex:/^([0-9\s\-\+\(\)]*)$/',' digits:11'],
      'age' => ['required ','integer'],
      'birth' => ['required'],
      'gender' => ['required'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
     User::create([
        'role' =>'2',
        'name' => $request->name,
        'phone' => $request->phone,
        'age' => $request->age,
        'birth' => $request->birth,
        'gender' => $request->gender,
        'email' => $request->email,
        'password' => Hash::make($request->password ),
    ]);
    if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
         return redirect('customer/home');
      }

  }
}
