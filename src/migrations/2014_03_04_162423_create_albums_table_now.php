<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAlbumsTableNow extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('ffy_albums', function(Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->text('tags');
			$table->text('description');
			$table->timestamps('');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	    Schema::drop('ffy_albums');
	}

}
