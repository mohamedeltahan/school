<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSupportedTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supported_teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('investors_id')->nullable();
            $table->unsignedInteger('teacher_id')->nullable();
            $table->bigInteger('support_lvl')->nullable();
            });
        Schema::table('supported_teachers', function (Blueprint $table) {

       //    $table->foreign('teacher_id')->references('id')->on('teachers');
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
        Schema::drop('supported_teachers');
    }
}
