<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgindaSectionCoordinadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aginda_sectionCoordinadors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agenda_id')->unsigned()->nullable();
            $table->foreign('agenda_id')->references('id')->on('agendas')->onDelete('cascade');
            $table->integer('SectionCoordinator_id')->unsigned()->nullable();
            $table->foreign('SectionCoordinator_id')->references('id')->on('SectionCoordinators')->onDelete('cascade');
           
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
        Schema::dropIfExists('aginda_sectionCoordinadors');
    }
}
