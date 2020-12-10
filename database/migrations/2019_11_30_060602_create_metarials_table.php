<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetarialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metarials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('sub_title');
            $table->string('description');
            $table->string('image');
            $table->tinyInteger('status')->default(1);
            $table->string('position');
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
        Schema::dropIfExists('metarials');
    }
}
