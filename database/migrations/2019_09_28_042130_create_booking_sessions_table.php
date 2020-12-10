<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_sessions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sutdent_id');
            $table->integer('tutor_id');
            $table->string('subject');
            $table->string('message');
            $table->string('session');
            $table->string('session_type');
            $table->string('schedule');
            $table->string('repeat');
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
        Schema::dropIfExists('booking_sessions');
    }
}
