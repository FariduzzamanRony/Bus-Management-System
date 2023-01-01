<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusdatelisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('busdatelis', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('avaliable_bus_id');
            $table->integer('totle_seat');
            $table->date('ticket_date');
            $table->string('bus_route');
            $table->string('breck_time');
            $table->string('journey_time');
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
        Schema::dropIfExists('busdatelis');
    }
}
