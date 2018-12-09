<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHelpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('helps', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('school_id')->nullable();
            $table->string('type')->nullable();
            $table->string('title')->nullable();
            $table->string('content')->nullable();
            $table->string('priority')->nullable();
            $table->string('seen_date')->nullable();
            $table->string('state')->nullable();
            $table->unsignedInteger("investor_id")->nullable();
            $table->string('investor_name')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('helps');
    }
}
