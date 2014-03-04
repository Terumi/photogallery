<?php

Route::get(Config::get('photogallery::url_prefix') . 'photogallery/', function () {
        return View::make('photogallery::index');
    });
Route::get(Config::get('photogallery::url_prefix') . 'favorite/{id}', 'Ffy\Photogallery\PhotosController@favorite');
Route::resource(Config::get('photogallery::url_prefix') . 'photogallery/photos', 'Ffy\Photogallery\PhotosController');
Route::get(Config::get('photogallery::url_prefix') . 'photogallery/assign/{id}', 'Ffy\Photogallery\AlbumsController@assign');
Route::resource(Config::get('photogallery::url_prefix') . 'photogallery/albums', 'Ffy\Photogallery\AlbumsController');

Route::get(Config::get('photogallery::url_prefix') . 'photogallery/test', function () {
        $imgs = [];
        $imgs[] = Image::make(file_get_contents('http://cf.geekdo-images.com/images/pic1935564_md.jpg'));
        $imgs[] = Image::make(file_get_contents('http://cf.geekdo-images.com/images/pic1935559_md.jpg'));
        $imgs[] = Image::make(file_get_contents('http://cf.geekdo-images.com/images/pic1531491_md.jpg'));
        $imgs[] = Image::make(file_get_contents('http://cf.geekdo-images.com/images/pic454487_md.jpg'));
        $imgs[] = Image::make(file_get_contents('http://cf.geekdo-images.com/images/pic233007_md.jpg'));
        foreach ($imgs as $index => $img) {
            if (isset($image)) {
                $prev_height = $image->height;
                $image->resizeCanvas($image->width, $prev_height + $img->height, 'top-left');
                //$img->opacity(50);
                $image->insert($img, 0, $prev_height);
            } else {
                // (int $width, int $height, [string $anchor, [boolean $relative, [mixed $bgcolor]]])
                $image = $img;
                //$image->resizeCanvas(null, 450, 'top-left', false, '#ff0546');
            }
        }
        // $image->pixelate(2)->blur(15);
        //$image->crop(140, 140)->grayscale()->save(public_path().'/images/asd.jpg');
        return Response::make($image, 200, ['Content-Type' => 'image/jpg']);
        //return Response::make($imgs[0], 200, ['Content-Type' => 'image/jpg']);*/
    });

