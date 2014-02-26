Photogallery
============
This is a Laravel 4.1 gallery package using bootstrap3

installation
------------
add this to the providers array on your config/app.php:

``'Ffy\Photogallery\PhotogalleryServiceProvider'``

migrate the package tables with

``php artisan migrate --package="vendor/package"``

todos:
-------
- add bootstrap3 /cdn
  * set the markup in forms
- upload files
- implement intervension
- add a config file
- ~~prefix tables~~
