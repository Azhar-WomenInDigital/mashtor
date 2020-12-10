<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category');
            $table->string('want_to_teach');
            $table->string('medium')->nullable();
            $table->string('faculty')->nullable();
            $table->string('subject')->nullable();
            $table->string('your_self')->nullable();
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
        Schema::dropIfExists('tutor_details');
    }
}
