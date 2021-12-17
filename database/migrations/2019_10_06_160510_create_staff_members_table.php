<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_members', function (Blueprint $table) {
            $table->integer('vid');
            $table->string('name');
            $table->string('email');
            $table->string('position');
            $table->primary('position');
            $table->string('full_position');
            $table->string('department');
            $table->char('rank', 3);
            $table->string('permissions');
            $table->boolean('aep_staff');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_members');
    }
}
