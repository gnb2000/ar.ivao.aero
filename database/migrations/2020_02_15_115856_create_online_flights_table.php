<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_flights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumInteger('vid');
            $table->char('callsign', 7);
            $table->float('longitude');
            $table->float('latitude');
            $table->char('departure', 4);
            $table->char('destination', 4);
            $table->integer('online');
            $table->timestamp('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('online_flights');
    }
}
