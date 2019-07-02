<?php

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


// Add This Code

add_action( 'woocommerce_single_product_summary', 'fresh_start_addthis', 5 );
function fresh_start_addthis() {
   echo '<div class="addthis_inline_share_toolbox"></div>';
}

add_action( 'wp_footer', 'fresh_start_addthis_js', 100 );
function fresh_start_addthis_js() {
   // Only run this on the single product page
   if ( ! is_product() ) return;
   ?>
      <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58a72778826dc565"></script>

   <?php
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
				<div class="slide">
					<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'product-image');?>" class="img-fluid">
				</div>

				<?php if ( ! empty( $video ) ) { ?>

					<div class="iframe-container slide">
						<iframe src="https://www.youtube.com/embed/<?php echo $video_id;?>?rel=0&enablejsapi=1&showinfo=0" frameborder="0" allowfullscreen></iframe>
					</div>

					<?php
				} ?>

				<?php
				foreach( $attachment_ids as $attachment_id ) 
				{ echo '<div class="slide">' . wp_get_attachment_image($attachment_id, 'product-image') . '</div>'; }
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


/**
 * Remove product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {


    unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;
}




// Change Order of Upsell and Related Products

remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 20 );
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 30 );







