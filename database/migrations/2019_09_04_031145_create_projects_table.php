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
			$table->longText('content')->nullable();
			$table->text('image')->nullable();
			$table->unsignedInteger('id_customer')->nullable();
			$table->decimal('subtotal', 18, 3)->nullable();
			$table->boolean('highlight');
			$table->date('start_at')->nullable();
			$table->date('finish_at')->nullable();
			$table->date('finished_at')->nullable();
			$table->string('id_type', 30)->nullable();
			$table->text('tags')->nullable();
			$table->boolean('published')->default(false);
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
