<?php

use Illuminate\Database\Seeder;


class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Groid\Tag::class, 1)->create();
    }
}
