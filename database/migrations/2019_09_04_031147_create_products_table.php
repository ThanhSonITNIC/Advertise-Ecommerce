<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateProductsTable.
 */
class CreateProductsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->decimal('price', 18, 3)->default(0);
			$table->unsignedInteger('quantity')->default(0);
			$table->text('description')->nullable();
			$table->string('id_unit', 30)->nullable();
			$table->unsignedInteger('id_project');

			$table->foreign('id_unit')->references('id')->on('units')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('id_project')->references('id')->on('projects')->onUpdate('cascade')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}
}
