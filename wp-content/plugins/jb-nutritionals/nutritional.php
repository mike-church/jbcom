<?php
/*
Plugin Name: Julian Bakery Nutritionals
Plugin URI: http://fishinglounge.com/
Description: This plugin is an add-on for woocommerce. Its adds nutritional fields to the new product entry page.
Version: 1.0
Author: Michael Church
Author URI: http://fishinglounge.com/
License: GPLv2
*/

// Metabox

add_filter( 'rwmb_meta_boxes', 'nutritionals_register_meta_boxes' );
function nutritionals_register_meta_boxes( $meta_boxes )
{
	$prefix = 'nutrition_';

	$meta_boxes[] = array(
		'title'  => __( 'Highlight Nutritional Facts', 'nutrition' ),
		'post_types' => 'product',
		'context'    => 'normal',
		'priority'   => 'low',
		'fields' => array(
			// HEADING
			array(
			'type' => 'heading',
			'name' => __( 'Facts (Please limit to 3)', 'nutrition_' ),
			'id'   => 'fake_id', // Not used but needed for plugin
			),
			// GROUP
			array(
			'id'     => "{$prefix}highlight_facts",
			'type'   => 'group',
			'clone'  => true,
			'sort_clone' => true,
				// Sub-fields
				'fields' => array(			
					// TEXT
					array(
						'name'  => __( 'Fact', 'nutrition_' ),
						'id'    => "{$prefix}highlight_fact",
						'desc' => __( 'Eample: Protein', 'nutrition_' ),
						'type'  => 'text',
					),
					// TEXT
					array(
						'name'  => __( 'Value', 'nutrition_' ),
						'id'    => "{$prefix}highlight_value",
						'desc' => __( 'Eample: 20g', 'nutrition_' ),
						'type'  => 'text',
					),
				),
			),			
			// HEADING
			array(
			'type' => 'heading',
			'name' => __( 'Net Carbs', 'nutrition_' ),
			'id'   => 'fake_id', // Not used but needed for plugin
			),
			// NUMBER
			array(
				'name' => esc_html__( 'Net Carbs', 'nutrition_' ),
				'id'   => "{$prefix}highlight_net_carbs",
				'type' => 'number',
				'min'  => 0,
			),
		),
	);

	$meta_boxes[] = array(
		'title'  => __( 'Nutritional Facts', 'nutrition' ),
		'post_types' => 'product',
		'context'    => 'normal',
		'priority'   => 'low',
		'fields' => array(
			// HEADING
			array(
			'type' => 'heading',
			'name' => __( 'Basic Facts', 'nutrition_' ),
			'id'   => 'fake_id', // Not used but needed for plugin
			),
			// TEXT
			array(
				'name'  => __( 'Serving Size', 'nutrition_' ),
				'id'    => "{$prefix}serving_size",
				'desc' => __( 'Eample: 1 Bar', 'nutrition_' ),
				'type'  => 'text',
			),
			// TEXT
			array(
				'name'  => __( 'Serving Size Weight', 'nutrition_' ),
				'id'    => "{$prefix}serving_weight",
				'desc' => __( 'Eample: 65g', 'nutrition_' ),
				'type'  => 'text',
			),
			// NUMBER
			array(
				'name' => esc_html__( 'Servings Per Container', 'nutrition_' ),
				'id'   => "{$prefix}servings_per_container",
				'type' => 'number',
				'min'  => 0,
			),
			// NUMBER
			array(
				'name' => esc_html__( 'Calories', 'nutrition_' ),
				'id'   => "{$prefix}calories",
				'type' => 'number',
				'min'  => 0,
			),
			// NUMBER
			array(
				'name' => esc_html__( 'Calories from Fat', 'nutrition_' ),
				'id'   => "{$prefix}calories_from_fat",
				'type' => 'number',
				'min'  => 0,
			),
			// HEADING
			array(
			'type' => 'heading',
			'name' => __( 'Facts', 'nutrition_' ),
			'id'   => 'fake_id', // Not used but needed for plugin
			),
			// GROUP
			array(
			'id'     => "{$prefix}facts",
			'type'   => 'group',
			'clone'  => true,
			'sort_clone' => true,
				// Sub-fields
				'fields' => array(				
					// TEXT
					array(
						'name'  => __( 'Fact', 'nutrition_' ),
						'id'    => "{$prefix}fact",
						'desc' => __( 'Eample: Total Fat', 'nutrition_' ),
						'type'  => 'text',
					),
					// TEXT
					array(
						'name'  => __( 'Weight', 'nutrition_' ),
						'id'    => "{$prefix}fact_weight",
						'desc' => __( 'Eample: 6g or 400mg', 'nutrition_' ),
						'type'  => 'text',
					),
					// NUMBER
					array(
						'name' => esc_html__( 'Daily Value %', 'nutrition_' ),
						'id'   => "{$prefix}fact_dv",
						'type' => 'number',
						'min'  => 0,
						'step' => 1,
					),
				),
			),
			// HEADING
			array(
			'type' => 'heading',
			'name' => __( 'Vitamins', 'nutrition_' ),
			'id'   => 'fake_id', // Not used but needed for plugin
			),
			// GROUP
			array(
			'id'     => "{$prefix}vitamins",
			'type'   => 'group',
			'clone'  => true,
			'sort_clone' => true,
				// Sub-fields
				'fields' => array(				
					// TEXT
					array(
						'name'  => __( 'Vitamin', 'nutrition_' ),
						'id'    => "{$prefix}vitamin",
						'desc' => __( 'Eample: Vitamin A', 'nutrition_' ),
						'type'  => 'text',
					),
					// NUMBER
					array(
						'name' => esc_html__( 'Percent', 'nutrition_' ),
						'id'   => "{$prefix}vitamin_percent",
						'type' => 'number',
						'min'  => 0,
						'step' => 1,
					),
				),
			),
		),
	);

	$meta_boxes[] = array(
		'title'  => __( 'Ingredients and Allergens', 'nutrition' ),
		'post_types' => 'product',
		'context'    => 'normal',
		'priority'   => 'low',
		'fields' => array(

			// HEADING
			array(
			'type' => 'heading',
			'name' => __( 'Ingredients', 'nutrition_' ),
			'id'   => 'fake_id', // Not used but needed for plugin
			),
			// TEXTAREA
			array(
				'id'   => "{$prefix}ingredients",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 6,
			),
			// HEADING
			array(
			'type' => 'heading',
			'name' => __( 'Allergens', 'nutrition_' ),
			'id'   => 'fake_id', // Not used but needed for plugin
			),
			// TEXTAREA
			array(
				'id'   => "{$prefix}allergens",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 6,
			),
			// HEADING
			array(
			'type' => 'heading',
			'name' => __( 'Additional Notes', 'nutrition_' ),
			'id'   => 'fake_id', // Not used but needed for plugin
			),
			// TEXTAREA
			array(
				'id'   => "{$prefix}additional_notes",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 6,
			),
		),
	);
return $meta_boxes;
}