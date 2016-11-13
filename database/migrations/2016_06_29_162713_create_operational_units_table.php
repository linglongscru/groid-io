<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationalUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operational_units', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('unit_name');
            $table->string('street_address')->default('1 Undisclosed Location Place');
            $table->string('city')->default('Incognito');
            $table->string('state')->default('AK');
            $table->string('zip')->default('99546');
            $table->integer('total_area_square_meters')->nullable();
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
        Schema::drop('operational_units');
    }
}
