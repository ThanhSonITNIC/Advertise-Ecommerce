<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateMaterialsTable.
 */
class CreateMaterialsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('materials', function(Blueprint $table) {
            $table->string('id', 30)->primary();
			$table->string('name');
			$table->decimal('price', 18, 3)->default(0);
			$table->unsignedInteger('quantity')->default(0);
			$table->text('description')->nullable();
			$table->string('id_unit', 30)->nullable();

			$table->foreign('id_unit')->references('id')->on('units')->onUpdate('cascade')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('materials');
	}
}
