<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorOthrInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_othr_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_no');
            $table->string('demo_vedio');
            $table->string('internet_type');
            $table->string('internet_speed');
            $table->string('flexible_time');
            $table->string('current_occupation');
            $table->string('weekly_how_many_days_teach');
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
        Schema::dropIfExists('tutor_othr_infos');
    }
}
