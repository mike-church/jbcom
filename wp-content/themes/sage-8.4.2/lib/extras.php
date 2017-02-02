<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/**
 * Woocommerce theme support
 */
add_action( 'after_setup_theme', __NAMESPACE__ . '\\woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter( 'woocommerce_add_to_cart_fragments', __NAMESPACE__ . '\\woocommerce_header_add_to_cart_fragment' );
function woocommerce_header_add_to_cart_fragment( $fragments ) {
  ob_start();
  ?>
  <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo WC()->cart->get_cart_total(); ?></a> 
  <?php
  
  $fragments['a.cart-contents'] = ob_get_clean();
  
  return $fragments;
}

// Custom Body Class
add_action( 'body_class', __NAMESPACE__ . '\\toggle_menu_body_class');
function toggle_menu_body_class( $classes ) {
  if ( is_page() || is_single() || is_home() || is_archive() )
    $classes[] = 'cbp-spmenu-push';
  return $classes;
}

add_action( 'init', __NAMESPACE__ . '\\shared_type', 0 );
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

add_action( 'init', __NAMESPACE__ . '\\shared_feature', 0 );
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





function type_meta_box() {

remove_meta_box('typediv', 'product', 'side');
add_meta_box( 'typediv', 'Diet Type', 'post_categories_meta_box', 'product', 'side', 'low', array( 'taxonomy' => 'type' ));

}
add_action( 'admin_init', __NAMESPACE__ . '\\type_meta_box', 1 );

function feature_meta_box() {

remove_meta_box('featurediv', 'product', 'side');
add_meta_box( 'featurediv', 'Product Feature', 'post_categories_meta_box', 'product', 'side', 'low', array( 'taxonomy' => 'feature' ));

}
add_action( 'admin_init', __NAMESPACE__ . '\\feature_meta_box', 2 );







/**
 * Match Height
 */
function match_height( $atts ) {
  ob_start(); 
  ?>
  <script>jQuery(function(a){a(".match-height").matchHeight({byRow:!0})});</script>
  <?php
  $content = ob_get_contents();
  ob_end_clean();
  return $content;
}
add_shortcode('match-height', __NAMESPACE__ . '\\match_height');

/**
 * Add Load more results pagination to FacetWP
 */
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
                    $('.facetwp-template').after('<div class="text-center padding-30"><button class="fwp-load-more btn btn-primary">Show more results</button></div>');
                }
                else {
                    $('.fwp-load-more').html('Show more results').show();
                }
            }
            else {
                $('.fwp-load-more').hide();
            }
        });
    });
})(jQuery);
</script>
<?php
}
add_action( 'wp_head', __NAMESPACE__ . '\\fwp_load_more', 99 );

/**
 * Adjust default per-page results
 */
add_filter( 'facetwp_per_page_options', function( $options ) {
    return array( 12, 24, 48, 100 );
});

/**
 * YouTube Modal
 */
function youtube_modal( $atts ) {
  ob_start(); 
  ?>

<!-- Video / Generic Modal -->
<div class="modal video-modal" id="mediaModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <button type="button" data-dismiss="modal"><i class="icon-close"></i></button>
      <div class="modal-body">
        <!-- content dynamically inserted -->
      </div>
    </div>
  </div>
</div>

<script>
// REQUIRED: Include "jQuery Query Parser" plugin here or before this point: 
// https://github.com/mattsnider/jquery-plugin-query-parser
 (function($){var pl=/\+/g,searchStrict=/([^&=]+)=+([^&]*)/g,searchTolerant=/([^&=]+)=?([^&]*)/g,decode=function(s){return decodeURIComponent(s.replace(pl," "));};$.parseQuery=function(query,options){var match,o={},opts=options||{},search=opts.tolerant?searchTolerant:searchStrict;if('?'===query.substring(0,1)){query=query.substring(1);}while(match=search.exec(query)){o[decode(match[1])]=decode(match[2]);}return o;};$.getQuery=function(options){return $.parseQuery(window.location.search,options);};$.fn.parseQuery=function(options){return $.parseQuery($(this).serialize(),options);};}(jQuery));

// YOUTUBE VIDEO CODE
jQuery(document).ready(function($){
  
// BOOTSTRAP 3.0 - Open YouTube Video Dynamicaly in Modal Window
// Modal Window for dynamically opening videos
$('a[href^="https://www.youtube.com"]').on('click', function(e){
  // Store the query string variables and values
  // Uses "jQuery Query Parser" plugin, to allow for various URL formats (could have extra parameters)
  var queryString = $(this).attr('href').slice( $(this).attr('href').indexOf('?') + 1);
  var queryVars = $.parseQuery( queryString );
 
  // if GET variable "v" exists. This is the Youtube Video ID
  if ( 'v' in queryVars )
  {
    // Prevent opening of external page
    e.preventDefault();
 
    // Variables for iFrame code. Width and height from data attributes, else use default.
    var vidWidth = 1280; // default
    var vidHeight = 720; // default
    if ( $(this).attr('data-width') ) { vidWidth = parseInt($(this).attr('data-width')); }
    if ( $(this).attr('data-height') ) { vidHeight =  parseInt($(this).attr('data-height')); }
    var iFrameCode = '<div class="container"><div class="row"><div class="col-sm-10 col-sm-offset-1"><div class="video-container"><iframe width="' + vidWidth + '" height="'+ vidHeight +'" scrolling="no" allowtransparency="true" allowfullscreen="true" src="https://www.youtube.com/embed/'+  queryVars['v'] +'?rel=0&wmode=transparent&showinfo=0&autoplay=0" frameborder="0"></iframe></div></div></div></div>';
 
    // Replace Modal HTML with iFrame Embed
    $('#mediaModal .modal-body').html(iFrameCode);

 
    // Open Modal
    $('#mediaModal').modal();
  }
});
 
// Clear modal contents on close. 
// There was mention of videos that kept playing in the background.
$('#mediaModal').on('hidden.bs.modal', function () {
  $('#mediaModal .modal-body').html('');
});
 
}); 
</script>


  <?php
  $content = ob_get_contents();
  ob_end_clean();
  return $content;
}
add_shortcode('youtube-modal', __NAMESPACE__ . '\\youtube_modal');


/**
 * Protein Powder Query
 */
function protein_powder_query( $atts ) {
  ob_start(); 
  ?>

  <?php
    $args = array(
      'post_type' => 'product',
      'post_status' => 'publish',
      'posts_per_page' => 100,
      'tax_query' => array(
        array(
          'taxonomy' => 'type',
          'field'    => 'slug',
          'terms'    => array('paleo','primal','pegan'),
        ),
        array(
          'taxonomy' => 'product_cat',
          'field'    => 'slug',
          'terms'    => 'protein-powder',
        ),
      ),
    );

    $query = new \WP_Query( $args );
    while ( $query->have_posts() ) : $query->the_post();
    wc_get_template_part( 'content', 'product' );
    endwhile;
    wp_reset_postdata();
  ?>

  <?php
  $content = ob_get_contents();
  ob_end_clean();
  return $content;
}
add_shortcode('protein-powders', __NAMESPACE__ . '\\protein_powder_query');


/**
 * Facebook Reviews
 */
function facebook_reviews( $atts ) {
  ob_start(); 
  ?>

<section class="section-padding">

  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2 class="text-center margin-bottom-60">Facebook Reviews</h2>
      </div>
    </div>
  </div>
  <div id="fb_reviews" class="slider-arrows">
    <div class="container">
      <div id="review" class="row speaker-tiles">
        <div class="slide">
          <div class="fb-comment-embed background-white" data-href="https://www.facebook.com/julianbakery/photos/a.165408446828667.30393.105112046191641/950300815006089/?type=3&comment_id=1514813802146690&comment_tracking=%7B%22tn%22%3A%22R9%22%7D" data-width="220" data-include-parent="false"></div>
        </div>
        <div class="slide">
          <div class="fb-comment-embed background-white" data-href="https://www.facebook.com/julianbakery/photos/a.165408446828667.30393.105112046191641/1131791980190304/?type=3&amp;comment_id=1131899520179550" data-width="220" data-include-parent="false"></div>
        </div>
        <div class="slide">
          <div class="fb-comment-embed background-white" data-href="https://www.facebook.com/julianbakery/photos/a.165408446828667.30393.105112046191641/1129218157114353/?type=3&amp;comment_id=1129408850428617" data-width="220" data-include-parent="false"></div>
        </div>
        <div class="slide">
          <div class="fb-comment-embed background-white" data-href="https://www.facebook.com/julianbakery/photos/a.165408446828667.30393.105112046191641/1115214858514683/?type=3&amp;comment_id=1123555751013927" data-width="220" data-include-parent="false"></div>
        </div>
        <div class="slide">
          <div class="fb-comment-embed background-white" data-href="https://www.facebook.com/julianbakery/photos/a.165408446828667.30393.105112046191641/1085841334785369/?type=3&amp;comment_id=1085842324785270&amp;reply_comment_id=1087279171308252" data-width="220" data-include-parent="false"></div>
        </div>
        <div class="slide">
          <div class="fb-comment-embed background-white" data-href="https://www.facebook.com/julianbakery/photos/a.165408446828667.30393.105112046191641/1082186288484207/?type=3&amp;comment_id=1083594888343347" data-width="220" data-include-parent="false"></div>
        </div>
      </div>
    </div>
  </div>

</section>

<script>jQuery(function(a){a("#review").slick({arrows:!0,appendArrows:a("#fb_reviews"),prevArrow:'<div class="toggle-left"><i class="fa slick-prev fa-chevron-left"></i></div>',nextArrow:'<div class="toggle-right"><i class="fa slick-next fa-chevron-right"></i></div>',autoplay:!1,autoplaySpeed:8e3,speed:800,slidesToShow:4,slidesToScroll:4,accessibility:!1,dots:!1,responsive:[{breakpoint:992,settings:{slidesToShow:3,slidesToScroll:3}},{breakpoint:768,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:480,settings:{slidesToShow:1,slidesToScroll:1}}]}),a("#review").show()});</script>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>






  <?php
  $content = ob_get_contents();
  ob_end_clean();
  return $content;
}
add_shortcode('facebook-reviews', __NAMESPACE__ . '\\facebook_reviews');






