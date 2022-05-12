<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->decimal('absenceTime', $precision = 8, $scale = 1)->nullable();
            $table->string('officeName')->nullable();
            $table->string('officePhoto')->nullable();
            $table->string('officeDescription')->nullable();
            $table->string('officeAddress')->nullable();
            $table->string('officeRut')->nullable();
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
        Schema::dropIfExists('configurations');
    }
}
