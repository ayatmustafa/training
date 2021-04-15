<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
         
            $table->bigIncrements('id');
            $table->enum('gender', ["male", "female"])->default("male");
            $table->string("official_email");
            $table->string('birth_date')->nullable();
            $table->integer('code')->unique();
            $table->string("father_contact_mobile")->nullable();
            $table->string("father_contact_telephone")->nullable();
            $table->string("father_contact_email_official")->nullable();
            $table->string("father_birth_date")->nullable();
            $table->string("father_occupation")->nullable();
            $table->string("mother_contact_mobile")->nullable();
            $table->string("mother_contact_email_official")->nullable();
            $table->string("mother_birth_date")->nullable();
            
            $table->string("mother_occupation")->nullable();

            $table->bigInteger('division_id')->unsigned();
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade')->onUpdate('cascade');
          
            $table->bigInteger('grade_id')->unsigned();
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade')->onUpdate('cascade');
          
            $table->bigInteger('school_id')->unsigned();
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade')->onUpdate('cascade');

            $table->foreignId('user_id')->constrained();
            $table->foreignId('academic_class_id')->constrained();
            $table->timestamps();
        });
        Schema::create('students_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->enum('gender', ["male", "female"])->default("male");
            $table->string("religion")->nullable();
            $table->string("nationality")->nullable();
            $table->string("father_first_name");
            $table->string("father_middle_name");
            $table->string("father_last_name");
            $table->string("father_religion")->nullable();
            $table->string("father_nationality")->nullable();
            $table->string("father_address")->nullable();
            $table->string("mother_first_name");
            $table->string("mother_middle_name");
            $table->string("mother_last_name");
            $table->string("mother_religion")->nullable();
            $table->string("mother_nationality")->nullable();
            $table->string('locale')->index();
            $table->bigInteger('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('students');
        Schema::dropIfExists('students_translations');

    }
}
