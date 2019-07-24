<?php

/*
Plugin Name: JB Nutritional Facts
Plugin URI: https://www.julianbakery.com
Description: Julian Bakery product nutrition facts
Version: 1.2
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
                'step' => 'any',
                'columns' => 4,
                'tab'  => 'featured',
            ),

            array(
                'name' => 'Protein',
                'id'   => "{$prefix}featured_protein",
                'type' => 'number',
                'step' => 'any',
                'columns' => 4,
                'tab'  => 'featured',
            ),

            array(
                'name' => 'Fiber',
                'id'   => "{$prefix}featured_fiber",
                'type' => 'number',
                'step' => 'any',
                'columns' => 4,
                'tab'  => 'featured',
            ),

            array(
                'name' => 'Fat',
                'id'   => "{$prefix}featured_fat",
                'type' => 'number',
                'step' => 'any',
                'columns' => 4,
                'tab'  => 'featured',
            ),

            array(
                'name' => 'Sugar',
                'id'   => "{$prefix}featured_sugar",
                'type' => 'number',
                'step' => 'any',
                'columns' => 4,
                'tab'  => 'featured',
            ),

            array(
                'name' => 'Net Carbs',
                'id'   => "{$prefix}featured_net_carbs",
                'type' => 'number',
                'step' => 'any',
                'columns' => 4,
                'tab'  => 'featured',
            ),

            array(
                'name' => 'Optional Fact',
                'type' => 'heading',
                'tab'  => 'featured',
            ),

            array(
                'name' => 'Value',
                'desc' => 'ex. 14g',
                'id'   => "{$prefix}featured_optional_value",
                'type' => 'text',
                'columns' => 4,
                'tab'  => 'featured',
            ),

            array(
                'name' => 'Value Description',
                'desc' => 'ex. OF BHB',
                'id'   => "{$prefix}featured_optional_description",
                'type' => 'text',
                'columns' => 4,
                'tab'  => 'featured',
            ),

            // Nutrition Tab

            array(
                'name'    => 'Radio',
                'id'      => "{$prefix}fact_title",
                'type'    => 'radio',
                'options' => array(
                    'Nutrition Facts' => 'Nutrition Facts',
                    'Suplement Facts' => 'Suplement Facts',
                ),
                'std'     => 'Nutrition Facts',
                'inline' => false,
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
                'step' => 'any',
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
                'step' => 'any',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Total Fat DV%',
                'id'   => "{$prefix}total_fat_dv",
                'type' => 'number',
                'step' => 'any',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Saturated Fat',
                'id'   => "{$prefix}saturated_fat",
                'type' => 'number',
                'step' => 'any',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Saturated Fat DV%',
                'id'   => "{$prefix}saturated_fat_dv",
                'type' => 'number',
                'step' => 'any',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Trans Fat',
                'id'   => "{$prefix}trans_fat",
                'type' => 'number',
                'step' => 'any',
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
                'step' => 'any',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Cholesterol DV%',
                'id'   => "{$prefix}cholesterol_dv",
                'type' => 'number',
                'step' => 'any',
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
                'step' => 'any',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Sodium DV%',
                'id'   => "{$prefix}sodium_dv",
                'type' => 'number',
                'step' => 'any',
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
                'step' => 'any',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Total Carbohydrate DV%',
                'id'   => "{$prefix}carbohydrate_dv",
                'type' => 'number',
                'step' => 'any',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Dietary Fiber',
                'id'   => "{$prefix}dietary_fiber",
                'type' => 'number',
                'step' => 'any',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Dietary Fiber DV%',
                'id'   => "{$prefix}dietary_fiber_dv",
                'type' => 'number',
                'step' => 'any',
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
                'step' => 'any',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Added Sugars DV%',
                'id'   => "{$prefix}added_sugars_dv",
                'type' => 'number',
                'step' => 'any',
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
                'step' => 'any',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Protein DV%',
                'id'   => "{$prefix}protein_dv",
                'type' => 'number',
                'step' => 'any',
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
                'step' => 'any',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Vitamin A DV%',
                'id'   => "{$prefix}vitamin_a_dv",
                'type' => 'number',
                'step' => 'any',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Vitamin C',
                'id'   => "{$prefix}vitamin_c",
                'type' => 'number',
                'step' => 'any',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Vitamin C DV%',
                'id'   => "{$prefix}vitamin_c_dv",
                'type' => 'number',
                'step' => 'any',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Vitamin D',
                'id'   => "{$prefix}vitamin_d",
                'type' => 'number',
                'step' => 'any',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Vitamin D DV%',
                'id'   => "{$prefix}vitamin_d_dv",
                'type' => 'number',
                'step' => 'any',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Calcium',
                'id'   => "{$prefix}calcium",
                'type' => 'number',
                'step' => 'any',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Calcium DV%',
                'id'   => "{$prefix}calcium_dv",
                'type' => 'number',
                'step' => 'any',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Iron',
                'id'   => "{$prefix}iron",
                'type' => 'number',
                'step' => 'any',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Iron DV%',
                'id'   => "{$prefix}iron_dv",
                'type' => 'number',
                'step' => 'any',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Potassium',
                'id'   => "{$prefix}potassium",
                'type' => 'number',
                'step' => 'any',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Potassium DV%',
                'id'   => "{$prefix}potassium_dv",
                'type' => 'number',
                'step' => 'any',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Phosphorus',
                'id'   => "{$prefix}phosphorus",
                'type' => 'number',
                'step' => 'any',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Phosphorus DV%',
                'id'   => "{$prefix}phosphorus_dv",
                'type' => 'number',
                'step' => 'any',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Magnesium',
                'id'   => "{$prefix}magnesium",
                'type' => 'number',
                'step' => 'any',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Magnesium DV%',
                'id'   => "{$prefix}magnesium_dv",
                'type' => 'number',
                'step' => 'any',
                'columns' => 3,
                'tab'  => 'nutrition',
            ),

            array(
                'name' => 'Custom Nutrients',
                'type' => 'heading',
                'tab'  => 'nutrition',
            ),

            array(
                'id'     => "{$prefix}optional_nutrients",
                'type'   => 'group',
                'clone'  => true,
                'sort_clone' => true,
                'tab'  => 'nutrition',
                'fields' => array(
                    array(
                        'name' => 'Name',
                        'id'   => "{$prefix}nutrient_name",
                        'type' => 'text',
                        'columns' => 4,
                    ),
                    array(
                        'name' => 'Value',
                        'id'   => "{$prefix}nutrient_value",
                        'type' => 'text',
                        'columns' => 4,
                    ),
                    array(
                        'name' => 'Daily Value',
                        'id'   => "{$prefix}nutrient_dv",
                        'type' => 'text',
                        'columns' => 4,
                    ),
                ),
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





// Add Nutrition & Ingredients Tab

add_filter( 'woocommerce_product_tabs', 'jb_nutritionals_tab' );
function jb_nutritionals_tab( $tabs ) {

    $ingredients = rwmb_meta( 'jb_nutritionals_ingredients' );
    $servings_per_container = rwmb_meta( 'jb_nutritionals_servings_per_container' );

    if ( ! empty( $servings_per_container && $ingredients ) ) {
    
        // Adds the new tab
        
        $tabs['nutrition_tab'] = array(
            'title'     => __( 'Nutrition & Ingredients', 'woocommerce' ),
            'priority'  => 5,
            'callback'  => 'jb_nutritionals_tab_content'
        );

        return $tabs;
    }


    elseif ( ! empty( $ingredients ) ) {
    
        // Adds the new tab
        
        $tabs['nutrition_tab'] = array(
            'title'     => __( 'Ingredients', 'woocommerce' ),
            'priority'  => 5,
            'callback'  => 'jb_nutritionals_tab_content'
        );

        return $tabs;
    }

}

function jb_nutritionals_tab_content() {

    $label_image = rwmb_meta( 'jb_nutritionals_label_image' );
    $title = rwmb_meta( 'jb_nutritionals_fact_title' );
    $servings_per_container = rwmb_meta( 'jb_nutritionals_servings_per_container' );
    $serving_size = rwmb_meta( 'jb_nutritionals_serving_size' );
    $calories = rwmb_meta( 'jb_nutritionals_calories' );
    $total_fat = rwmb_meta( 'jb_nutritionals_total_fat' );
    $total_fat_dv = rwmb_meta( 'jb_nutritionals_total_fat_dv' );
    $saturated_fat = rwmb_meta( 'jb_nutritionals_saturated_fat' );
    $saturated_fat_dv = rwmb_meta( 'jb_nutritionals_saturated_fat_dv' );
    $trans_fat = rwmb_meta( 'jb_nutritionals_trans_fat' );
    $cholesterol = rwmb_meta( 'jb_nutritionals_cholesterol' );
    $cholesterol_dv = rwmb_meta( 'jb_nutritionals_cholesterol_dv' );
    $sodium = rwmb_meta( 'jb_nutritionals_sodium' );
    $sodium_dv = rwmb_meta( 'jb_nutritionals_sodium_dv' );
    $carbohydrate = rwmb_meta( 'jb_nutritionals_carbohydrate' );
    $carbohydrate_dv = rwmb_meta( 'jb_nutritionals_carbohydrate_dv' );
    $dietary_fiber = rwmb_meta( 'jb_nutritionals_dietary_fiber' );
    $dietary_fiber_dv = rwmb_meta( 'jb_nutritionals_dietary_fiber_dv' );
    $sugars = rwmb_meta( 'jb_nutritionals_sugars' );
    $added_sugars = rwmb_meta( 'jb_nutritionals_added_sugars' );
    $added_sugars_dv = rwmb_meta( 'jb_nutritionals_added_sugars_dv' );
    $protein = rwmb_meta( 'jb_nutritionals_protein' );
    $protein_dv = rwmb_meta( 'jb_nutritionals_protein_dv' );
    $vitamin_a = rwmb_meta( 'jb_nutritionals_vitamin_a' );
    $vitamin_a_dv = rwmb_meta( 'jb_nutritionals_vitamin_a_dv' );
    $vitamin_c = rwmb_meta( 'jb_nutritionals_vitamin_c' );
    $vitamin_c_dv = rwmb_meta( 'jb_nutritionals_vitamin_c_dv' );
    $vitamin_d = rwmb_meta( 'jb_nutritionals_vitamin_d' );
    $vitamin_d_dv = rwmb_meta( 'jb_nutritionals_vitamin_d_dv' );
    $calcium = rwmb_meta( 'jb_nutritionals_calcium' );
    $calcium_dv = rwmb_meta( 'jb_nutritionals_calcium_dv' );
    $iron = rwmb_meta( 'jb_nutritionals_iron' );
    $iron_dv = rwmb_meta( 'jb_nutritionals_iron_dv' );
    $potassium = rwmb_meta( 'jb_nutritionals_potassium' );
    $potassium_dv = rwmb_meta( 'jb_nutritionals_potassium_dv' );
    $phosphorus = rwmb_meta( 'jb_nutritionals_phosphorus' );
    $phosphorus_dv = rwmb_meta( 'jb_nutritionals_phosphorus_dv' );
    $magnesium = rwmb_meta( 'jb_nutritionals_magnesium' );
    $magnesium_dv = rwmb_meta( 'jb_nutritionals_magnesium_dv' );
    $ingredients = rwmb_meta( 'jb_nutritionals_ingredients' );
    $allergens = rwmb_meta( 'jb_nutritionals_allergens' );
    $optional_nutrients = rwmb_meta( 'jb_nutritionals_optional_nutrients' );

if ( ! empty( $servings_per_container && $ingredients ) ) { 

    ?>

    <div class="row">
        <div class="col-sm-6">

            <div class="nutrition-facts p-3 border mb-5">

                <?php if ( ! empty( $title ) ) { ?> <h3 class="font-bold border-bottom"><?php echo $title;?></h3> <?php } else { ?><h3 class="font-bold border-bottom">Nutrition Facts</h3> <?php } ;?>
                <?php if ( ! empty( $servings_per_container ) ) echo '<div>' . $servings_per_container . ' serving per container </div>' ;?>
                <?php if ( ! empty( $serving_size ) ) echo '<div class="font-bold"> Serving size ' . $serving_size . '</div>' ;?>
                <hr class="primary" />
                <div class="d-flex justify-content-start">
                    <span><small class="font-bold">Amount per serving</small></span>
                </div>
                <?php if ( isset( $calories ) && $calories !== "" ) echo '<div class="d-flex justify-content-between"><span class="font-bold" style="font-size:1.75rem;">Calories</span><span class="font-bold" style="font-size:2rem;">' . $calories . '</div>' ;?>
                <hr/>
                <div class="d-flex justify-content-end border-bottom">
                    <span><small class="font-bold">% Daily Value*</small></span>
                </div>
                <?php if ( isset( $total_fat ) && $total_fat !== "" ) echo '<div class="d-flex justify-content-between border-bottom py-1"><span><span class="font-bold">Total Fat</span> ' . $total_fat . 'g</span><span class="font-bold">' . $total_fat_dv . '%</span></div>';?>
                <?php if ( isset( $saturated_fat ) && $saturated_fat !== "" ) echo '<div class="d-flex justify-content-between border-bottom ml-3 py-1"><span>Saturated Fat ' . $saturated_fat . 'g</span><span class="font-bold">' . $saturated_fat_dv . '%</span></div>';?>
                <?php if ( isset( $trans_fat ) && $trans_fat !== "" ) echo '<div class="d-flex justify-content-between border-bottom ml-3 py-1"><span>Trans Fat ' . $trans_fat . 'g</span></div>';?>
                <?php if ( isset( $cholesterol ) && $cholesterol !== "" ) echo '<div class="d-flex justify-content-between border-bottom py-1"><span><span class="font-bold">Cholesterol</span> ' . $cholesterol . 'mg</span><span class="font-bold">' . $cholesterol_dv . '%</span></div>';?>
                <?php if ( isset( $sodium ) && $sodium !== "" ) echo '<div class="d-flex justify-content-between border-bottom py-1"><span><span class="font-bold">Sodium</span> ' . $sodium . 'mg</span><span class="font-bold">' . $sodium_dv . '%</span></div>';?>
                <?php if ( isset( $carbohydrate ) && $carbohydrate !== "" ) echo '<div class="d-flex justify-content-between border-bottom py-1"><span><span class="font-bold">Total Cabohydrate</span> ' . $carbohydrate . 'g</span><span class="font-bold">' . $carbohydrate_dv . '%</span></div>';?>
                <?php if ( isset( $dietary_fiber ) && $dietary_fiber !== "" ) echo '<div class="d-flex justify-content-between border-bottom ml-3 py-1"><span>Dietary Fiber ' . $dietary_fiber . 'g</span><span class="font-bold">' . $dietary_fiber_dv . '%</span></div>';?>
                <?php if ( isset( $sugars ) && $sugars !== "" ) echo '<div class="d-flex justify-content-between border-bottom ml-3 py-1"><span>Total Sugars ' . $sugars . 'g</span></div>';?>
                <?php if ( isset( $added_sugars ) && $added_sugars !== "" ) echo '<div class="d-flex justify-content-between border-bottom ml-3 pl-3 py-1"><span>Includes ' . $added_sugars . 'g Added Sugars</span><span class="font-bold">' . $added_sugars_dv . '%</span></div>';?>
                <?php if ( isset( $protein ) && $protein !== "" ) { ?> 
                    <div class="d-flex justify-content-between py-1">
                        <?php echo '<span><span class="font-bold">Protein</span> '.$protein.'g</span>';?>
                        <?php if ( ! empty( $protein_dv ) ) echo '<span class="font-bold">'.$protein_dv.'%</span>';?>
                    </div>
                <?php } ;?>

                <hr/>

                <?php if ( isset( $vitamin_a ) && $vitamin_a !== "" ) { ?>
                    <div class="d-flex justify-content-between border-bottom py-1"><span>Vitamin A <?php echo $vitamin_a;?>mg</span><span class="font-bold"><?php echo $vitamin_a_dv;?>%</span></div>
                <?php } elseif ( isset( $vitamin_a_dv ) && $vitamin_a_dv !== "" ) { ?> 
                    <div class="d-flex justify-content-between border-bottom py-1"><span>Vitamin A</span><span class="font-bold"><?php echo $vitamin_a_dv;?>%</span></div>
                <?php } ?>

                <?php if ( isset( $vitamin_c ) && $vitamin_c !== "" ) { ?>
                    <div class="d-flex justify-content-between border-bottom py-1"><span>Vitamin C <?php echo $vitamin_c;?>mg</span><span class="font-bold"><?php echo $vitamin_c_dv;?>%</span></div>
                <?php } elseif ( isset( $vitamin_c_dv ) && $vitamin_c_dv !== "" ) { ?> 
                    <div class="d-flex justify-content-between border-bottom py-1"><span>Vitamin C</span><span class="font-bold"><?php echo $vitamin_c_dv;?>%</span></div>
                <?php } ?>

                <?php if ( isset( $vitamin_d ) && $vitamin_d !== "" ) { ?>
                    <div class="d-flex justify-content-between border-bottom py-1"><span>Vitamin D <?php echo $vitamin_d;?>mcg</span><span class="font-bold"><?php echo $vitamin_d_dv;?>%</span></div>
                <?php } elseif ( isset( $vitamin_d_dv ) && $vitamin_d_dv !== "" ) { ?> 
                    <div class="d-flex justify-content-between border-bottom py-1"><span>Vitamin D</span><span class="font-bold"><?php echo $vitamin_d_dv;?>%</span></div>
                <?php } ?>

                <?php if ( isset( $calcium ) && $calcium !== "" ) { ?>
                    <div class="d-flex justify-content-between border-bottom py-1"><span>Calcium <?php echo $calcium;?>mg</span><span class="font-bold"><?php echo $calcium_dv;?>%</span></div>
                <?php } elseif ( isset( $calcium_dv ) && $calcium_dv !== "" ) { ?> 
                    <div class="d-flex justify-content-between border-bottom py-1"><span>Calcium</span><span class="font-bold"><?php echo $calcium_dv;?>%</span></div>
                <?php } ?>

                <?php if ( isset( $iron ) && $iron !== "" ) { ?>
                    <div class="d-flex justify-content-between border-bottom py-1"><span>Iron <?php echo $iron;?>mg</span><span class="font-bold"><?php echo $iron_dv;?>%</span></div>
                <?php } elseif ( isset( $iron_dv ) && $iron_dv !== "" ) { ?> 
                    <div class="d-flex justify-content-between border-bottom py-1"><span>Iron</span><span class="font-bold"><?php echo $iron_dv;?>%</span></div>
                <?php } ?>

                <?php if ( isset( $potassium ) && $potassium !== "" ) { ?>
                    <div class="d-flex justify-content-between border-bottom py-1"><span>Potassium <?php echo $potassium;?>mg</span><span class="font-bold"><?php echo $potassium_dv;?>%</span></div>
                <?php } elseif ( isset( $potassium_dv ) && $potassium_dv !== "" ) { ?> 
                    <div class="d-flex justify-content-between border-bottom py-1"><span>Potassium</span><span class="font-bold"><?php echo $potassium_dv;?>%</span></div>
                <?php } ?>

                <?php if ( isset( $phosphorus ) && $phosphorus !== "" ) { ?>
                    <div class="d-flex justify-content-between border-bottom py-1"><span>Phosphorus <?php echo $phosphorus;?>mg</span><span class="font-bold"><?php echo $phosphorus_dv;?>%</span></div>
                <?php } elseif ( isset( $phosphorus_dv ) && $phosphorus_dv !== "" ) { ?> 
                    <div class="d-flex justify-content-between border-bottom py-1"><span>Phosphorus</span><span class="font-bold"><?php echo $phosphorus_dv;?>%</span></div>
                <?php } ?>

                <?php if ( isset( $magnesium ) && $magnesium !== "" ) { ?>
                    <div class="d-flex justify-content-between border-bottom py-1"><span>Magnesium <?php echo $magnesium;?>mg</span><span class="font-bold"><?php echo $magnesium_dv;?>%</span></div>
                <?php } elseif ( isset( $magnesium_dv ) && $magnesium_dv !== "" ) { ?> 
                    <div class="d-flex justify-content-between border-bottom py-1"><span>Magnesium</span><span class="font-bold"><?php echo $magnesium_dv;?>%</span></div>
                <?php } ?>

                <?php foreach ( $optional_nutrients as $nutrient ) {
                    $name = isset( $nutrient['jb_nutritionals_nutrient_name'] ) ? $nutrient['jb_nutritionals_nutrient_name'] : '';
                    $value = isset( $nutrient['jb_nutritionals_nutrient_value'] ) ? $nutrient['jb_nutritionals_nutrient_value'] : '';
                    $dv = isset( $nutrient['jb_nutritionals_nutrient_dv'] ) ? $nutrient['jb_nutritionals_nutrient_dv'] : ''; ?>

                        <div class="d-flex justify-content-between border-bottom py-1"><span><?php echo $name;?> <?php echo $value;?></span><span class="font-bold"><?php echo $dv;?>%</span></div>
                    
                    <?php }
                ?> 

                <div class="d-flex justify-content-end py-1">
                    <span><small>The % Daily Value (DV) tells you how much a nutrient in a serving of food contributes to a daily diet. 2,000 calories a day is used for general nutrition advice.</small></span>
                </div>

            </div>

        </div>

        <div class="col-sm-6">

            <?php if ( ! empty( $ingredients ) ) echo '<h4>Ingredients</h4>' . $ingredients ;?>
            <?php if ( ! empty( $allergens ) ) echo '<h4>Allergens</h4>' . $allergens ;?>

        </div>
    </div>

    <?php

    } elseif ( ! empty( $ingredients ) ) { ?> 

        <div class="row">
            <div class="col-sm-12">

                <?php if ( ! empty( $ingredients ) ) echo '<h4>Ingredients</h4>' . $ingredients ;?>
                <?php if ( ! empty( $allergens ) ) echo '<h4>Allergens</h4>' . $allergens ;?>

            </div>
        </div>

    <?php };
    
}

// Feature Nutritionals

add_action('woocommerce_single_product_summary', 'fresh_start_feature_facts', 70);
function fresh_start_feature_facts() {

    $featured_calories = rwmb_meta( 'jb_nutritionals_featured_calories' );
    $featured_protein = rwmb_meta( 'jb_nutritionals_featured_protein' );
    $featured_fiber = rwmb_meta( 'jb_nutritionals_featured_fiber' );
    $featured_fat = rwmb_meta( 'jb_nutritionals_featured_fat' );
    $featured_sugar = rwmb_meta( 'jb_nutritionals_featured_sugar' );
    $featured_net_carbs = rwmb_meta( 'jb_nutritionals_featured_net_carbs' );
    $featured_optional_value = rwmb_meta( 'jb_nutritionals_featured_optional_value' );
    $featured_optional_description = rwmb_meta( 'jb_nutritionals_featured_optional_description' );

    if ( ! empty( $featured_calories || $featured_protein || $featured_fiber || $featured_fat || $featured_sugar || $featured_net_carbs || $featured_optional_value ) ) { ?>

    
        <div class="d-flex flex-wrap align-items-start featured-facts mt-3">
            
            <?php if ( isset( $featured_calories ) && $featured_calories !== "" ) echo '<div class="py-3 mr-4"><span>' . $featured_calories . '</span><span>Calories</span></div>' ;?>
            <?php if ( isset( $featured_protein ) && $featured_protein !== "" ) echo '<div class="py-3 mr-4"><span>' . $featured_protein . 'g</span><span>Protein</span></div>' ;?>
            <?php if ( isset( $featured_fiber ) && $featured_fiber !== "" ) echo '<div class="py-3 mr-4"><span>' . $featured_fiber . 'g</span><span>Fiber</span></div>' ;?>
            <?php if ( isset( $featured_fat ) && $featured_fat !== "" ) echo '<div class="py-3 mr-4"><span>' . $featured_fat . 'g</span><span>Fat</span></div>' ;?>
            <?php if ( isset( $featured_sugar ) && $featured_sugar !== "" ) echo '<div class="py-3 mr-4"><span>' . $featured_sugar . 'g</span><span>Sugar</span></div>' ;?>
            <?php if ( isset( $featured_net_carbs ) && $featured_net_carbs !== "" ) echo '<div class="py-3 mr-4"><span>' . $featured_net_carbs . 'g</span><span>Net Carbs</span></div>' ;?>
            <?php if ( isset( $featured_optional_value ) && $featured_optional_value !== "" ) echo '<div class="py-3 mr-4"><span>'.$featured_optional_value.'</span><span>'.$featured_optional_description.'</span></div>' ;?>
        
        </div>

    <?php }

}