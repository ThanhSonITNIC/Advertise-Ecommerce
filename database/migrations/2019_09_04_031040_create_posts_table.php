<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePostsTable.
 */
class CreatePostsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
            $table->increments('id');
			$table->string('title');
			$table->string('slug');
			$table->string('image')->nullable();
			$table->text('description')->nullable();
			$table->longText('content')->nullable();
			$table->unsignedInteger('id_author');
			$table->string('id_type', 30)->nullable();
			$table->boolean('highlight')->default(false);
			$table->boolean('published')->default(false);
			$table->text('tags')->nullable();
			$table->timestamps();
			
			$table->foreign('id_type')->references('id')->on('post_types')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('id_author')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}
}
