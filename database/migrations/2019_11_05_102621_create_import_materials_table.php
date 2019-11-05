<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateImportMaterialsTable.
 */
class CreateImportMaterialsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('import_materials', function(Blueprint $table) {
            $table->increments('id');
			$table->string('id_material', 30);
			$table->decimal('price', 18, 3)->default(0);
			$table->unsignedInteger('quantity')->default(0);
			$table->text('description')->nullable();
			$table->unsignedInteger('id_user');
			$table->timestamps();

			$table->foreign('id_material')->references('id')->on('materials')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('import_materials');
	}
}
