<?php namespace Ffy\Photogallery;

class Album extends \Eloquent {
    protected $table = 'ffy_albums';
    protected $fillable = ['name', 'description', 'tags'];
    public static $rules = array(
        'name' => 'required'
    );

    public function photos(){
        return $this->belongsToMany('Ffy\Photogallery\Photo', 'ffy_album_photo')->withTimestamps();
    }

    public function firstPhoto(){
        return $this->photos()->first()->url;
    }

    public function randomPhoto(){
        dd($this->photos()->get()->random()->url);
    }
}
