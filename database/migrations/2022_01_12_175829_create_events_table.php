<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->text('photo_url')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('start_time');
            $table->string('event_length')->nullable();
            $table->integer('building_number')->nullable();
            $table->string('building_street_name')->nullable();
            $table->string('building_name')->nullable();
            $table->string('city')->nullable();
            $table->string('county')->nullable();
            $table->string('postal_code', 25)->nullable();
            $table->string('country')->nullable();
            $table->string('phone', 25)->nullable();
            $table->boolean('is_online')->default(0);
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
        Schema::dropIfExists('events');
    }
}
