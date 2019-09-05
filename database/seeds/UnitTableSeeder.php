<?php

use Illuminate\Database\Seeder;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            ['id' => 'cm', 'name' => 'Centimetre'],
            ['id' => 'kg', 'name' => 'Kilogram'],
            ['id' => 'slice', 'name' => 'Slice'],
            ['id' => 'box', 'name' => 'Box'],
            ['id' => 'day', 'name' => 'Day'],
            ['id' => 'l', 'name' => 'Litre'],
        ]);
    }
}
