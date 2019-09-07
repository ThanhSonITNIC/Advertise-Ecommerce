<?php

use Illuminate\Database\Seeder;

class ProjectCommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_comments')->insert([
            ['id_project' => 1, 'content' => 'cmt', 'id_creator' => 1],

            ['id_project' => 3, 'content' => 'cmt 3 1', 'id_creator' => 1],
            ['id_project' => 3, 'content' => 'cmt 3 2', 'id_creator' => 3],
            ['id_project' => 3, 'content' => 'cmt 3 3', 'id_creator' => 1],
            ['id_project' => 3, 'content' => 'cmt 3 4', 'id_creator' => 2],
            ['id_project' => 3, 'content' => 'cmt 3 5', 'id_creator' => 3],

            ['id_project' => 5, 'content' => 'cmt 5 1', 'id_creator' => 4],
            ['id_project' => 5, 'content' => 'cmt 5 2', 'id_creator' => 2],
            ['id_project' => 5, 'content' => 'cmt 5 3', 'id_creator' => 4],
            ['id_project' => 5, 'content' => 'cmt 5 4', 'id_creator' => 2],
            ['id_project' => 5, 'content' => 'cmt 5 5', 'id_creator' => 2],
        ]);
    }
}
