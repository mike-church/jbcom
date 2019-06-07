<?php
/*
Plugin Name: JB Feature Video
Plugin URI: https://www.julianbakery.com/
Description: Adds video to product slider.
Version: 2.0
Author: Michael Church
Author URI: https://www.julianbakery.com/
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
				'desc' => __( 'Enter YouTube Share URL', 'video_' ),
				'type'  => 'text',
			),
		),
	);

return $meta_boxes;
}