Photogallery
============
![Total Downloads](https://poser.pugx.org/ffy/photogallery/downloads.png)

This is a Laravel 4.1 gallery package using bootstrap3, [Intervention Image] (http://intervention.olivervogel.net/) by Oliver Vogel and [bootstrap-tagsinput] (https://github.com/TimSchlechter/bootstrap-tagsinput) by Tim Schlechter

Installation
------------
1. Install it through composer: <br>
``composer require ffy/photogallery``

2. Version: <br>
``dev-master``

3. Add this to the providers array in your config/app.php: <br>
``'Ffy\Photogallery\PhotogalleryServiceProvider',``

4. Add the intervention package to the providers array in your config/app.php: <br>
``'Intervention\Image\ImageServiceProvider',``

5. Add the intervention facade to the aliases array on your config/app.php: <br>
``'Image' => 'Intervention\Image\Facades\Image',``

6. Migrate the package tables: <br>
``php artisan migrate --package="ffy/photogallery"``

7. Publish the package configuration file: <br>
``php artisan config:publish ffy/photogallery``

8. Publish the package asset files: <br>
``php artisan asset:publish "ffy/photogallery"``

**Under app/config/packages/ffy you will find the configuration file**

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
- sort names
- better css
- add facades
- drag and drop upload
- rerun all the configuration options for all photos uploaded
