<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('stages', function (Blueprint $table) {
              $table->increments('id');
              $table->integer('user_id')->unsigned();
              $table->integer('cycle_id')->unsigned()->nullable();
              $table->string('name');
              $table->text('description')->nullable();
              $table->date('start_date');
              $table->date('end_date');
              $table->string('lighting');
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
        Schema::drop('stages');
    }
}
