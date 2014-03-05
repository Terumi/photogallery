<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumPhotoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('ffy_album_photo', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('album_id')->references('id')->on('ffy_albums')->onDelete('cascade');
            $table->integer('photo_id')->references('id')->on('ffy_photos')->onDelete('cascade');
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
        Schema::drop('ffy_album_photo');
	}

}
