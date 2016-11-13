<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagPivotTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_tag', function(Blueprint $table)
        {
            $table->integer('data_id')->unsigned();
            $table->integer('tag_id')->unsigned();
        });
        Schema::create('journal_tag', function(Blueprint $table)
        {
            $table->integer('journal_id')->unsigned();
            $table->integer('tag_id')->unsigned();
        });
        Schema::create('photo_tag', function(Blueprint $table)
        {
            $table->integer('photo_id')->unsigned();
            $table->integer('tag_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('data_tag');
        Schema::drop('journal_tag');
        Schema::drop('photo_tag');
    }
}
