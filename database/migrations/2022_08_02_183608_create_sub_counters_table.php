<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_counters', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('bus_status')->default(1);
            $table->integer('counter_id');
            $table->string('sub_counter');
            $table->integer('allow_counter_status')->default(1);
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
        Schema::dropIfExists('sub_counters');
    }
}
