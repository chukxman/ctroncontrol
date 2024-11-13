<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('device_name');
            $table->string('organization_name');
            $table->string('device_serialnumber');
            $table->string('location')->nullable();
            $table->string('channel1')->default('Channel1');
            $table->string('channel2')->default('Channel2');
            $table->string('channel3')->default('Channel3');
            $table->string('channel4')->default('Channel4');
            $table->integer('timezone')->nullable();
            $table->integer('user_id')->default('0');
            $table->string('devicekey')->default('0000');
            $table->integer('temperature')->default('0');
            $table->integer('engineer_id')->default('0');
            $table->boolean('channel1state')->default('0');
            $table->boolean('channel2state')->default('0');
            $table->boolean('channel3state')->default('0');
            $table->boolean('channel4state')->default('0');
            $table->timestamp('lastchannel1state')->nullable();
            $table->timestamp('lastchannel2state')->nullable();
            $table->timestamp('lastchannel3state')->nullable();
            $table->timestamp('lastchannel4state')->nullable();
            $table->timestamp('lastchannel1schedule')->nullable();
            $table->timestamp('lastchannel2schedule')->nullable();
            $table->timestamp('lastchannel3schedule')->nullable();
            $table->timestamp('lastchannel4schedule')->nullable();
            $table->timestamp('lastseen')->nullable();
            $table->integer('channel1controlsource')->default('0');
            $table->integer('channel2controlsource')->default('0');
            $table->integer('channel3controlsource')->default('0');
            $table->integer('channel4controlsource')->default('0');
            $table->boolean('newRequestC1')->default('0');
            $table->boolean('newRequestC2')->default('0');
            $table->boolean('newRequestC3')->default('0');
            $table->boolean('newRequestC4')->default('0');
            $table->boolean('newUpdateDetails')->default('0');
            $table->integer('c1counter')->default('0');
            $table->integer('c2counter')->default('0');
            $table->integer('c3counter')->default('0');
            $table->integer('c4counter')->default('0');
            $table->integer('c1Mon_On')->default('0');
            $table->integer('c1Mon_Off')->default('0');
            $table->integer('c1Tue_On')->default('0');
            $table->integer('c1Tue_Off')->default('0');
            $table->integer('c1Wed_On')->default('0');
            $table->integer('c1Wed_Off')->default('0');
            $table->integer('c1Thur_On')->default('0');
            $table->integer('c1Thur_Off')->default('0');
            $table->integer('c1Fri_On')->default('0');
            $table->integer('c1Fri_Off')->default('0');
            $table->integer('c1Sat_On')->default('0');
            $table->integer('c1Sat_Off')->default('0');
            $table->integer('c1Sun_On')->default('0');
            $table->integer('c1Sun_Off')->default('0');
            $table->integer('c2Mon_On')->default('0');
            $table->integer('c2Mon_Off')->default('0');
            $table->integer('c2Tue_On')->default('0');
            $table->integer('c2Tue_Off')->default('0');
            $table->integer('c2Wed_On')->default('0');
            $table->integer('c2Wed_Off')->default('0');
            $table->integer('c2Thur_On')->default('0');
            $table->integer('c2Thur_Off')->default('0');
            $table->integer('c2Fri_On')->default('0');
            $table->integer('c2Fri_Off')->default('0');
            $table->integer('c2Sat_On')->default('0');
            $table->integer('c2Sat_Off')->default('0');
            $table->integer('c2Sun_On')->default('0');
            $table->integer('c2Sun_Off')->default('0');
            $table->integer('c3Mon_On')->default('0');
            $table->integer('c3Mon_Off')->default('0');
            $table->integer('c3Tue_On')->default('0');
            $table->integer('c3Tue_Off')->default('0');
            $table->integer('c3Wed_On')->default('0');
            $table->integer('c3Wed_Off')->default('0');
            $table->integer('c3Thur_On')->default('0');
            $table->integer('c3Thur_Off')->default('0');
            $table->integer('c3Fri_On')->default('0');
            $table->integer('c3Fri_Off')->default('0');
            $table->integer('c3Sat_On')->default('0');
            $table->integer('c3Sat_Off')->default('0');
            $table->integer('c3Sun_On')->default('0');
            $table->integer('c3Sun_Off')->default('0');
            $table->integer('c4Mon_On')->default('0');
            $table->integer('c4Mon_Off')->default('0');
            $table->integer('c4Tue_On')->default('0');
            $table->integer('c4Tue_Off')->default('0');
            $table->integer('c4Wed_On')->default('0');
            $table->integer('c4Wed_Off')->default('0');
            $table->integer('c4Thur_On')->default('0');
            $table->integer('c4Thur_Off')->default('0');
            $table->integer('c4Fri_On')->default('0');
            $table->integer('c4Fri_Off')->default('0');
            $table->integer('c4Sat_On')->default('0');
            $table->integer('c4Sat_Off')->default('0');
            $table->integer('c4Sun_On')->default('0');
            $table->integer('c4Sun_Off')->default('0');
            $table->softDeletes();
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
        Schema::dropIfExists('devices');
    }
}
