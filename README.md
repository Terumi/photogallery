Photogallery
============
![Total Downloads](https://poser.pugx.org/ffy/photogallery/downloads.png) 

This is a Laravel 4.1 gallery package using bootstrap3, [Intervention Image] (http://intervention.olivervogel.net/) by Oliver Vogel and [bootstrap-tagsinput] (https://github.com/TimSchlechter/bootstrap-tagsinput) by Tim Schlechter

Installation
------------
1. install it throught composer by:
``composer require ffy/photogallery``

2. version:
``dev-master``

3. add this to the providers array on your config/app.php:
``'Ffy\Photogallery\PhotogalleryServiceProvider'``

4. add the intervention package to the providers array on your config/app.php:
``'Intervention\Image\ImageServiceProvider'``

5. add the intervention facade to the aliases array on your config/app.php:
``'Image' => 'Intervention\Image\Facades\Image',``

6. migrate the package tables with:
``php artisan migrate --package="ffy/photogallery"``

7. publish the package configuration file by:
``php artisan config:publish ffy/photogallery``

8. publish the package asset files by:
``php artisan asset:publish "ffy/photogallery"``

9. under app/config/packages/ffy you'll find the configuration file

Todos:
-------
- ~~add albums~~
- ~~add photo to albums relations~~
- ~~assign photos to albums~~
- ~~add index page~~
- ~~add navigation to master page~~
- ~~add active states~~
- ~~add tags to photos~~
- ~~add tags to albums~~
- ~~add tags plugin~~
- ~~add a 'favorite' flag to the images~~
- ~~add pagination~~
- ~~photo index page layout~~
- ~~photo upload page layout~~
- ~~photo edit page layout~~
- ~~add bootstrap3 /cdn~~
  * ~~set the markup in forms~~
- ~~upload files on upload~~
- ~~delete files on delete~~
- ~~add preview in edit photo~~
- ~~implement intervention~~
- ~~prefix tables~~
- ~~add TimSchlechter/bootstrap-tagsinput~~
- ~~add a config file~~
  * ~~add prefix~~
  * ~~add upload folder~~
  * ~~max photo width~~
  * ~~max photo height~~
  * ~~add multiple versions of the image~~
  * ~~add resize functionality~~
  * ~~add grayscale functionality~~
  * create sprites
  * add crop functionality
  * add instagram/hipster/derp filters (maybe)
  * add watermark thingy
- add facades
- drag and drop upload
- rerun all the configuration options for all photos uploaded
