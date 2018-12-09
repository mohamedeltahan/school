<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTechnicalUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technical_users', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->rememberToken();
            $table->string('full_name')->nullable();
            $table->string('account_name')->nullable();
            $table->string('password')->nullable();
            $table->string('user_category')->nullable();
            $table->unsignedInteger('tracing_key')->nullable();;
            $table->string('ssn')->nullable();
            $table->string('religion')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('sex')->nullable();
            $table->string('address')->nullable();
            $table->string('education')->nullable();
            $table->string('hiring_date')->nullable();
            $table->string('salary')->nullable();
            $table->unsignedInteger('investor_id')->nullable();
            $table->integer('experience_years')->nullable();
            $table->string('job_type')->nullable();
            });
        Schema::table('technical_users', function (Blueprint $table) {

            $table->foreign('investor_id')->references('id')->on('technical_users')->onDelete('CASCADE');;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('technical_users');
    }
}
