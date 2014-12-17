<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloggersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('bloggers', function($table) {
			# AI, PK
			$table->increments('id');
 
			# created_at, updated_at columns
			$table->timestamps();
 
			# General data...
			$table->string('name');
			$table->integer('age');
			$table->tinyinteger('gender');

			# Define foreign keys...
			# none needed

    });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bloggers');

	}

}
