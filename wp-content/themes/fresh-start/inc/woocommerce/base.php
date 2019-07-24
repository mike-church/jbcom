<?php

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

// Prevent PO box shipping
add_action('woocommerce_after_checkout_validation', 'deny_pobox_postcode');

function deny_pobox_postcode( $posted ) {
  global $woocommerce;

  $address  = ( isset( $posted['shipping_address_1'] ) ) ? $posted['shipping_address_1'] : $posted['billing_address_1'];
  $postcode = ( isset( $posted['shipping_postcode'] ) ) ? $posted['shipping_postcode'] : $posted['billing_postcode'];

  $replace  = array(" ", ".", ",");
  $address  = strtolower( str_replace( $replace, '', $address ) );
  $postcode = strtolower( str_replace( $replace, '', $postcode ) );

  if ( strstr( $address, 'pobox' ) || strstr( $postcode, 'pobox' ) ) {
    wc_add_notice( sprintf( __( "Sorry, we cannot ship to PO BOX addresses.") ) ,'error' );
  }
}