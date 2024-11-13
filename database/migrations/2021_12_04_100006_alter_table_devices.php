<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableDevices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('devices', function (Blueprint $table) {
            $table->integer('manualoverride')->nullable();
            $table->integer('poweronstate')->nullable();
            $table->string('channel1statesetby')->default('user');
            $table->string('channel2statesetby')->default('user');
            $table->string('channel3statesetby')->default('user');
            $table->string('channel4statesetby')->default('user');
            $table->string('channel1schedulesetby')->default('user');
            $table->string('channel2schedulesetby')->default('user');
            $table->string('channel3schedulesetby')->default('user');
            $table->string('channel4schedulesetby')->default('user');
            $table->string('mac_address')->default('00:00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('devices', function (Blueprint $table) {
            $table->dropColumn('manualoverride');
            $table->dropColumn('poweronstate');
            $table->dropColumn('channel1statesetby');
            $table->dropColumn('channel2statesetby');
            $table->dropColumn('channel3statesetby');
            $table->dropColumn('channel4statesetby');
            $table->dropColumn('channel1schedulesetby');
            $table->dropColumn('channel2schedulesetby');
            $table->dropColumn('channel3schedulesetby');
            $table->dropColumn('channel4schedulesetby');
            $table->dropColumn('mac_address');
        });
    }
}
