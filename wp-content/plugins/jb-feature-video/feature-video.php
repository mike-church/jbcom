<?php
/*
Plugin Name: Julian Bakery Feature Video
Plugin URI: http://fishinglounge.com/
Description: This plugin is an add-on for woocommerce. Its adds a field to enter a YouTube ID as a feature video for a product.
Version: 1.0
Author: Michael Church
Author URI: http://fishinglounge.com/
License: GPLv2
*/

// Metabox

add_filter( 'rwmb_meta_boxes', 'feature_video_register_meta_boxes' );
function feature_video_register_meta_boxes( $meta_boxes )
{
	$prefix = 'video_';

	$meta_boxes[] = array(
		'title'  => __( 'Featue Video', 'video_' ),
		'post_types' => 'product',
		'context'    => 'side',
		'priority'   => 'low',
		'fields' => array(
			// TEXT
			array(
				'name'  => __( 'YouTube ID', 'nutrition_' ),
				'id'    => "{$prefix}youtube_id",
				'desc' => __( 'Eample: 5upIQDYKhHs', 'video_' ),
				'type'  => 'text',
			),
		),
	);

return $meta_boxes;
}