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
            // So we're just going to...
              return;
            } elseif(env('APP_ENV') == 'production') {
        die();
        } else {
            factory(Groid\Strain::class, 1)->create();
        }
    }
}
