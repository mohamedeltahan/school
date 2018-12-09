<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();;
            $table->string('category')->nullable();;
            $table->string('sub_category')->nullable();
            $table->unsignedInteger('investor_id')->nullable();
            $table->unsignedInteger('school_id');
            $table->unsignedInteger('quantity')->nullable();
            $table->string('date_released')->nullable();
            $table->string('date_arrival')->nullable();
            $table->string('expired_date')->nullable();
            $table->string('state')->nullable();
            $table->string('investor_name')->nullable();


        });
        Schema::table('assets', function (Blueprint $table) {

            $table->foreign('investor_id')->references('id')->on('technical_users')->onDelete("set null");
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
        Schema::drop('assets');
    }
}
