<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	Schema::create('blogs', function($table) {

        # Increments method will make a Primary, Auto-Incrementing field.
        # Most tables start off this way
        $table->increments('id');

        # This generates two columns: `created_at` and `updated_at` to
        # keep track of changes to a row
        $table->timestamps();

        # The rest of the fields...
        $table->text('title');
        $table->integer('blogger_id')->unsigned();
        $table->longText('text');
        $table->string('category');
        $table->integer('published');

		$table->foreign('blogger_id')->references('id')->on('bloggers');
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return vpopmail_del_domain(domain)
	 */
	public function down()
	{
	Schema::drop('blogs');
	}

}
