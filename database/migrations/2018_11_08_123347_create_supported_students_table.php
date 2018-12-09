<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSupportedStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supported_students', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('investors_id')->nullable();
            $table->unsignedInteger('student_id')->nullable();
            $table->integer('support_lvl')->nullable();
            });

        Schema::table('supported_students', function (Blueprint $table) {

          //  $table->foreign('student_id')->references('id')->on('students');
          //  $table->foreign('investors_id')->references('id')->on('technical_users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('supported_students');
    }
}
