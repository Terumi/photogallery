<?php

Route::group(array('prefix' => Config::get('photogallery::url_prefix')), function() {

    Route::get('photogallery/', function() {
        return View::make('photogallery::index');
    });

    Route::get('favorite/{id}', 'Ffy\Photogallery\PhotosController@favorite');
    Route::resource('photogallery/photos', 'Ffy\Photogallery\PhotosController');
    Route::get('photogallery/albums/assign/{id}', 'Ffy\Photogallery\AlbumsController@assign');
    Route::post('photogallery/addPhoto', 'Ffy\Photogallery\AlbumsController@addPhoto');
    Route::post('photogallery/removePhoto', 'Ffy\Photogallery\AlbumsController@removePhoto');
    Route::resource('photogallery/albums', 'Ffy\Photogallery\AlbumsController');

});


Route::get(Config::get('photogallery::url_prefix') . 'photogallery/test', function () {
    $imgs = array();
    $imgs[] = Image::make(file_get_contents('http://cf.geekdo-images.com/images/pic1935564_md.jpg'));
    $imgs[] = Image::make(file_get_contents('http://cf.geekdo-images.com/images/pic1935559_md.jpg'));
    $imgs[] = Image::make(file_get_contents('http://cf.geekdo-images.com/images/pic1531491_md.jpg'));
    $imgs[] = Image::make(file_get_contents('http://cf.geekdo-images.com/images/pic454487_md.jpg'));
    $imgs[] = Image::make(file_get_contents('http://cf.geekdo-images.com/images/pic233007_md.jpg'));
    foreach ($imgs as $index => $img) {
        if (isset($image)) {
            $prev_height = $image->height;
            $image->resizeCanvas($image->width, $prev_height + $img->height, 'top-left');
            $image->insert($img, 0, $prev_height);
        } else {
            $image = $img;
        }
    }
    return Response::make($image, 200, ['Content-Type' => 'image/jpg']);
});