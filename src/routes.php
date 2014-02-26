<?php

Route::get(Config::get('photogallery::url_prefix').'photogallery/test', function(){

      /*  $imgs = [];

        $imgs[] = Image::make(file_get_contents('http://cf.geekdo-images.com/images/pic1935564_md.jpg'));
        //$imgs[] = Image::make(file_get_contents('http://cf.geekdo-images.com/images/pic1935559_md.jpg'));
       // $imgs[] = Image::make(file_get_contents('http://cf.geekdo-images.com/images/pic1531491_md.jpg'));
       // $imgs[] = Image::make(file_get_contents('http://cf.geekdo-images.com/images/pic454487_md.jpg'));
       // $imgs[] = Image::make(file_get_contents('http://cf.geekdo-images.com/images/pic233007_md.jpg'));
       // $imgs[] = Image::make(file_get_contents('http://3.bp.blogspot.com/-U-ix7sNCHDo/UhvdB9XjDdI/AAAAAAAAELo/gnblV9LwCl8/s1600/two_scorpions_from_diderots_encylopedia_cards-r007bcb5649674c2aa6b485d5a9acf09c_xvuat_8byvr_324.jpg'));

        foreach($imgs as $index => $img){
            if(isset($image)){
                $prev_height = $image->height;
                $image->resizeCanvas($image->width, $prev_height + $img->height + 100, 'top-left');
                //$img->opacity(50);
                //$image->insert($img, 0, $prev_height);
            } else {
                // (int $width, int $height, [string $anchor, [boolean $relative, [mixed $bgcolor]]])
                $image = $img;
                $image->resizeCanvas(null, 450, 'bottom-left', false, '#ff0546');
            }
        }

    //$image->crop(140, 140)->grayscale()->save(public_path().'/images/asd.jpg');
    return Response::make($image, 200, ['Content-Type' => 'image/jpg']);
    //return Response::make($imgs[0], 200, ['Content-Type' => 'image/jpg']);*/
});

Route::resource(Config::get('photogallery::url_prefix').'photogallery/photos', 'Ffy\Photogallery\PhotosController');