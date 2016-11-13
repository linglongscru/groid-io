<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStrainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('strains', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('lineage');
            $table->string('genetics')->nullable();
            $table->string('seed_company')->nullable();
            $table->text('description')->nullable();
            $table->string('url')->nullable();
            $table->string('qr')->nullable();
            $table->string('cannabis_reports_link')->nullable();
            $table->integer('flowering_time_min')->unsigned()->nullable();
            $table->integer('flowering_time_max')->unsigned()->nullable();
            $table->string('ucpc')->nullable()->unique();
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
        Schema::drop('strains');
    }
}
