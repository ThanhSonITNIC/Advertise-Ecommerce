<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['code' => 'r68twyeh', 'name' => 'product 1', 'price' => 10, 'quantity' => 5, 'description' => 'ahihi', 'id_unit' => 'cm', 'id_project' => 1],
            ['code' => '54657', 'name' => 'product 2', 'price' => 50, 'quantity' => 2, 'description' => 'deca', 'id_unit' => 'kg', 'id_project' => 1],
            ['code' => 'asgvjas', 'name' => 'product 2', 'price' => 75, 'quantity' => 1, 'description' => 'asddsadasdsa', 'id_unit' => 'box', 'id_project' => 1],

            ['code' => 'r68twyeh', 'name' => 'product 1', 'price' => 20, 'quantity' => 1, 'description' => 'asdsaasaac', 'id_unit' => 'slice', 'id_project' => 2],
            ['code' => '54657', 'name' => 'product 2', 'price' => 20, 'quantity' => 1, 'description' => 'vvvvvvv', 'id_unit' => 'slice', 'id_project' => 2],
            ['code' => '648wrygdshk', 'name' => 'product xxxx', 'price' => 70, 'quantity' => 10, 'description' => 'cc', 'id_unit' => 'slice', 'id_project' => 2],

            ['code' => 'cccccccc', 'name' => 'product ajda', 'price' => 20, 'quantity' => 100, 'description' => 'cc', 'id_unit' => 'slice', 'id_project' => 4],
            ['code' => 'cxxcccc', 'name' => 'product ssss dddda', 'price' => 10, 'quantity' => 500, 'description' => 'ccsss', 'id_unit' => 'slice', 'id_project' => 4],

            ['code' => 'cccccccc', 'name' => 'product ajda', 'price' => 30, 'quantity' => 2, 'description' => 'ccx', 'id_unit' => 'l', 'id_project' => 5],
            ['code' => 'cccccccc', 'name' => 'product adugudugsdd', 'price' => 25, 'quantity' => 1, 'description' => 'cxac', 'id_unit' => 'day', 'id_project' => 5],
        ]);
    }
}
