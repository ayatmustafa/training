<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('status',["active","inactive"])->default("inactive");
            $table->biginteger('division_id')->unsigned();
            $table->foreign('division_id')->references('id')->on('Divisions')->onDelete('no action')->onUpdate('no action');;
            $table->timestamps();
        });
        Schema::create('Sections_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('locale')->index();
            $table->unique(['section_id', 'locale']);
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
        Schema::dropIfExists('Sections');
    }
}
