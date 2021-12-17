<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSrteTrackersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('srte_tracker', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('flight_id');
            $table->char('callsign', 8);
            $table->timestamp('time');
            $table->float('latitude', 4);
            $table->float('longitude');
            $table->mediumInteger('altitude');
            $table->mediumInteger('heading');
            $table->mediumInteger('speed');
            $table->boolean('ground');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('srte_tracker');
    }
}
