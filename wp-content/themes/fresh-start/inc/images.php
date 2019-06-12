<?php

add_theme_support('post-thumbnails', array('post','product'));
set_post_thumbnail_size( 360, 180, array( 'center', 'center')  );

add_image_size( 'shop-thumb', 320, 1600);
add_image_size( 'product-image', 500, 500);
add_image_size( 'product', 500, 500);

add_image_size( 'sixteen-nine', 720, 405, array( 'center', 'center'));
add_image_size( 'sixteen-nine-large', 1600, 900, array( 'center', 'center'));
add_image_size( 'twenty-one-nine', 1600, 675, array( 'center', 'center'));
add_image_size( 'four-three', 960, 720, array( 'center', 'center'));