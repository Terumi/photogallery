<?php namespace Ffy\Photogallery;

use Eloquent;

class Photo extends Eloquent {
	protected $guarded = array();
    protected $table = 'ffy_photos';
    public static $rules = array(
		'name' => 'required',
		'url' => 'required',
	);

    public function albums(){
        return $this->belongsToMany('Ffy\Photogallery\Album', 'ffy_album_photo');
    }

}
