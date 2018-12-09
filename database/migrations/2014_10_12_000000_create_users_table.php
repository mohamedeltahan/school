<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->unsignedInteger("user_id")->nullable();;
            $table->unsignedInteger("student_id")->nullable();
            $table->unsignedInteger("teacher_id")->nullable();

            $table->string("user_category");
            $table->timestamps();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('technical_users')->onDelete("cascade");
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete("cascade");
            $table->foreign('student_id')->references('id')->on('students')->onDelete("cascade");


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
