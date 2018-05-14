<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcheivementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acheivements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id')->unsigned();
            $table->foreign('member_id')->references('id')->on('users');
            $table->integer('minute_id')->unsigned();
            $table->foreign('minute_id')->references('id')->on('minutes');
            $table->integer('acheivement')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acheivements');
    }
}
