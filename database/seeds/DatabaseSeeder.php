<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(\ConfigureTableSeeder::class);
        $this->call(\LevelTableSeeder::class);
        $this->call(\UserStatusTableSeeder::class);
        $this->call(\UserTableSeeder::class);
        $this->call(\PostTypeTableSeeder::class);
        $this->call(\ProjectTypeTableSeeder::class);
        $this->call(\UnitTableSeeder::class);

        $this->call(\ProjectTableSeeder::class);
        $this->call(\MaterialTableSeeder::class);
    }
}
