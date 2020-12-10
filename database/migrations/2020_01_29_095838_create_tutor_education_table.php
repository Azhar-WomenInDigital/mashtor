<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_education', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('school_name');
            $table->string('degree_name');
            $table->string('field_of_study');
            $table->string('form_yaer');
            $table->string('to_year');
            $table->string('description');
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('tutor_education');
    }
}
