<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateProjectContentsTable.
 */
class CreateProjectContentsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('project_contents', function(Blueprint $table) {
			$table->unsignedInteger('id')->primary();
			$table->longText('content')->nullable();

			$table->foreign('id')->references('id')->on('projects')->onUpdate('cascade')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('project_contents');
	}
}
