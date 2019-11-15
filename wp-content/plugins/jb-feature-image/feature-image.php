<?php
/*
Plugin Name: JB Feature Image
Plugin URI: https://www.julianbakery.com/
Description: Adds feature image to the top of the product page.
Version: 1.0
Author: Michael Church
Author URI: https://www.julianbakery.com/
License: GPLv2
*/

// Metabox

add_filter( 'rwmb_meta_boxes', 'feature_image_register_meta_boxes' );
function feature_image_register_meta_boxes( $meta_boxes )
{
	$prefix = 'feature_image_';

	$meta_boxes[] = array(
		'title'  => __( 'Featue Image', 'video_' ),
		'post_types' => 'product',
		'context'    => 'side',
		'priority'   => 'low',
		'fields' => array(
			// IMAGE UPLOAD
			array(
				'id' 				=> "{$prefix}image",
				'type' 				=> 'image_advanced',
				'force_delete' 		=> false,
				'max_file_uploads' 	=> 1,
				'max_status' 		=> 'false',
				'image_size' 		=> 'thumbnail',
			),
		),
	);

return $meta_boxes;
}