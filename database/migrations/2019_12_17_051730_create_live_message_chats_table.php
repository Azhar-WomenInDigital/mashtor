<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiveMessageChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_message_chats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('from');
            $table->integer('to');
            $table->text('message');
            $table->tinyInteger('is_read');
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
        Schema::dropIfExists('live_message_chats');
    }
}
