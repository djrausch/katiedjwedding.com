<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBbqResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bbq_responses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('attendee_id')->unsigned()->nullable();
            $table->foreign('attendee_id')->references('id')->on('attendees');
            $table->boolean('attending')->default(false);
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
        Schema::drop('bbq_responses');
    }
}
