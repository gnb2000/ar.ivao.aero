<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVaListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('va_list', function (Blueprint $table) {
            $table->bigInteger('IVAOId');
            $table->char('ICAO', 4);
            $table->char('IATA', 4);
            $table->string('VaName');
            $table->string('VaUrl');
            $table->boolean('VaStatus');
            $table->string('VaKey');
            $table->unsignedSmallInteger('VaType');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('v_a_s');
    }
}
