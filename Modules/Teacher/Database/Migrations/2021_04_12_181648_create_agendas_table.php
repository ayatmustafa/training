<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('document');
            $table->foreignId('user_id')->constrained();
            
            $table->integer('SectionCoordinator_id')->unsigned()->nullable();
            $table->foreign('SectionCoordinator_id')->references('id')->on('SectionCoordinators')->onDelete('cascade');
            $table->bigInteger('section_id')->unsigned()->nullable();
            $table->foreign('section_id')->references('id')->on('Sections')->onDelete('cascade');
             $table->timestamps();
        });
        Schema::create('agendaClasses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agenda_id')->unsigned()->nullable();
            $table->foreign('agenda_id')->references('id')->on('agendas')->onDelete('cascade');
          
            $table->foreignId('academic_class_id')->constrained()->cascadeOnDelete();

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
        Schema::dropIfExists('agendas');
    }
}
