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
            $table->foreign('project_id')->references('id')->on('project_detail');
            $table->unsignedTinyInteger('progress_percentage');
            $table->longText('agenda');
            $table->longText('discussion');
            $table->text('leader_achievement');
            $table->text('member_i_acheivement');
            $table->text('member_ii_acheivement');
            $table->text('leader_responsibility');
            $table->text('member_i_responsibility');
            $table->text('member_ii_responsibility');
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
