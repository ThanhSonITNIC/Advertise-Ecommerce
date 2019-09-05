<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateProjectCommentsTable.
 */
class CreateProjectCommentsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('project_comments', function(Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('id_project');
			$table->string('content');
			$table->string('id_creator', 15);
			$table->timestamps();
			
			$table->foreign('id_project')->references('id')->on('projects')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('id_creator')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('project_comments');
	}
}
