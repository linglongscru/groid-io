<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStageDefaultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stage_defaults', function (Blueprint $table) {
            $table->increments('id');
            $table->string('growing_area_square_meters')->nullable();
            $table->string('lighting_type')->nullable();
            $table->string('lighting_watts')->nullable();
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
        Schema::drop('stage_defaults');
    }
}
