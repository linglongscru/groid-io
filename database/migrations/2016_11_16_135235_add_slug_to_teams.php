<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugToTeams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->string('slug')->after('name')->nullable();
        });

        $this->generateSlugForExistingTeams();

        $this->makeSureSlugsAreUnique();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }

    /**
     *  Generates a slug for existing teams.
     *
     *  $return void
     */
    private function generateSlugForExistingTeams()
    {
        Groid\Team::each(function($team){
            $team->update([
                'slug' => Str::slug($team->name)
            ]);
        });
    }

    /**
     * Ensure that all teams have a unique slug.
     *
     * @return void
     */
    private function makeSureSlugsAreUnique()
    {
        $duplicates = DB::table('teams')->select('slug')
            ->groupBy('slug')
            ->havingRaw('COUNT(*) > 1')
            ->pluck('slug');

        Groid\Team::whereIn('slug', $duplicates->toArray())->each(function($team, $key){
            $team->update([
                'slug' => $team->slug.$key
            ]);
        });

        Schema::table('teams', function (Blueprint $table) {
            $table->unique('slug');
        });
    }
}
