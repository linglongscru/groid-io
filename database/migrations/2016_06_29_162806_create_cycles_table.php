<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cycles', function (Blueprint $table) {

                $table->increments('id');
                $table->integer('op_id')->unsigned();
                $table->string('name');
                $table->text('description');
                $table->date('start_date');
                $table->date('end_date');
                $table->string('medium');
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
        Schema::drop('cycles');
    }
}
