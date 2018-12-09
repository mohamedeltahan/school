<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->rememberToken();
            $table->string('full_name')->nullable();
            $table->string('account_name')->nullable();
            $table->string('password')->nullable();
            $table->bigInteger('tracing_key')->nullable();
            $table->string('school_name')->nullable();
            $table->string('ssn')->nullable();

            $table->unsignedInteger('school_id')->nullable();
            $table->string('religion')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('sex')->nullable();
            $table->string('address')->nullable();
            $table->string('social_status')->nullable();
            $table->string('education')->nullable();
            $table->string('hiring_date')->nullable();
            $table->string('salary')->nullable();
            $table->unsignedInteger('salary_investor_id')->nullable();

            $table->bigInteger('experience_years')->nullable();
            $table->string('job_type')->nullable();
            });
        Schema::table('teachers', function (Blueprint $table) {
            $table->foreign('school_id')->references('id')->on('schools')->onDelete("cascade");
            $table->foreign('salary_investor_id')->references('id')->on('technical_users')->onDelete("set null");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('teachers');
    }
}
