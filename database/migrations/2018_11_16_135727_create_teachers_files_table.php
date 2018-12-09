<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeachersFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers_files', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('owner_id')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_path')->nullable();
            });
        Schema::table('teachers_files', function (Blueprint $table) {

          //  $table->foreign('owner_id')->references('id')->on('teachers');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('teachers_files');
    }
}
