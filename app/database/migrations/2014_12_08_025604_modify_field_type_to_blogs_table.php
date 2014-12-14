<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyFieldTypeToBlogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
Schema::table('blogs', function($table) {

        $table->longText('text');
    }

        # FYI: We're skipping the 'tags' field for now; more on that later.
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
Schema::table('blogs', function($table) {

        $table->droplongText('text');
    }

		//$table->dropColumn(string|array);
	}

}
