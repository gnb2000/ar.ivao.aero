<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code');
            $table->mediumInteger('distance');
            $table->time('time');
            $table->string('author');
            $table->text('image');
            $table->string('aircrafts');
            $table->text('remarks');
            $table->boolean('status');
            $table->mediumInteger('year');
            $table->boolean('ias_above_250');
            $table->boolean('ias_above_220');
            $table->boolean('gs_above_550');
            $table->char('flight_rules', 1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tours');
    }
}
