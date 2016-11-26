<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_ENV') == 'production'){
//            die('The application has died, horribly. Don\'t seed fake data to production, goofball');
        }
        $this->call(CyclesTableSeeder::class);
        $this->call(JournalsTableSeeder::class);
        $this->call(OpsTableSeeder::class);
        $this->call(PhotosTableSeeder::class);
        $this->call(PlantsTableSeeder::class);
        $this->call(StagesTableSeeder::class);
        $this->call(DataTableSeeder::class);
        $this->call(SeedCompaniesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(StrainsTableSeeder::class);
        $this->call(TagsTableSeeder::class);

        Model::reguard();
    }
}
