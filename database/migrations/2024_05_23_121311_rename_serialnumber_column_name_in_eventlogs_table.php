<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameSerialnumberColumnNameInEventlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eventlogs', function (Blueprint $table) {
            $table->renameColumn('serialnumber', 'user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eventlogs', function (Blueprint $table) {
            $table->renameColumn('user_id', 'serialnumber');
        });
    }
}
