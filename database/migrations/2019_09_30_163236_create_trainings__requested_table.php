<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingsRequestedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings_requested', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_training');
            $table->mediumInteger('member');
            $table->mediumInteger('trainer');
            $table->smallInteger('state');
            $table->char('atc_position');
            $table->text('comments');
            $table->text('request');
            $table->text('url');
            $table->timestamp('scheduled_date');
            $table->dateTime('training_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainings_requested');
    }
}
