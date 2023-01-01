<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('user/register', 'RegisterssController@user_register')->name('user.register');
Route::post('user/register/post', 'RegisterssController@user_register_post');













Route::get('booking', 'AdminController@booking_history')->name('booking.history');
Route::get('ticket/cencle/{cencle_id}', 'AdminController@cencle_ticket');




Route::get('user/setting', 'ProfileSettingController@user_setting');
Route::post('profile_edit/post', 'ProfileSettingController@profile_name');
Route::post('profile_photo/post', 'ProfileSettingController@profile_photo');
Route::post('password/change/post', 'ProfileSettingController@password_change_post');




Route::get('/', function () {
    return view('welcome');
});

//Auth::routes(['verify' => true]);
//Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//deshbord admin information start
Route::get('all_user', 'HomeController@all_users');
Route::get('block/user', 'HomeController@block_users');
Route::get('view_all_bus', 'HomeController@view_all_buss');
Route::get('totle_counter_ticket', 'HomeController@totle_ticket');
Route::get('totle_counter_amount', 'HomeController@aount_amount');
//get link
//Route::get('counter_bus_totle_amount/{bus_id}', 'HomeController@bus_totle_amount');
Route::post('counter_amount', 'HomeController@ajax_totle_bus_amount');

//deshbord admin information end
Route::get('user/block/{block_id}', 'HomeController@user_block');
Route::get('user/Unblock/{unblock_id}', 'HomeController@user_unblock');
Route::get('delete/{delete_id}', 'HomeController@delete');





Route::get('bus/counter', 'Bus_counterController@index')->name('bus.counter');
Route::post('counter/post', 'Bus_counterController@counter_post');
Route::get('view/all_counter/{counter_id}', 'Bus_counterController@counter_point');
Route::post('sub_counter/post', 'Bus_counterController@sub_counter_post');
Route::get('available/bus/{sub_counter_id}', 'Bus_counterController@available_bus');
Route::post('bus_name/post', 'Bus_counterController@bus_name_post');
Route::get('bus/deatils/{bus_deatils_id}', 'Bus_counterController@bus_deatils');
Route::post('bus_deatils/post', 'Bus_counterController@bus_deatils_post');




//Route::get('customer/home', 'CustomerController@customer_index')->name('customer/home')->middleware('verified');
Route::get('customer/home', 'CustomerController@customer_index')->name('customer/home');

Route::post('avaliable_bus_id/counter', 'CustomerController@counter_post');
Route::get('available/bus/bus/{id}', 'AjaxIDController@nice_post');
Route::get('customer_show/bus/{id}', 'AjaxIDController@bus_ajax_id');

Route::get('customer_show/counter', 'TicketInformationController@index')->name('customer_show/counter');
Route::post('customer_show/counter', 'TicketInformationController@ajax_post');
Route::post('customer_show/counter_bus', 'TicketInformationController@ajax_bus_post');
Route::get('ticket/information', 'TicketInformationController@ticket_information');
Route::get('ticket_info_deatils/{deatils_id}', 'TicketInformationController@ticket_information_deatiles');


Route::get('customer/history', 'TicketHistoryController@customer_history')->name('customer/history');
Route::get('customer/invoice/download/{ticket_id}', 'TicketHistoryController@customerdownload_invoice');






Route::get('edit/counter/{edit_id}', 'AdminEditController@edit_counter');
Route::post('counter/edit/post', 'AdminEditController@counter_edit_post');
Route::get('delete/counter/{delete_id}', 'AdminEditController@delete_counter');
Route::get('dactive/counter/{dactive_id}', 'AdminEditController@dactive_counter');
Route::get('active/counter/{active_id}', 'AdminEditController@active_counter');

Route::get('delete/sub_counter/{sub_counter_id}', 'AdminEditController@delete_sub_counter');
Route::get('edit/sub_counter/{edit_counter_id}', 'AdminEditController@edit_sub_counter');
Route::post('edit/sub_counter/post', 'AdminEditController@edit_sub_counter_post');

Route::get('bus_name_edit/{bus_id}', 'AdminEditController@bus_name_edit');
Route::post('bus_name_edit/post', 'AdminEditController@bus_name_edit_post');








Route::get('purchase/ticket/{ticket_id}', 'PurchaseTicketController@purchaseticket_bay');
Route::post('tickt_post/success', 'PurchaseTicketController@tickt_post');




// SSLCOMMERZ Start
Route::get('/example1', 'SslCommerzPaymentController@exampleEasyCheckout');
Route::get('/example2', 'SslCommerzPaymentController@exampleHostedCheckout');

Route::post('/pay', 'SslCommerzPaymentController@index');
Route::post('/pay-via-ajax', 'SslCommerzPaymentController@payViaAjax');

Route::post('/success', 'SslCommerzPaymentController@success');
Route::post('/fail', 'SslCommerzPaymentController@fail');
Route::post('/cancel', 'SslCommerzPaymentController@cancel');

Route::post('/ipn', 'SslCommerzPaymentController@ipn');
//SSLCOMMERZ END

//Stripe  Start
Route::get('stripe', 'StripePaymentController@stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');
//Stripe  END
