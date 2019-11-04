<?php

use Illuminate\Database\Seeder;

class PostTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_types')->insert([
            ['id' => 'about', 'name' => 'About'],
            ['id' => 'policies', 'name' => 'Policies'],
            ['id' => 'news', 'name' => 'News'],
            ['id' => 'service', 'name' => 'Service'],
            ['id' => 'contact', 'name' => 'Contact'],
        ]);
    }
}
