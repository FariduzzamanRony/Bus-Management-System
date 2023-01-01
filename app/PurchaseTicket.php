<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseTicket extends Model
{
    protected $fillable=['payment_status'];
    
  function relationship_with_Sub_counter_name(){
return $this->hasOne('App\Sub_counter','id','from_station');

}
  function relationship_with_Busdateli(){
return $this->hasOne('App\Busdateli','id','journey_time');

}
}
