<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->increments('id');
            $table->timestamps();
            $table->rememberToken();
            $table->string('full_name')->nullable();
            $table->string('account_name')->nullable();
            $table->string('ssn')->unique();
            $table->string('birth_date')->nullable();
            $table->string('sex')->nullable();
            $table->string('religion')->nullable();
            $table->string('address')->nullable();
            $table->string('educate')->nullable();
            $table->string('current_state')->nullable();
            $table->string('society')->nullable();
            $table->string('email')->nullable();
            $table->string('level')->nullable();
            $table->string('password')->nullable();
            $table->string('investor')->nullable();
            $table->unsignedInteger('school_id')->nullable();
            $table->string('report')->nullable();
            $table->string('social_status')->nullable();
            $table->string('talent')->nullable();
            $table->string('health_state')->nullable();
            $table->string('points')->nullable();
            $table->string('entry_date')->nullable();
            $table->string('relation')->nullable();


        });

        Schema::table('students', function (Blueprint $table) {

            $table->foreign('school_id')->references('id')->on('schools')->onDelete("cascade");


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('students');
    }
}
