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


