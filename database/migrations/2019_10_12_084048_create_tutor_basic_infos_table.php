<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorBasicInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_basic_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('profile_pic')->nullable();
            $table->string('profile_tag');
            $table->string('hourly_rate');
            $table->string('your_self');
            $table->string('exam');
            $table->string('passing_year');
            $table->string('cgpa');
            $table->string('institute');
            $table->string('transcript');
            $table->string('level');
            $table->string('subject');
            $table->string('gender');
            $table->string('session_type');
            $table->string('price');
            $table->string('teaching_country');
            $table->string('state');
            $table->string('education_board');
            $table->string('district');
            $table->string('demo_video');
            $table->string('type_of_internet');
            $table->string('internet_speed_screen_short');
            $table->string('flexible_time');
            $table->string('current_occupation');
            $table->string('weekly_how_many_days_want_to_teach');
            $table->string('bank_name');
            $table->string('account_number');
            $table->string('account_type');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('tutor_basic_infos');
    }
}
