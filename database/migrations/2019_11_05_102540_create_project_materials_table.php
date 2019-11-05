<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateProjectMaterialsTable.
 */
class CreateProjectMaterialsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('project_materials', function(Blueprint $table) {
			$table->string('id', 30)->primary();
			$table->unsignedInteger('id_project');
			$table->string('id_material', 30);
			$table->decimal('price', 18, 3)->default(0);
			$table->unsignedInteger('quantity')->default(0);
			$table->string('description')->nullable();
            $table->timestamps();

			$table->foreign('id_project')->references('id')->on('projects')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('id_material')->references('id')->on('materials')->onUpdate('cascade')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('project_materials');
	}
}
