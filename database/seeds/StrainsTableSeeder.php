<?php

use Illuminate\Database\Seeder;

class StrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_ENV') == 'local') {
            //  This is being run in the SeedCompaniesTableSeeder
            // DB::unprepared(File::get('database/sql/lucinda_2016-07-08.sql'));
            // So we're just going to return;
              return;
            } elseif(env('APP_ENV') == 'production') {
        die();
        } else {
            factory(Groid\Strain::class, 1)->create();
        }
    }
}
