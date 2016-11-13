<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpDefaultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('op_defaults', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('op')->default(0)->unsigned();
            $table->string('default_strain')->nullable();
            $table->string('default_medium')->nullable();
            $table->string('default_grow_style')->default('none')->nullable();
            $table->string('default_grow_type')->default('indoor')->nullable();
            $table->string('default_grow_orientation')->default('horizontal');
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
        Schema::drop('op_defaults');
    }
}
