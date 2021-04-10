<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnlineClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_classes', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('class_start_time');
            $table->time('class_end_time');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('subject_id')->nullable()->constrained();
            $table->foreignId('class_id')->nullable()->constrained()->cascadeOnDelete();
            $table->enum("status", ["active", "archived"])->default("active");
            $table->char('zoom_meeting_id')->nullable();
            $table->string('duration')->nullable();
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
        Schema::dropIfExists('online_classes');
    }
}
