<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->year('year');
            $table->unsignedTinyInteger('type');
            $table->integer('head_id')->unsigned();
            $table->foreign('head_id')->references('id')->on('users');
            $table->integer('supervisor_id')->unsigned();
            $table->foreign('supervisor_id')->references('id')->on('users');
            $table->integer('leader_id')->unsigned();
            $table->foreign('leader_id')->references('id')->on('users');
            $table->integer('member_idi')->unsigned();
            $table->foreign('member_idi')->references('id')->on('users');
            $table->integer('member_idii')->unsigned();
            $table->foreign('member_idii')->references('id')->on('users'); 
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
        Schema::dropIfExists('project_details');
    }
}
