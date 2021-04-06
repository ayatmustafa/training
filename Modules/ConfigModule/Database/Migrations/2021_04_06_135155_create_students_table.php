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
            $table->string('birth_date');

            $table->string("father_contact_mobile");
            $table->string("father_contact_telephone");
            $table->string("father_contact_email_official");
            $table->string("father_birth_date");
            $table->string("father_occupation");
            $table->string("mother_contact_mobile");
            $table->string("mother_contact_email_official");
            $table->string("mother_birth_date");
            
            $table->string("mother_occupation");

            $table->bigInteger('division_id')->unsigned();
            $table->foreign('division_id')->references('id')->on('Divisions')->onDelete('no action')->onUpdate('no action');
          
            $table->bigInteger('grade_id')->unsigned();
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('no action')->onUpdate('no action');
          
            $table->bigInteger('school_id')->unsigned();
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('no action')->onUpdate('no action');

            $table->foreignId('user_id')->constrained();

            $table->timestamps();
        });
        Schema::create('students_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->enum('gender', ["male", "female"])->default("male");
            $table->integer('code')->unique();
            $table->string("religion");
            $table->string("nationality");
            $table->string("father_first_name");
            $table->string("father_middle_name");
            $table->string("father_last_name");
            $table->string("father_religion");
            $table->string("father_nationality");
            $table->string("father_address");
            $table->string("mother_first_name");
            $table->string("mother_middle_name");
            $table->string("mother_last_name");
            $table->string("mother_religion");
            $table->string("mother_nationality");
            $table->string('locale')->index();
            $table->bigInteger('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('no action')->onUpdate('no action');
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
