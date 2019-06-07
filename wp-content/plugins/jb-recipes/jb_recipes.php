<?php
/*
Plugin Name: JB Recipes
Plugin URI: https://www.julianbakery.com/
Description: This plugin manages recipe.
Version: 1.0
Author: Michael Church
Author URI: https://www.julianbakery.com/
License: GPLv2
*/

// REGISTER POST TYPE
add_action( 'init', 'jb_recipe_post_type' );

function jb_recipe_post_type() {
  register_post_type( 'jb_recipe',
    array(
      'labels' => array(
        'name' => 'Recipes',
        'singular_name' => 'recipe',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New',
        'edit' => 'Edit',
        'edit_item' => 'Edit',
        'new_item' => 'New Recipe',
        'view' => 'View',
        'view_item' => 'View',
        'search_items' => 'Search',
        'not_found' => 'Not found',
        'not_found_in_trash' => 'Not found in Trash',
      ),
      'public' => true,
      'menu_position' => 5,
      'supports' => array( 'title', 'thumbnail' ),
      'taxonomies' => array( '' ),
      'menu_icon' => 'dashicons-admin-post',
      'has_archive' => false,
      'rewrite' => array('with_front' => false, 'slug' => 'recipe'),
      'capability_type' => 'post',
    )
  );
}

// TAXONOMIES
add_action( 'init', 'jb_recipe_cat', 0 );
function jb_recipe_cat() {
  register_taxonomy(
    'jb_recipe_cat',
    'jb_recipe',
    array(
      'labels' => array(
        'name' => 'Category',
        'menu_name' => 'Category',
        'add_new_item' => 'Add New Category',
        'new_item_name' => 'New Category'
      ),
      'show_ui' => true,
      'show_in_menu' => true,
      'show_tagcloud' => false,
      'hierarchical' => true,
      'sort' => true,      
      'args' => array( 'orderby' => 'term_order' ),
      'show_admin_column' => true,
      'rewrite' => array('with_front' => false, 'slug' => 'recipe-category'),
    )
  );
}

// Metabox
add_filter( 'rwmb_meta_boxes', 'jb_recipe_register_meta_boxes' );
function jb_recipe_register_meta_boxes( $meta_boxes )
{
  $prefix = 'jb_recipe_';

  $meta_boxes[] = array(
    'title'  => 'recipe',
    'post_types' => 'jb_recipe',
    'context'    => 'normal',
    'priority'   => 'high',
    'fields' => array(


		// IMAGE ADVANCED (WP 3.5+)
		array(
			'name' => 'Desktop Image',
			'id' => "{$prefix}desktop_image",
			'type' => 'image_advanced',
			'max_file_uploads' => 1,
		),

		// IMAGE ADVANCED (WP 3.5+)
		array(
			'name' => 'Mobile Image',
			'id' => "{$prefix}mobile_image",
			'type' => 'image_advanced',
			'max_file_uploads' => 1,
		),


		// TEXT
		array(
		    'name'        => 'Alt Text',
		    'id'          => "{$prefix}alt_text",
		    'type'        => 'text',
		    'placeholder' => 'Enter Image Alt Text',
		    'size'        => 30,
		),

		// HEADING
		array(
			'type' => 'heading',
			'name' => 'Color',
		),


		// SELECT
		array(
			'name' 	=> 'Background Color',
			'id'		=> "{$prefix}background_color",
			'type'	=> 'select',
			// Array of 'value' => 'Label' pairs
			'options'	=> array(
				'mdc-bg-red-'			=> 'Red',
				'mdc-bg-pink-'			=> 'Pink',
				'mdc-bg-purple-'		=> 'Purple',
				'mdc-bg-deep-purple-'	=> 'Deep Purple',
				'mdc-bg-indigo-'		=> 'Indigo',
				'mdc-bg-blue-'     		=> 'Blue',
				'mdc-bg-light-blue-'	=> 'Light Blue',
				'mdc-bg-cyan-'			=> 'Cyan',
				'mdc-bg-teal-'        	=> 'Teal',
				'mdc-bg-green-'			=> 'Green',
				'mdc-bg-light-green-'   => 'Light Green',
				'mdc-bg-lime-'        	=> 'Lime',
				'mdc-bg-yellow-'		=> 'Yellow',
				'mdc-bg-amber-'			=> 'Amber',
				'mdc-bg-orange-'     	=> 'Orange',
				'mdc-bg-deep-orange-'	=> 'Deep Orange',
				'mdc-bg-deep-brown-'	=> 'Brown',					
				'mdc-bg-blue-grey-'		=> 'Blue Grey',
			),
			'multiple'        => false,
			'placeholder'     => 'Select a Color',
			'select_all_none' => false,
		),


		// SELECT
		array(
			'name' 	=> 'Color Value',
			'id'		=> "{$prefix}color_value",
			'type'	=> 'select',
			// Array of 'value' => 'Label' pairs
			'options'	=> array(
				'50'	=> '50',
				'100'	=> '100',
				'200'	=> '200',
				'300'	=> '300',
				'400'	=> '400',
				'500'	=> '500',
				'600'	=> '600',
				'700'	=> '700',
				'800'	=> '800',
				'900'	=> '900',
				'A100'	=> 'A100',
				'A200'  => 'A200',
				'A400'	=> 'A400',					
				'A700'	=> 'A700',
			),
			'multiple'        => false,
			'placeholder'     => 'Select a Value',
			'select_all_none' => false,
		),

		// HEADING
		array(
			'type' => 'heading',
			'name' => 'Destination',
		),


		// TEXT
		array(
		    'name'        => 'Link',
		    'id'          => "{$prefix}link",
		    'type'        => 'text',
		    'placeholder' => 'URL to Promotion',
		    'size'        => 30,
		),
      

    ),
  );

  return $meta_boxes;
}


