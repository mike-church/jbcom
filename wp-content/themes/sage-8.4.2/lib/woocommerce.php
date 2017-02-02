<?php

function woocommerce_template_loop_product_thumbnail(){  
  if ( has_post_thumbnail() ) { ?>
  <div class="thumb-wrapper">
      <div class="thumb" style="background-image:url(<?php the_post_thumbnail_url( 'medium' );?>);"></div>
  </div>
    <?php
  }
}

function woocommerce_template_loop_product_title(){ ?>
		<h5><?php echo the_title(); ?></h5> 
	<?php
}

function woocommerce_template_single_title(){ ?>
    <h1 class="margin-bottom-30"><?php echo the_title(); ?></h1> 
  <?php
}

function woocommerce_template_single_meta(){ 
  $highlight_facts_values = rwmb_meta( 'nutrition_highlight_facts' );
  $net_carbs = rwmb_meta( 'nutrition_highlight_net_carbs' );
  $calories = rwmb_meta( 'nutrition_calories' );
  ?>

    <?php if ( ! empty( $highlight_facts_values ) ) {
    echo '<div class="highlight-facts"><ul>';
    foreach ( $highlight_facts_values as $highlight_facts_value ) {
    $fact = isset( $highlight_facts_value['nutrition_highlight_fact'] ) ? $highlight_facts_value['nutrition_highlight_fact'] : '';
    $value = isset( $highlight_facts_value['nutrition_highlight_value'] ) ? $highlight_facts_value['nutrition_highlight_value'] : '';
    ?>      
      <li><span><?php echo $value;?></span><br><?php echo $fact;?></li>
    <?php }
    echo '</li><li><span>'.$net_carbs.'</span><br>Net Carbs*</li>';
    } ?>
    <?php if ( ! empty( $calories ) ) { ?> 
      <p><a href="#nutritionals">View Nutritionals <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a></p>
    <?php } ?>
    <?php if ( ! empty( $highlight_facts_values ) ) { ?> 
      <p><small>*Net Carbs are calculated by subtracting Fiber from Total Carbohydrates.</p>      
    </div>
    <?php } ?>

  <?php
}

function woocommerce_template_loop_rating(){}
function woocommerce_template_loop_add_to_cart(){}
function woocommerce_review_display_gravatar(){}


add_filter( 'woocommerce_breadcrumb_defaults', 'jk_change_breadcrumb_home_text' );
function jk_change_breadcrumb_home_text( $defaults ) {
    // Change the breadcrumb home text from 'Home' to 'Shop'
	$defaults['home'] = 'Shop';
	return $defaults;
}

add_filter( 'woocommerce_breadcrumb_home_url', 'woo_custom_breadrumb_home_url' );
function woo_custom_breadrumb_home_url() {
    return '/shop';
}