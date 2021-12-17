<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('count_flights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('intstart');
            $table->dateTime('intfinish');
            $table->string('inter');
            $table->string('weekday');
            $table->smallInteger('WD_id');
            $table->float('Count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('count_flights');
    }
}
