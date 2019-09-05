<?php

use Illuminate\Database\Seeder;

class ProjectTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_types')->insert([
            ['id' => 'banghieu', 'name' => 'Bảng hiệu'],
            ['id' => 'matdungalu', 'name' => 'Mặt dựng ALU'],
            ['id' => 'chunoi', 'name' => 'Chữ nổi'],
            ['id' => 'sukien', 'name' => 'Sự kiện'],
            ['id' => 'noithat', 'name' => 'Nội thất'],
        ]);
    }
}
