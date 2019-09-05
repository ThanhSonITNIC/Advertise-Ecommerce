<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateProjectsTable.
 */
class CreateProjectsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('slug');
			$table->text('description')->nullable();
			$table->text('images')->nullable();
			$table->string('customer')->nullable();
			$table->decimal('price', 18, 3)->default(0);
			$table->boolean('highlight');
			$table->date('start_at')->useCurrent();
			$table->date('finished_at')->nullable();
			$table->string('id_type', 30)->nullable();
			$table->string('id_customer', 15)->nullable();
			$table->text('tags')->nullable();
			$table->timestamps();
			
			$table->foreign('id_type')->references('id')->on('project_types')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('id_customer')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projects');
	}
}
