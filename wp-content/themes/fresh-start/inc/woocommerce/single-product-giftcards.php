<?php

add_filter( 'template_include', 'custom_single_product_template_include', 50, 1 );
function custom_single_product_template_include( $template ) {
    if ( is_singular('product') && (has_term( 'gift-cards', 'product_cat')) ) {
        $template = get_stylesheet_directory() . '/woocommerce/single-product-giftcard.php';
    } 
    return $template;
}