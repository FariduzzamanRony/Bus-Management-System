<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('ticket_quentity');
            $table->integer('class_price');
            $table->string('from_station');
            $table->string('to_station');
            $table->date('ticket_date');
            $table->time('bus_time');
            $table->string('bus_name');
            $table->string('bus_class');
            $table->string('journey_time');
            $table->integer('breck_time');
            $table->string('bus_route');
            $table->integer('payment_opction');
            $table->integer('payment_status')->default(1);
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
        Schema::dropIfExists('purchase_tickets');
    }
}
