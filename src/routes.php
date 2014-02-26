<?php

Route::get('photogallery/test', function(){
    $image = Image::make(file_get_contents('http://cf.geekdo-images.com/images/pic1935564_md.jpg'));
    //$image->crop(140, 140)->grayscale()->save(public_path().'/images/asd.jpg');
    return Response::make($image, 200, ['Content-Type' => 'image/jpg']);
});

Route::resource(Config::get('photogallery::url_prefix').'photogallery/photos', 'Ffy\Photogallery\PhotosController');