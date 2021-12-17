<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGcasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gca', function (Blueprint $table) {
            $table->mediumInteger('Vid');
            $table->primary('Vid');
            $table->string('name');
            $table->text('comments');
            $table->char('rating', 4);
            $table->date('accept_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gca');
    }
}
