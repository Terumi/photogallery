<?php namespace Ffy\Photogallery;

use Eloquent;

class Photo extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'url' => 'required',
		'alt' => 'required'
	);
}
