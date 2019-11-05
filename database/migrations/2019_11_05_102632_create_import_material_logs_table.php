<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateImportMaterialLogsTable.
 */
class CreateImportMaterialLogsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('import_material_logs', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('id_import_material');
			$table->text('new_content');
			$table->text('old_content');
			$table->unsignedInteger('id_user');
			$table->timestamps();
			
			$table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('id_import_material')->references('id')->on('import_materials')->onUpdate('cascade')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('import_material_logs');
	}
}
