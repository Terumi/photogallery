Photogallery
============
This is a Laravel 4.1 gallery package using bootstrap3 and [Intervention Image] (http://intervention.olivervogel.net/) by Oliver Vogel

Installation
------------
1. add this to the providers array on your config/app.php:
``'Ffy\Photogallery\PhotogalleryServiceProvider'``

2. add the intervention package to the providers array on your config/app.php:
``'Intervention\Image\ImageServiceProvider'``

3. add the intervention facade to the aliases array on your config/app.php:
``'Image' => 'Intervention\Image\Facades\Image',``

4. migrate the package tables with:
``php artisan migrate --package="vendor/package"``

Todos:
-------
- add albums
- add a 'favorite' flag to the images
- add bootstrap3 /cdn
  * set the markup in forms
- upload files
- ~~implement intervension~~
- ~~add a config file~~
  * ~~add prefix~~
  * ~~add upload folder~~
  * add multiple versions of the image
  * add resize functionality
  * add crop functionality
  * add grayscale functionality
- ~~prefix tables~~
