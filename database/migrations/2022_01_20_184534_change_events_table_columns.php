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
            $table->dropColumn('start_time');
            $table->string('email')->nullable();
        });
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('event_length');
        });
        Schema::table('events', function (Blueprint $table) {
            $table->renameColumn('building_street_name', 'street');
        });
        Schema::table('events', function (Blueprint $table) {
            $table->renameColumn('start_date', 'start_date_time');
        });
        Schema::table('events', function (Blueprint $table) {
            $table->renameColumn('photo_url', 'photo');
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
            $table->renameColumn('photo', 'photo_url');
        });
        Schema::table('events', function (Blueprint $table) {
            $table->renameColumn('start_date_time', 'start_date');
        });
        Schema::table('events', function (Blueprint $table) {
            $table->renameColumn('street', 'building_street_name');
        });
        Schema::table('events', function (Blueprint $table) {
            $table->datetime('event_length');
        });
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->datetime('start_time');
        });
    }
}
