<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeachersMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers_materials', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('file_name')->nullable();
            $table->string('file_directory')->nullable();
            $table->unsignedInteger('teacher_id')->nullable();
            $table->integer('level')->nullable();
            $table->string('subject')->nullable();
            $table->string('semester')->nullable();
            $table->string('lesson')->nullable();
            $table->string('unit')->nullable();
            });
        Schema::table('teachers_materials', function (Blueprint $table) {

         //   $table->foreign('id')->references('id')->on('teachers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('teachers_materials');
    }
}
