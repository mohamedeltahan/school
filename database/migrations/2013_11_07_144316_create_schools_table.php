<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->unsignedInteger('library_id')->nullable();
            $table->string('governorate')->nullable();
            $table->string('center')->nullable();
            $table->string('investor')->nullable();
            $table->string('school_created_at')->nullable();
            $table->string('education_accelerate')->nullable();
            $table->string('Adminstration')->nullable();
            $table->string('mother_village')->nullable();
            $table->string('village')->nullable();
            $table->string('seasonal_vacation')->nullable();
            $table->string('working_hours')->nullable();
            $table->string('type')->nullable();
            $table->string('created_way')->nullable();
            $table->string('levels')->nullable();
            $table->string('code')->nullable();

            $table->string('rate')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('schools');
    }
}
