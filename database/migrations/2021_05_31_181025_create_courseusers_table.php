<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courseusers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_course_category_id');
            $table->string('user_course_name');
            $table->string('class_link')->nullable();
            $table->string('start_time')->nullable();
            $table->string('day')->nullable();
            $table->string('class_link_2')->nullable();
            $table->string('start_time_2')->nullable();
            $table->string('day_2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courseusers');
    }
}