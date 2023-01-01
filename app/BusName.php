<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusName extends Model
{
  protected $fillable=['to_station','bus_name','bus_class','class_price','bus_time',];
  public function bus_deatiles()
  {
      return $this->hasMany('App\Busdateli');
  }


}
