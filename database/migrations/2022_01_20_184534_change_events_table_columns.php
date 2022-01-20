<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeEventsTableColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['start_time', 'event_length']);
            $table->renameColumn('photo_url', 'photo');
            $table->renameColumn('start_date', 'start_date_time');
            $table->renameColumn('building_street_name', 'street');
            $table->string('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->renameColumn('photo', 'photo_url');
            $table->renameColumn('start_date_time', 'start_date');
            $table->renameColumn('street', 'building_street_name');
            $table->datetime('start_time');
            $table->datetime('event_length');
        });
    }
}
