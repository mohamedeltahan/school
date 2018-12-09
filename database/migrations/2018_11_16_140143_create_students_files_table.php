<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_files', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('owner_id')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_path')->nullable();
            });
        Schema::table('students_files', function (Blueprint $table) {

            //$table->foreign('owner_id')->references('id')->on('students');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('students_files');
    }
}
