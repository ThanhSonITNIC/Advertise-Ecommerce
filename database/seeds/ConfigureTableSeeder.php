<?php

use Illuminate\Database\Seeder;

class ConfigureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configures')->insert([
            ['key' => 'email'],
            ['key' => 'tel'],
            ['key' => 'address'],
            ['key' => 'slogan'],
            ['key' => 'description'],
            ['key' => 'facebook'],
        ]);
    }
}
