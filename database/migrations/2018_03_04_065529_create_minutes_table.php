<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMinutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minutes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('project_details');
            $table->unsignedTinyInteger('progress_percentage');
            $table->longText('agenda');
            $table->longText('discussion');
            $table->text('leader_acheivement')->nullable();
            $table->text('member_i_acheivement')->nullable();
            $table->text('member_ii_acheivement')->nullable();
            $table->text('leader_responsibility')->nullable();
            $table->text('member_i_responsibility')->nullable();
            $table->text('member_ii_responsibility')->nullable();
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
        Schema::dropIfExists('minutes');
    }
}
