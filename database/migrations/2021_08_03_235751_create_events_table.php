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
            $table->string('name');
            $table->integer('max_speakers')->default(0);
            $table->foreignId('user_id');
            $table->date('reg_deadline');
            $table->unsignedInteger('manager');
            $table->boolean('published')->default(false); 
            $table->timestamps();
        });


        Schema::create('channel_event', function(Blueprint $table) {
            $table->id();
            $table->foreignId('channel_id')->cascade('delete');
            $table->foreignId('event_id')->cascade('delete');
            $table->string('venue')->nullable();
            $table->string('url')->nullable();
            $table->date('event_date');
            $table->string('zoom_id')->nullable();
            $table->time('time');
            $table->integer('max_capacity')->default(0); // Define the maximum person that channel can take
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
        Schema::dropIfExists('channel_event');
    }
}
