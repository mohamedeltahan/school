<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeachersAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers_attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title')->nullable();
            $table->string('report')->nullable();
            $table->string('file_attached_link')->nullable();
            $table->unsignedInteger('teacher_id')->nullable();
            $table->string('absent_time')->nullable();
            });


        Schema::table('teachers_attendances', function (Blueprint $table) {

         //   $table->foreign('teacher_id')->references('id')->on('teachers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('teachers_attendances');
    }
}
