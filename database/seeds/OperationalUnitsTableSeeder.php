<?php

use Illuminate\Database\Seeder;

class OpsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Groid\Op::class, 1)->create();
    }
}
