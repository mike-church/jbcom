<?php

// Add theme support for woocommerce

function freshstart_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}

add_action( 'after_setup_theme', 'freshstart_add_woocommerce_support' );

// Ajax code for showing cart count in header

add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
		<sup><?php echo $woocommerce->cart->cart_contents_count;?></sup>
	<?php
	$fragments['sup'] = ob_get_clean();
	return $fragments;
}

// Hide Product Tags

add_action('init', function() {
    register_taxonomy('product_tag', 'product', [
        'public'            => false,
        'show_ui'           => false,
        'show_admin_column' => false,
        'show_in_nav_menus' => false,
        'show_tagcloud'     => false,
    ]);
}, 100);

add_action( 'admin_init' , function() {
    add_filter('manage_product_posts_columns', function($columns) {
        unset($columns['product_tag']);
        return $columns;
    }, 100);
});

// Prevents Additional Items Added to Cart on page refresh

add_action('add_to_cart_redirect', 'resolve_dupes_add_to_cart_redirect');
function resolve_dupes_add_to_cart_redirect($url = false) {
     if(!empty($url)) { return $url; }
     return get_bloginfo('wpurl').add_query_arg(array(), remove_query_arg('add-to-cart'));
}

// Stop Heartbeat API for backend performace
add_action( 'init', 'stop_heartbeat', 1 );
function stop_heartbeat() {
	wp_deregister_script('heartbeat');
}

// HOOKS

// Full hook removals

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10);

// Hook customizations



remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
add_action('woocommerce_before_main_content', 'fresh_start_wrapper_start', 10);
function fresh_start_wrapper_start() { 

	if ( is_shop() ) { ?>
		<main>
			<section class="py-5">
				<div class="container-fluid">

					<div class="row">
						<div class="col-sm-12 col-md-3 col-xl-2 ml-auto">
							<div class="d-flex justify-content-between align-items-center pb-3 border-bottom">
								<div class="text-uppercase font-medium">Filter</div>
								<button onclick="FWP.reset()" class="btn btn-link pr-0"><i class="icon-redo" aria-hidden="true"></i></button>
							</div>
						</div>
						<div class="col-sm-12 col-md-9 col-xl-8 mr-auto">
							<div class="d-flex justify-content-between align-items-center pb-3">
								<?php echo do_shortcode('[facetwp counts="true"]');?>
								<?php echo do_shortcode('[facetwp sort="true"]') ;?>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12 col-md-3 col-xl-2 ml-auto pt-3">
							<?php echo facetwp_display( 'facet', 'diet' ); ?>
							<?php echo facetwp_display( 'facet', 'categories' ); ?>
							<?php echo facetwp_display( 'facet', 'product_line' ); ?>
							<?php echo facetwp_display( 'facet', 'sale_items' ); ?>
						</div>
						<div class="col-sm-12 col-md-9 col-xl-8 mr-auto">
	<?php } 

}

// End Main Content Wrapper

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_after_main_content', 'fresh_start_wrapper_end', 10);
function fresh_start_wrapper_end() { 
	if ( is_shop() ) { ?>
						</div>
					</div>
				</div>
			</section>
		</main>
	<?php }
}

// PRODUCT CARDS

// Begin Thumbnail

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'fresh_start_card_thumb', 10 );
function fresh_start_card_thumb() { ?>
	<div class="card-header">
		<div class="square img-bg-contain" style="background-image:url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'medium');?>)"></div>
	</div>
<?php
}

// Begin Card Body

add_action( 'woocommerce_shop_loop_item_title', 'fresh_start_begin_card_body', 5 );
function fresh_start_begin_card_body() {
echo '<div class="card-body">';
}

// Card Product title

remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
add_action('woocommerce_shop_loop_item_title', 'fresh_start_shop_loop_item_title', 10);

function fresh_start_shop_loop_item_title() { ?>
	<h6><?php echo the_title();?></h6>
	<?php
}

// End Card Body

add_action( 'woocommerce_after_shop_loop_item_title', 'fresh_start_end_card_body', 15 );
function fresh_start_end_card_body() {
echo '</div>';
}

// Remove Add to Cart button

remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

// End Card Body

remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_close', 10);


// PRODUCT PAGE


// Change sale price order

add_filter( 'woocommerce_get_price_html', 'PREFIX_woocommerce_price_html', 100, 2 );
function PREFIX_woocommerce_price_html( $price, $product ){
    return preg_replace('@(<del>.*?</del>).*?(<ins>.*?</ins>)@misx', '$2 $1', $price);
}

// Move Sale Flash to Summary

remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_show_product_sale_flash', 0);

// Remove Short Description

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
add_action('add_meta_boxes', 'remove_short_description', 999);
function remove_short_description() {
     remove_meta_box( 'postexcerpt', 'product', 'normal');
}

// Cart Form on Product Page

add_action( 'woocommerce_before_add_to_cart_quantity', 'fresh_start_start_cart_wrapper' );
function fresh_start_start_cart_wrapper() {
   echo '<div class="d-flex flex-wrap py-3"><div class="cart-quantity"><label>Qty</label>';
}

add_action( 'woocommerce_after_add_to_cart_quantity', 'fresh_start_display_quantity_plus' );
function fresh_start_display_quantity_plus() {
   echo '</div><div class="quantity-btns"><button type="button" class="plus" ><i class="icon-plus"></i></button><button type="button" class="minus" ><i class="icon-minus"></i></button></div>';
}

add_action( 'woocommerce_after_add_to_cart_button', 'fresh_start_end_cart_wrapper', 10 );
function fresh_start_end_cart_wrapper() {
   echo '</div>';
}
 
// Trigger jQuery script
 
add_action( 'wp_footer', 'fresh_start_add_cart_quantity_plus_minus', 100 );
function fresh_start_add_cart_quantity_plus_minus() {
   // Only run this on the single product page
   if ( ! is_product() ) return;
   ?>
      <script type="text/javascript">
          
      jQuery(document).ready(function($){   
          
         $('form.cart').on( 'click', 'button.plus, button.minus', function() {
 
            // Get current quantity values
            var qty = $( this ).closest( 'form.cart' ).find( '.qty' );
            var val   = parseFloat(qty.val());
            var max = parseFloat(qty.attr( 'max' ));
            var min = parseFloat(qty.attr( 'min' ));
            var step = parseFloat(qty.attr( 'step' ));
 
            // Change the value if plus or minus
            if ( $( this ).is( '.plus' ) ) {
               if ( max && ( max <= val ) ) {
                  qty.val( max );
               } else {
                  qty.val( val + step );
               }
            } else {
               if ( min && ( min >= val ) ) {
                  qty.val( min );
               } else if ( val > 1 ) {
                  qty.val( val - step );
               }
            }
             
         });
          
      });
          
      </script>

   <?php
}

// Remove Category Taxonomy Links

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

// Custom Product Slider

remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
add_action( 'woocommerce_before_single_product_summary', 'fresh_start_product_gallery', 30 );
function fresh_start_product_gallery() { 

	global $product;
	$attachment_ids = $product->get_gallery_attachment_ids();
	$video = rwmb_meta( 'video_youtube_id' );
	$video_url = $video;
	$video_id = preg_replace('#^https?://youtu.be/#', '', $video_url);

	?>

<div class="row">
<div class="col-lg-10">
<div class="slick-for">
<div><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'product-image');?>" class="img-fluid"></div>

<?php if ( ! empty( $video ) ) { ?>

	<div class="iframe-container">
		<iframe src="https://www.youtube.com/embed/<?php echo $video_id;?>?rel=0&enablejsapi=1&showinfo=0" frameborder="0" allowfullscreen></iframe>
		<!--<iframe width="560" height="315" src="https://www.youtube.com/embed/WuFQbQ9Gwdk?rel=0&enablejsapi=1" frameborder="0" allowfullscreen></iframe>-->
	</div>

	<?php
} ?>

<?php
foreach( $attachment_ids as $attachment_id ) 
{ echo '<div>' . wp_get_attachment_image($attachment_id, 'product-image') . '</div>'; }
?>

</div>
</div>
<div class="col col-lg-2">
<div class="slider-nav">
<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'shop_thumbnail');?>" class="img-fluid">

<?php if ( ! empty( $video ) ) echo '<img src="/wp-content/themes/fresh-start/dist/images/video-icon.png" class="img-fluid">';?>

<?php
foreach( $attachment_ids as $attachment_id ) 
{ echo wp_get_attachment_image($attachment_id, 'thumbnail'); }
?>


</div>
</div>
</div>

<?php
}

// Trigger Slider Options

add_action( 'wp_footer', 'fresh_start_product_slider', 90 );
function fresh_start_product_slider() {
   // Only run this on the single product page
   if ( ! is_product() ) return;
   ?>

	<script type="text/javascript">
	$(document).ready(function(){

	    $(".slick-for").on("beforeChange", function(event, slick) {
	      var currentSlide, slideType, player, command;
	      currentSlide = $(slick.$slider).find(".slick-current");
	      slideType = currentSlide.attr("class").split(" ")[1];
	      player = currentSlide.find("iframe").get(0);
	      
	      if (slideType == "vimeo") {
	        command = {
	          "method": "pause",
	          "value": "true"
	        };								
	      } else {
	        command = {
	          "event": "command",
	          "func": "pauseVideo"
	        };
	      }

	      //check if the player exists.
	      if (player != undefined) {
	        //post our command to the iframe.
	        player.contentWindow.postMessage(JSON.stringify(command), "*");
	      }
	    });
	    
	    //start the slider
	    $(".slick-for").slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			fade: true,
			adaptiveHeight: true,
			asNavFor: '.slider-nav',
	    });

	    $('.slider-nav').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			asNavFor: '.slick-for',
			dots: false,
			focusOnSelect: true,
			vertical: true,

			responsive: [
		    {
		      breakpoint: 1200,
		      settings: {
		      }
		    },
		    {
		      breakpoint: 992,
		      settings: {
		      	vertical: false,
		      }
		    },
		    {
		      breakpoint: 768,
		      settings: {
				vertical: false,
				centerMode: true,
				slidesToShow: 3,
				variableWidth: true,
		      }
		    }
		    // You can unslick at a given breakpoint now by adding:
		    // settings: "unslick"
		    // instead of a settings object
		  ]
		});

	  });

	</script>

	<?php
}

// Rename Product Tabs

add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {
	$tabs['description']['title'] = __( 'Overview' );
	return $tabs;
}

// Change Order of Upsell and Related Products

remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 20 );
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 30 );













