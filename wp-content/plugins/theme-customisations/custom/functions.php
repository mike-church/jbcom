<?php
/**
 * Functions.php
 *
 * @package  Theme_Customisations
 * @author   WooThemes
 * @since    1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

// Shared Taxonomies

add_action( 'init', 'shared_type', 0 );
function shared_type() {
  register_taxonomy(
    'type',
    array('product'),
    array(
      'labels' => array(
        'name' => 'Diet Type',
        'menu_name' => 'Diet',
        'add_new_item' => 'Add New',
        'new_item_name' => 'New Diet'
      ),
      'show_ui' => true,
      'show_tagcloud' => false,
      'hierarchical' => true,
      'sort' => true,      
      'args' => array( 'orderby' => 'term_order' ),
      'show_admin_column' => false,
      'capabilities'=>array(
        'manage_terms' => 'manage_options',//or some other capability your clients don't have
        'edit_terms' => 'manage_options',
        'delete_terms' => 'manage_options',
        'assign_terms' =>'edit_posts'),
      'rewrite' => array('with_front' => false, 'slug' => 'diet'),
    )
  );
}

add_action( 'init', 'shared_feature', 0 );
function shared_feature() {
  register_taxonomy(
    'feature',
    array('product'),
    array(
      'labels' => array(
        'name' => 'Feature',
        'menu_name' => 'Feature',
        'add_new_item' => 'Add New',
        'new_item_name' => 'New Feature'
      ),
      'show_ui' => true,
      'show_tagcloud' => false,
      'hierarchical' => true,
      'sort' => true,      
      'args' => array( 'orderby' => 'term_order' ),
      'show_admin_column' => false,
      'capabilities'=>array(
        'manage_terms' => 'manage_options',//or some other capability your clients don't have
        'edit_terms' => 'manage_options',
        'delete_terms' => 'manage_options',
        'assign_terms' =>'edit_posts'),
      'rewrite' => array('with_front' => false, 'slug' => 'feature'),
    )
  );
}

add_filter( 'facetwp_index_all_products', '__return_true' );


add_action( 'get_header', 'remove_storefront_sidebar' );
function remove_storefront_sidebar() {
  if ( is_product() || is_page() || is_search() ) {
    remove_action( 'storefront_sidebar', 'storefront_get_sidebar',10 );
  }
}

/* Add Load more results pagination to FacetWP */
function fwp_load_more() {
?>
<script>
(function($) {
    $(function() {
        if ('object' != typeof FWP) {
            return;
        }

        wp.hooks.addFilter('facetwp/template_html', function(resp, params) {
            if (FWP.is_load_more) {
                FWP.is_load_more = false;
                $('.facetwp-template').append(params.html);
                return true;
            }
            return resp;
        });
    });

    $(document).on('click', '.fwp-load-more', function() {
        $('.fwp-load-more').html('Loading...');
        FWP.is_load_more = true;
        FWP.paged = parseInt(FWP.settings.pager.page) + 1;
        FWP.soft_refresh = true;
        FWP.refresh();
    });

    $(document).on('facetwp-loaded', function() {
        if (FWP.settings.pager.page < FWP.settings.pager.total_pages) {
            if (! FWP.loaded && 1 > $('.fwp-load-more').length) {
                $('.facetwp-template').after('<div class="center"><button class="fwp-load-more button">Load more</button></div>');
            }
            else {
                $('.fwp-load-more').html('Load more').show();
            }
        }
        else {
            $('.fwp-load-more').hide();
        }
    });

    $(document).on('facetwp-refresh', function() {
        if (! FWP.loaded) {
            FWP.paged = 1;
        }
    });
})(jQuery);
</script>
<?php
}
add_action( 'wp_head', 'fwp_load_more', 99 );
add_filter( 'facetwp_template_force_load', '__return_true' );

/* Adjust default per-page results*/
add_filter( 'facetwp_per_page_options', function( $options ) {
    return array( 15, 30, 60, 100 );
});


/* Number of products to display */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = 15;
  return $cols;
}

/* Add labels above facets */
function fwp_add_facet_labels() {
?>
<script>
(function($) {
    $(document).on('facetwp-loaded', function() {
        $('.facetwp-facet').each(function() {
            var facet_name = $(this).attr('data-name');
            var facet_label = FWP.settings.labels[facet_name];
            if ($('.facet-label[data-for="' + facet_name + '"]').length < 1) {
                $(this).before('<h4 class="facet-label" data-for="' + facet_name + '">' + facet_label + '</h4>');
            }
        });
    });
})(jQuery);
</script>
<?php
}
add_action( 'wp_head', 'fwp_add_facet_labels', 100 );

/* Change "Products" to "Shop" in Yoast breadcrumb */
add_filter( 'wpseo_breadcrumb_output', 'custom_wpseo_breadcrumb_output' );
function custom_wpseo_breadcrumb_output( $output ){
if ( is_shop() ) {
    $from = '<span class="breadcrumb_last">Products</span>'; 
    $to = '<span class="breadcrumb_last">Shop</span>';
    $output = str_replace( $from, $to, $output );
}
elseif( is_woocommerce() ){
    $from = 'rel="v:url" property="v:title">Products</a>'; 
    $to = 'rel="v:url" property="v:title">Shop</a>';
    $output = str_replace( $from, $to, $output );
}
return $output;
}

/* Site Branding */
function storefront_site_branding() { ?>
  <div class="site-branding"><a href="<?php echo home_url('/'); ?>" class="header-logo"></a></div>
<?php
}

/* Homepage Shit */
function storefront_homepage_content() { ?>
  <section class="section-padding" style="padding-top:0;">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <img src="http://placehold.it/1600x900" class="img-responsive">
        </div>
      </div>
    </div>
  </section>
<?php
}

/* Remove Default Storefront Credit */
add_action( 'init', 'custom_remove_footer_credit', 10 );
function custom_remove_footer_credit () {
    remove_action( 'storefront_footer', 'storefront_credit', 20 );
}



/* Hooks shit to get rid of */
function woocommerce_pagination(){}
function woocommerce_catalog_ordering(){}
function woocommerce_result_count(){}
function woocommerce_review_display_gravatar(){}
function storefront_sorting_wrapper() {}
function storefront_sorting_wrapper_close() {}
function storefront_sorting(){}
function storefront_product_categories(){}
function storefront_featured_products(){}
function storefront_popular_products(){}


add_filter( 'woocommerce_output_related_products_args', 'change_number_related_products_storefront', 11 );
 
function change_number_related_products_storefront( $args ) {
 
 $args['posts_per_page'] = 4; // # of related products
 $args['columns'] = 4; // # of columns per row
 return $args;
}

add_filter( 'woocommerce_upsell_display_args', 'change_number_upsells_storefront', 11 );
 
function change_number_upsells_storefront( $args ) {
 
 $args['posts_per_page'] = 4; // # of related products
 $args['columns'] = 4; // # of columns per row
 return $args;
}

/* Breadcrumbs */
function woocommerce_breadcrumb(){
  if ( is_home() || is_page() || is_search() ){}
  else {
    if ( function_exists('yoast_breadcrumb') ) {
      yoast_breadcrumb('<nav id="breadcrumbs" style="padding:30px 0;">','</nav>');
    }
  }
}

/* Catalog Thumbnail */
function woocommerce_template_loop_product_thumbnail() {
  $url = get_the_post_thumbnail_url($post->ID,'shop_catalog');
  if ( has_post_thumbnail($post->ID) ) { ?>

    <div class="square" style="background-image:url(<?php echo $url;?>); background-repeat:no-repeat; background-size:cover; background-position:center center;"></div>
  <?php

  } else { ?>
    <div class="square" style="background-color:#d5d5d5;"></div>
  <?php
    
  }
}

/* Adding nutrition highlights to single product page */
function woocommerce_template_single_meta(){ 
  $highlight_facts_values = rwmb_meta( 'nutrition_highlight_facts' );
  $net_carbs = rwmb_meta( 'nutrition_highlight_net_carbs' );
  $calories = rwmb_meta( 'nutrition_calories' );
  if ( ! empty( $highlight_facts_values ) ) { ?>
  <div class="highlight-facts">
    <ul>
    <?php foreach ( $highlight_facts_values as $highlight_facts_value ) { 
    $fact = isset( $highlight_facts_value['nutrition_highlight_fact'] ) ? $highlight_facts_value['nutrition_highlight_fact'] : '';
    $value = isset( $highlight_facts_value['nutrition_highlight_value'] ) ? $highlight_facts_value['nutrition_highlight_value'] : '';
    ?> <li class="text-center"><span><?php echo $value;?></span><br><?php echo $fact;?></li> <?php } ?>
    <?php if ( ! empty( $net_carbs ) ) { ?> <li class="text-center"><span><?php echo $net_carbs;?></span><br>Net Carbs*</li> <?php } ?>
    </ul>
  </div>
  <?php } 
  elseif ( ! empty( $net_carbs ) ) { ?>
  <div class="highlight-facts">
    <ul>
      <li class="text-center"><span><?php echo $net_carbs;?></span><br>Net Carbs*</li>
    </ul>
  </div>
  <?php }
  if ( ! empty( $calories ) ) { ?> 
      <p><a href="#nutritionals">View Nutritionals <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a></p>
    <?php }
  if ( ! empty( $net_carbs ) ) { ?> 
      <p style="line-height:normal;"><small>*Net Carbs are calculated by subtracting Fiber from Total Carbohydrates.</small></p>      
    <?php }
}

/* Enqeued Scripts */
function custom_script() {
wp_deregister_script('jquery');
wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', array(), null, true);
wp_enqueue_script( 'match_height', plugin_dir_url( __FILE__ ) . 'jquery-match-height/dist/jquery.matchHeight-min.js', array('jquery'), '1.0' );
}
add_action('wp_enqueue_scripts', 'custom_script');

add_filter('storefront_customizer_woocommerce_css', '__return_false');




