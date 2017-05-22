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
	if ( is_product() || is_page() ) {
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
                $('.facetwp-template').after('<button class="fwp-load-more">Load more</button>');
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
    return array( 12, 24, 48, 100 );
});

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
function storefront_site_branding(){
  ?><div class="site-branding"><a href="<?php echo home_url('/'); ?>" class="header-logo"></a></div><?php
}

/* Default woocommerce shit to get rid of */
function woocommerce_pagination(){}
function woocommerce_catalog_ordering(){}
function woocommerce_result_count(){}
function woocommerce_review_display_gravatar(){}

/* Enqeued Scripts */
function custom_script() {
wp_deregister_script('jquery');
wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', array(), null, true);
wp_enqueue_script( 'match_height', plugin_dir_url( __FILE__ ) . 'jquery-match-height/dist/jquery.matchHeight-min.js', array('jquery'), '1.0' );
}
add_action('wp_enqueue_scripts', 'custom_script');


