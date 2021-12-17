<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_positions', function (Blueprint $table) {
            $table->string('Id');
            $table->primary('Id');
            $table->string('PosName');
            $table->string('PosNameEn');
            $table->integer('Vacant');
            $table->integer('Rank');
            $table->string('Dept');
            $table->timestamp('LastChg');
            $table->date('FinalVac');
            $table->integer('RatReq');
            $table->integer('AgeReq');
            $table->text('Text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_positions');
    }
}
