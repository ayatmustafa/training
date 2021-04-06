<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->biginteger('division_id')->unsigned();
            $table->foreign('division_id')->references('id')->on('Divisions')->onDelete('no action')->onUpdate('no action');;
            $table->bigInteger('section_id')->unsigned();
            $table->foreign('section_id')->references('id')->on('Sections')->onDelete('no action')->onUpdate('no action');
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
        Schema::dropIfExists('grades');
    }
}
