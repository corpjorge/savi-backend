<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->time('check_in_time')->default('08:00:00');
            $table->time('check_out_time')->default('17:00:00');
            $table->time('check_in_weekend_time')->default('08:00:00');
            $table->time('check_out_weekend_time')->default('12:00:00');
            $table->time('lunch_time')->default('12:00:00');
            $table->integer('lunch_duration_minutes')->default(60);
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
        Schema::dropIfExists('offices');
    }
}
