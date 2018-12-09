<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title')->nullable();
            $table->string('report')->nullable();
            $table->string('file_attached_link')->nullable();
            $table->unsignedInteger('student_id')->nullable();
            $table->string('absent_time')->nullable();
            });
        Schema::table('students_attendances', function (Blueprint $table) {

           // $table->foreign('student_id')->references('id')->on('students');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('students_attendances');
    }
}
