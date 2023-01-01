<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_names', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('sub_counter_id');
            $table->string('from_station');
            $table->string('to_station');
            $table->string('bus_name');
            $table->string('bus_class');
            $table->integer('class_price');
            $table->time('bus_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bus_names');
    }
}
