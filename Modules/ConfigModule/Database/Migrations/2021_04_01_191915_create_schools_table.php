<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            $table->string('logo')->nullable();
            $table->json('contacts')->nullable();
            $table->timestamps();
        });
        Schema::create('schools_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained()->cascadeOnDelete();
            $table->string('long_name');
            $table->string('short_name');
            $table->string('address');
            $table->string('branch_name');
            $table->string('locale')->index();
            $table->unique(['school_id', 'locale']);
            $table->unique(['long_name', 'locale']);
            $table->unique(['short_name', 'locale']);
            $table->unique(['branch_name', 'locale']);
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
        Schema::dropIfExists('schools');
		Schema::dropIfExists('school_translations');
    }
}
