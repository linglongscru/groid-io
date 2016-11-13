<?php

use Illuminate\Database\Seeder;

class JournalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Groid\Journal::class, 1)->create();
    }
}
