<?php

return array(
    // change if you want to prefix something to the default photogallery/** (don't forget to write the '/' in the end)
    'url_prefix' => 'admin/',
    // the upload folder (it should be one level folder, otherwise, you should create  the structure manually)
    'upload_folder' => '/uploaded/',
    // how many photos should the index page should display each time. Zero disables pagination.
    'pagination_items' => 0,
    // the photos that exceed that width are going to be resized
    'max_width' => 960,
    // the photos that exceed that height are going to be resized
    'max_height' => 0
);
