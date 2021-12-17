<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourLegsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_legs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tour_code');
            $table->smallInteger('tour_leg');
            $table->char('departure', 4);
            $table->char('destination', 4);
            $table->smallInteger('distance');
            $table->time('EET');
            $table->smallInteger('max_speed');
            $table->smallInteger('max_altitude');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour_legs');
    }
}
