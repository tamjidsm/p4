<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogCatelogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('blog_catelog', function($table) {

			# General data...
			$table->integer('blog_id')->unsigned();
			$table->integer('catelog_id')->unsigned();
			
			# Define foreign keys...
			$table->foreign('blog_id')->references('id')->on('blogs');
			$table->foreign('catelog_id')->references('id')->on('catelogs');
			
		});


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('blog_catelog');
	}

}
