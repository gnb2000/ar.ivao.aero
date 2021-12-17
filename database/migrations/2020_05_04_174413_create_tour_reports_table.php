<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tour_code');
            $table->smallInteger('leg');
            $table->mediumInteger('vid');
            $table->char('callsign', 8);
            $table->dateTime('dep_time');
            $table->dateTime('arr_time');
            $table->text('user_remarks');
            $table->text('validator_remarks');
            $table->smallInteger('status');
            $table->timestamp('report_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour_reports');
    }
}
