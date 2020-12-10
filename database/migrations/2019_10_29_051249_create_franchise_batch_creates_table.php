<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFranchiseBatchCreatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('franchise_batch_creates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('batch_name');
            $table->string('classorlevelorsubject');
            $table->string('study_medium');
            $table->string('group');
            $table->string('gender');
            $table->string('institute');
            $table->string('union_name');
            $table->string('upzila_name');
            $table->string('district_name');
            $table->string('education_board');
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
        Schema::dropIfExists('franchise_batch_creates');
    }
}
