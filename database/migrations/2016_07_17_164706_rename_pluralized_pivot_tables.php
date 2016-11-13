<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenamePluralizedPivotTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('data_photos', 'data_photo');
        Schema::rename('journals_photos', 'journal_photo');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('data_photo', 'data_photos');
        Schema::rename('journal_photo', 'journals_photos');
    }
}
