<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->mediumInteger('vid');
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->date('birthday');
            $table->integer('age');
            $table->string('country');
            $table->char('division', 2);
            $table->boolean('newsletter');
            $table->boolean('directory');
            $table->text('obs_staff');
            $table->text('obs_user');
            $table->mediumInteger('ivao_rating');
            $table->mediumInteger('atc_rating');
            $table->mediumInteger('pilot_rating');
            $table->string('ip_last');
            $table->string('ip_reg');
            $table->text('hash');            
            $table->boolean('active');
            $table->boolean('gca');
            $table->timestamp('regTime');
            $table->integer('HrPilot');
            $table->integer('HrControl');
            $table->boolean('NpoMember');
            $table->boolean('AEPmember');
            $table->primary('vid');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
