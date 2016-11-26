<?php

use Illuminate\Database\Seeder;

class SeedCompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_ENV') == 'local') {
        DB::unprepared(File::get('database/sql/lucinda_2016-07-08.sql'));
        } elseif (env('APP_ENV') == 'production') {
            die();
        }
        else{
            factory(Groid\SeedCompany::class, 1)->create();
        }

    }
}
