<?php

return array(
    // change if you want to prefix something to the default photogallery/** (don't forget to write the '/' in the end)
    'url_prefix' => 'admin/',
    // the upload folder (it should be one level folder, otherwise, you should create  the structure manually)
    'upload_folder' => '/uploaded/',
    // how many photos should the index page should display each time. Zero disables pagination.
    'pagination_items' => 12,
    // the photos that exceed that width are going to be resized / 0 is the default-do-nothing value
    'max_width' => 0,
    // the photos that exceed that height are going to be resized / 0 is the default-do-nothing value
    'max_height' => 0,
    // size crops the photo to the width/height values specified in the array. Again if either value is 0, size doesn't do shit
    'size' => array(0, 0),
    // change to grayscale?
    'greyscale' => false,
    // photo versions
    'versions' => array(
        // add as many arrays/versions you want here
        array(
            'upload_folder' => '/uploaded/thumbs/',
            'size' => array(100, 100),
            'greyscale' => true,
        ),
        array(
            'upload_folder' => '/uploaded/thumbs-color/',
            'size' => array(150, 80),
            'greyscale' => false,
        ),
    ),
);
