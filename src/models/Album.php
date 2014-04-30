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
        if($this->photos()){
            return $this->photos()->first()->url;
        }
        return '';
    }

    public function randomPhoto(){
        if($this->photos()){
            dd($this->photos()->get()->random()->url);
        }
        return '';
    }
}
