<?php

add_action( 'woocommerce_before_cart', 'fresh_start_before_cart' );
function fresh_start_before_cart() {
	echo '<div class="container py-5">';
}

add_action( 'woocommerce_after_cart', 'fresh_start_after_cart' );
function fresh_start_after_cart() {
	echo '</div>';
}

remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');

add_filter( 'woocommerce_ship_to_different_address_checked', '__return_false' );

/**
 * Hide shipping rates when free shipping is available.
 * Updated to support WooCommerce 2.6 Shipping Zones.
 *
 * @param array $rates Array of rates found for the package.
 * @return array
 */
function my_hide_shipping_when_free_is_available( $rates ) {
	$free = array();
	foreach ( $rates as $rate_id => $rate ) {
		if ( 'free_shipping' === $rate->method_id ) {
			$free[ $rate_id ] = $rate;
			break;
		}
	}
	return ! empty( $free ) ? $free : $rates;
}
add_filter( 'woocommerce_package_rates', 'my_hide_shipping_when_free_is_available', 100 );


