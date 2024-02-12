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

            $table->unsignedBigInteger('course_id');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->enum('branch', ['brayati', 'lawaan_diploma', 'lawan_vocational']);
            $table->enum('statue', ['active', 'cancel', 'finished']);
            $table->string('phone1');
            $table->string('phone2');
            $table->date('dateofbirth');
            $table->string('current_address');
            $table->timestamps();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
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
    }
}
