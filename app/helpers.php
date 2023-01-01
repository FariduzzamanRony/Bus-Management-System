<?php


function Avaliable_seat($seat){
  $seat=App\Busdateli::all();
  foreach ($seat as $key => $value) {
    echo $value;
  }
}
