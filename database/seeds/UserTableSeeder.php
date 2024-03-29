<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Administrator', 'password' => crypt('123456', 'wtf?'), 'email' => 'admin@gmail.com', 'tel' => "+84".mt_rand(1000000000, 9999999999), 'address' => 'Đà Nẵng', 'id_level' => 'admin', 'id_status' => 1],
            ['name' => 'Phan Thanh Sơn', 'password' => crypt('123456', 'wtf?'), 'email' => 'thanhson.itnic@gmail.com', 'tel' => "+84".mt_rand(1000000000, 9999999999), 'address' => 'Hà Nội', 'id_level' => 'admin', 'id_status' => 1],
            ['name' => 'Customer', 'password' => crypt('123456', 'wtf?'), 'email' => 'customer@gmail.com', 'tel' => "+84".mt_rand(1000000000, 9999999999), 'address' => 'Đà Nẵng', 'id_level' => 'customer', 'id_status' => 1],
            ['name' => 'Customer 2', 'password' => crypt('123456', 'wtf?'), 'email' => 'customer2@gmail.com', 'tel' => "+84".mt_rand(1000000000, 9999999999), 'address' => 'HCM', 'id_level' => 'customer', 'id_status' => 1],
        ]);
    }
}
