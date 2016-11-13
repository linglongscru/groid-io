<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cycle_id');
            $table->integer('air_temp_c')->unsigned()->nullable();
            $table->integer('co2_ppm')->unsigned()->nullable();
            $table->integer('relative_humidity')->unsigned()->nullable();
            $table->integer('water_temp_c')->unsigned()->nullable();
            $table->integer('water_level')->unsigned()->nullable;
            $table->float('ec')->unsigned()->nullable();
            $table->float('ph')->unsigned()->nullable();
            $table->float('runoff_ec')->unsigned()->nullable();
            $table->float('runoff_ph')->unsigned()->nullable();
            $table->string('notes')->nullable();
            $table->dateTime('time_of_record');
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
        Schema::drop('data');
    }
}
