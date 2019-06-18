<?php

function freshstart_scripts() {
	
	wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/dist/css/style.min.css', '', 'beta-1.3.35' );
	wp_register_style('google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:300,400,500,900', false, null);
	wp_enqueue_style('google-fonts');

	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js', array(), null, true);
	wp_enqueue_script( 'mainjs', get_template_directory_uri() . '/dist/js/main.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'freshstart_scripts' );

/** Disable Ajax Call from WooCommerce */
add_action( 'wp_enqueue_scripts', 'dequeue_woocommerce_cart_fragments', 11); 
function dequeue_woocommerce_cart_fragments() { if (is_home() || is_front_page() || is_single() || is_page('home', 'shop') ) wp_dequeue_script('wc-cart-fragments'); }

/** Disable All WooCommerce  Styles and Scripts Except Shop Pages*/
add_action( 'wp_enqueue_scripts', 'dequeue_woocommerce_styles_scripts', 99 );
function dequeue_woocommerce_styles_scripts() {
if ( function_exists( 'is_woocommerce' ) ) {
if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
# Styles
wp_dequeue_style( 'woocommerce-general' );
wp_dequeue_style( 'woocommerce-layout' );
wp_dequeue_style( 'woocommerce-smallscreen' );
wp_dequeue_style( 'woocommerce_frontend_styles' );
wp_dequeue_style( 'woocommerce_fancybox_styles' );
wp_dequeue_style( 'woocommerce_chosen_styles' );
wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
# Scripts
wp_dequeue_script( 'wc_price_slider' );
wp_dequeue_script( 'wc-single-product' );
wp_dequeue_script( 'wc-add-to-cart' );
wp_dequeue_script( 'wc-cart-fragments' );
wp_dequeue_script( 'wc-checkout' );
wp_dequeue_script( 'wc-add-to-cart-variation' );
wp_dequeue_script( 'wc-single-product' );
wp_dequeue_script( 'wc-cart' );
wp_dequeue_script( 'wc-chosen' );
wp_dequeue_script( 'woocommerce' );
wp_dequeue_script( 'prettyPhoto' );
wp_dequeue_script( 'prettyPhoto-init' );
wp_dequeue_script( 'jquery-blockui' );
wp_dequeue_script( 'jquery-placeholder' );
wp_dequeue_script( 'fancybox' );
wp_dequeue_script( 'jqueryui' );
}
}
}