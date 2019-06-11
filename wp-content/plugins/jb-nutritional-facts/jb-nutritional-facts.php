<?php

/*
Plugin Name: JB Nutritional Facts
Plugin URI: https://www.julianbakery.com
Description: Julian Bakery product nutrition facts
Version: 1.0
Author: Michael Church
Author URI: https://www.julianbakery.com
License: GPLv2
*/

add_filter( 'rwmb_meta_boxes', 'jb_nutritionals_register_meta_boxes' );
function jb_nutritionals_register_meta_boxes( $meta_boxes ) {

	$prefix = 'jb_nutritionals_';

    $meta_boxes[] = array(
        'title'     => 'Product Nutritional Facts',
        'post_types' => 'product',
		'context'    => 'normal',
		'priority' => 'low',
		
        'tabs'      => array(
            'featured' => array(
                'label' => 'Featured Facts',
                'icon'  => 'dashicons-star-filled', // Dashicon
            ),
            'nutrition'  => array(
                'label' => 'Nutritional Label',
                'icon'  => 'dashicons-text-page', // Dashicon
            ),
            'ingredients'    => array(
                'label' => 'Ingredients',
                'icon'  => 'dashicons-list-view', // Dashicon
            ),
            'allergens'    => array(
                'label' => 'Allergens',
                'icon'  => 'dashicons-list-view', // Dashicon
            ),
        ),

        // Tab style: 'default', 'box' or 'left'. Optional
        'tab_style' => 'left',

        // Show meta box wrapper around tabs? true (default) or false. Optional
        'tab_wrapper' => true,

        'fields'    => array(

        	// Featured Tab

            array(
                'name' => 'Calories',
                'id'   => "{$prefix}featured_calories",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'featured',
            ),

            array(
                'name' => 'Protein',
                'id'   => "{$prefix}featured_protein",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'featured',
            ),

            array(
                'name' => 'Fiber',
                'id'   => "{$prefix}featured_fiber",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'featured',
            ),

            array(
                'name' => 'Sugar',
                'id'   => "{$prefix}featured_sugar",
                'type' => 'text',
                'columns' => 3,
                'tab'  => 'featured',
            ),

            array(
                'name' => 'Net Carbs',
                'id'   => "{$prefix}featured_net_carbs",
                'type' => 'number',
                'columns' => 12,
                'tab'  => 'featured',
            ),

            // Nutrition Tab

            array(
                'name' => 'Nutritional Label',
                'id' => "{$prefix}label_image",
                'type' => 'image_advanced',
                'force_delete' => false,
                'max_file_uploads' => 1,
                'max_status'  => 'false',
                'image_size' => 'thumbnail',
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Main Nutritionals',
                'type' => 'heading',
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Servings per container',
                'id'   => "{$prefix}servings_per_container",
                'type' => 'text',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Serving size',
                'id'   => "{$prefix}serving_size",
                'type' => 'text',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Calories',
                'id'   => "{$prefix}calories",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Fats',
                'type' => 'heading',
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Total Fat',
                'id'   => "{$prefix}total_fat",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Total Fat DV%',
                'id'   => "{$prefix}total_fat_dv",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Saturated Fat',
                'id'   => "{$prefix}saturated_fat",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Saturated Fat DV%',
                'id'   => "{$prefix}saturated_fat_dv",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Trans Fat',
                'id'   => "{$prefix}trans_fat",
                'type' => 'number',
                'columns' => 12,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Cholesterol',
                'type' => 'heading',
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Cholesterol',
                'id'   => "{$prefix}cholesterol",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Cholesterol DV%',
                'id'   => "{$prefix}cholesterol_dv",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Sodium',
                'type' => 'heading',
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Sodium',
                'id'   => "{$prefix}sodium",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Sodium DV%',
                'id'   => "{$prefix}sodium_dv",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Carbohydrates',
                'type' => 'heading',
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Total Carbohydrate',
                'id'   => "{$prefix}carbohydrate",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Total Carbohydrate DV%',
                'id'   => "{$prefix}carbohydrate_dv",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Dietary Fiber',
                'id'   => "{$prefix}dietary_fiber",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Dietary Fiber DV%',
                'id'   => "{$prefix}dietary_fiber_dv",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Total Sugars',
                'id'   => "{$prefix}sugars",
                'type' => 'text',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Added Sugars',
                'id'   => "{$prefix}added_sugars",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Added Sugars DV%',
                'id'   => "{$prefix}added_sugars_dv",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Protein',
                'type' => 'heading',
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Protein',
                'id'   => "{$prefix}protein",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Protein DV%',
                'id'   => "{$prefix}protein_dv",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Additional Nutrients',
                'type' => 'heading',
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Vitamin A',
                'id'   => "{$prefix}vitamin_a",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Vitamin A DV%',
                'id'   => "{$prefix}vitamin_a_dv",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Vitamin C',
                'id'   => "{$prefix}vitamin_c",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Vitamin C DV%',
                'id'   => "{$prefix}vitamin_c_dv",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Vitamin D',
                'id'   => "{$prefix}vitamin_d",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Vitamin D DV%',
                'id'   => "{$prefix}vitamin_d_dv",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Calcium',
                'id'   => "{$prefix}calcium",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Calcium DV%',
                'id'   => "{$prefix}calcium_dv",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Iron',
                'id'   => "{$prefix}iron",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Iron DV%',
                'id'   => "{$prefix}iron_dv",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Potassium',
                'id'   => "{$prefix}potassium",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Potassium DV%',
                'id'   => "{$prefix}potassium_dv",
                'type' => 'number',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),


            // Ingredients Tab

            array(
                'name'    => 'Ingredients',
                'id'      => "{$prefix}ingredients",
                'type'    => 'wysiwyg',
                'raw'     => false,
                'options' => array(
                    'textarea_rows' => 4,
                    'teeny'         => true,
                    'media_buttons' => false,
                ),
                'tab'  => 'ingredients',
            ),

            // Allergens Tab

            array(
                'name'    => 'Allergens',
                'id'      => "{$prefix}allergens",
                'type'    => 'wysiwyg',
                'raw'     => false,
                'options' => array(
                    'textarea_rows' => 4,
                    'teeny'         => true,
                    'media_buttons' => false,
                ),
                'tab'  => 'allergens',
            ),


        ),
    );

    return $meta_boxes;
}


