<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings',
            function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained();
                $table->biginteger('admin_id')->unsigned()->nullable();
                $table->foreign('admin_id')->references('id')->on('users');
                $table->foreignId('service_id')->constrained();
                $table->dateTime('date');
                $table->string('meeting')->nullable();
                $table->string('score')->nullable();
                $table->string('scoreTime')->nullable();
                $table->string('scoreProfessionalism')->nullable();
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
        Schema::dropIfExists('meetings');
    }
}
