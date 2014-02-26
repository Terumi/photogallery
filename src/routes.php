<?php

Route::resource(Config::get('photogallery::url_prefix').'photos', 'Ffy\Photogallery\PhotosController');