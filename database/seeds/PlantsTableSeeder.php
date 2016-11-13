<?php

use Illuminate\Database\Seeder;

class PlantsTableSeeder extends Seeder
{

    public function run()
    {
        factory(Groid\Plant::class, 1)->create();
    }
}
