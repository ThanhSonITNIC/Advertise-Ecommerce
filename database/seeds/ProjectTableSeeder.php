<?php

use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            ['name' => 'this is project', 'slug' => 'this-is-project', 'description' => 'this is description', 'customer' => 'CT 1', 'id_customer' => null, 'price' => '100', 'highlight' => true, 'id_type' => 'banghieu'],
            ['name' => 'this is project 2', 'slug' => 'this-is-project2', 'description' => 'this is description 2', 'customer' => 'CT 2', 'id_customer' => null, 'price' => '200', 'highlight' => false, 'id_type' => 'sukien'],
            ['name' => 'this is project 3', 'slug' => 'this-is-project3', 'description' => 'this is description 3', 'customer' => null, 'id_customer' => 3, 'price' => '350', 'highlight' => true, 'id_type' => 'sukien'],
            ['name' => 'this is project 4', 'slug' => 'this-is-project4', 'description' => 'this is description 4', 'customer' => null, 'id_customer' => 3, 'price' => '500', 'highlight' => false, 'id_type' => 'noithat'],
            ['name' => 'this is project 5', 'slug' => 'this-is-project5', 'description' => 'this is description 5', 'customer' => 'CT 4', 'id_customer' => 4, 'price' => '1000', 'highlight' => false, 'id_type' => 'banghieu'],
        ]);
    }
}
