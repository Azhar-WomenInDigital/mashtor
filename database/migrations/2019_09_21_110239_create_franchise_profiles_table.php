<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFranchiseProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('franchise_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('lisence');
            $table->string('nid');
            $table->string('owner_gender');
            $table->string('owner_current_profession');
            $table->string('business_location');
            $table->string('back_account_details');
            $table->string('type_of_internet');
            $table->string('internet_speed_screenshot');
            $table->string('class_room_pic');
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
        Schema::dropIfExists('franchise_profiles');
    }
}
