<?php

use Illuminate\Database\Seeder;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->insert([
            ['id' => 'admin', 'name' => 'Administrator'],
            ['id' => 'customer', 'name' => 'Customer'],
        ]);
    }
}
