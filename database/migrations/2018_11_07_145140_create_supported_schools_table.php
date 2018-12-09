<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSupportedSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supported_schools', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('investor_id');
            $table->unsignedInteger('school_id');
            $table->integer('support_lvl');

            });


        Schema::table('supported_schools', function (Blueprint $table) {

            $table->foreign('school_id')->references('id')->on('schools')->onDelete("cascade");
            $table->foreign('investor_id')->references('id')->on('technical_users')->onDelete("cascade");

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::drop('supported_schools');
    }
}
