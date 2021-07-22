<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_states', function (Blueprint $table) {
            $table->id();
            $table->integer('device_id');
            $table->integer('user_id');
            $table->boolean('channel1state')->default('0');
            $table->boolean('channel2state')->default('0');
            $table->boolean('channel3state')->default('0');
            $table->boolean('channel4state')->default('0');
            $table->string('IP_address')->default('0');
            $table->boolean('new_request')->default('0');
            $table->integer('channel1controlsource')->default('0');
            $table->integer('channel2controlsource')->default('0');
            $table->integer('channel3controlsource')->default('0');
            $table->integer('channel4controlsource')->default('0');
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
        Schema::dropIfExists('device_states');
    }
}
