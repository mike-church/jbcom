<?php
/*
Plugin Name: JB Product Notice
Plugin URI: https://www.julianbakery.com/
Description: Used to add a notice to a single product page.
Version: 1.0
Author: Michael Church
Author URI: https://julianbakery.com/
License: GPLv2
*/

// Metabox

add_filter( 'rwmb_meta_boxes', 'jb_product_notice_register_meta_boxes' );
function jb_product_notice_register_meta_boxes( $meta_boxes )
{
	$prefix = 'jb_product_notice_';

	$meta_boxes[] = array(
		'title'  => 'Product Notice',
		'post_types' => 'product',
		'context'    => 'normal',
		'priority'   => 'low',
		'fields' => array(

			//WYSIWYG
			array(
				'name'    => 'Notice',
				'id'      => "{$prefix}notice",
				'type'    => 'wysiwyg',
				'raw'     => false,
				'options' => array(
					'textarea_rows' => 4,
					'teeny'         => true,
					'media_buttons' => false,
				),
			),
		),
	);

return $meta_boxes;
}


function jb_notices() {
	$jb_notice = rwmb_meta( 'jb_product_notice_notice' );
	if ( ! empty( $jb_notice ) ) { ?> <div class="alert alert-primary product-alert mb-4"><?php echo $jb_notice;?></div> <?php };
}
add_action( 'woocommerce_single_product_summary', 'jb_notices', 70 );


