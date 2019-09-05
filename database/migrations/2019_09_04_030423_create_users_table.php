<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUsersTable.
 */
class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30)->nullable();
            $table->string('password')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('tel', 15)->nullable();
            $table->string('address')->nullable();
            $table->string('id_level', 30)->default('customer');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('provider')->nullable();
            $table->string('id_provider')->nullable();
            $table->integer('status')->default(1);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_level')->references('id')->on('levels')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}
}
