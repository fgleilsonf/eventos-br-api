<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function(Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('media_event_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('title');
            $table->text('message');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->boolean('is_public');
            $table->foreign('media_event_id')->references('id')->on('medias_events')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::drop('events');
    }

}
