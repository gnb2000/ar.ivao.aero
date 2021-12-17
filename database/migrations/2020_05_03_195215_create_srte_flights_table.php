<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSrteFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('srte_flights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tour');
            $table->smallInteger('leg');
            $table->char('callsign', 8);
            $table->mediumInteger('vid');
            $table->timestamp('conn_time');
            $table->timestamp('disc_time');
            $table->char('dep_icao', 4);
            $table->char('arr_icao', 4);
            $table->char('wtc', 1);
            $table->text('route');
            $table->text('remarks');
            $table->char('flight_rules', 1);
            $table->char('aircraft', 4);
            $table->boolean('ias_above_220');
            $table->boolean('ias_above_250');
            $table->boolean('gs_above_550');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('srte_flights');
    }
}
