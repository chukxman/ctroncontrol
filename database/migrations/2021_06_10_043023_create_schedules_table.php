<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('device_id');
            $table->integer('user_id');
            $table->time('c1Mon_On')->default('00:00:00');
            $table->time('c1Mon_Off')->default('00:00:00');
            $table->time('c1Tue_On')->default('00:00:00');
            $table->time('c1Tue_Off')->default('00:00:00');
            $table->time('c1Wed_On')->default('00:00:00');
            $table->time('c1Wed_Off')->default('00:00:00');
            $table->time('c1Thur_On')->default('00:00:00');
            $table->time('c1Thur_Off')->default('00:00:00');
            $table->time('c1Fri_On')->default('00:00:00');
            $table->time('c1Fri_Off')->default('00:00:00');
            $table->time('c1Sat_On')->default('00:00:00');
            $table->time('c1Sat_Off')->default('00:00:00');
            $table->time('c1Sun_On')->default('00:00:00');
            $table->time('c1Sun_Off')->default('00:00:00');
            $table->time('c2Mon_On')->default('00:00:00');
            $table->time('c2Mon_Off')->default('00:00:00');
            $table->time('c2Tue_On')->default('00:00:00');
            $table->time('c2Tue_Off')->default('00:00:00');
            $table->time('c2Wed_On')->default('00:00:00');
            $table->time('c2Wed_Off')->default('00:00:00');
            $table->time('c2Thur_On')->default('00:00:00');
            $table->time('c2Thur_Off')->default('00:00:00');
            $table->time('c2Fri_On')->default('00:00:00');
            $table->time('c2Fri_Off')->default('00:00:00');
            $table->time('c2Sat_On')->default('00:00:00');
            $table->time('c2Sat_Off')->default('00:00:00');
            $table->time('c2Sun_On')->default('00:00:00');
            $table->time('c2Sun_Off')->default('00:00:00');
            $table->time('c3Mon_On')->default('00:00:00');
            $table->time('c3Mon_Off')->default('00:00:00');
            $table->time('c3Tue_On')->default('00:00:00');
            $table->time('c3Tue_Off')->default('00:00:00');
            $table->time('c3Wed_On')->default('00:00:00');
            $table->time('c3Wed_Off')->default('00:00:00');
            $table->time('c3Thur_On')->default('00:00:00');
            $table->time('c3Thur_Off')->default('00:00:00');
            $table->time('c3Fri_On')->default('00:00:00');
            $table->time('c3Fri_Off')->default('00:00:00');
            $table->time('c3Sat_On')->default('00:00:00');
            $table->time('c3Sat_Off')->default('00:00:00');
            $table->time('c3Sun_On')->default('00:00:00');
            $table->time('c3Sun_Off')->default('00:00:00');
            $table->time('c4Mon_On')->default('00:00:00');
            $table->time('c4Mon_Off')->default('00:00:00');
            $table->time('c4Tue_On')->default('00:00:00');
            $table->time('c4Tue_Off')->default('00:00:00');
            $table->time('c4Wed_On')->default('00:00:00');
            $table->time('c4Wed_Off')->default('00:00:00');
            $table->time('c4Thur_On')->default('00:00:00');
            $table->time('c4Thur_Off')->default('00:00:00');
            $table->time('c4Fri_On')->default('00:00:00');
            $table->time('c4Fri_Off')->default('00:00:00');
            $table->time('c4Sat_On')->default('00:00:00');
            $table->time('c4Sat_Off')->default('00:00:00');
            $table->time('c4Sun_On')->default('00:00:00');
            $table->time('c4Sun_Off')->default('00:00:00');
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
        Schema::dropIfExists('schedules');
    }
}
