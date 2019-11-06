<?php

// Cart Empty Message

remove_action( 'woocommerce_cart_is_empty', 'wc_empty_cart_message', 10 );
add_action( 'woocommerce_cart_is_empty', 'fresh_start_cart_empty_message', 10 );
function fresh_start_cart_empty_message() {
    echo '<section class="pt-5"><div class="container my-5"><h4 class="cart-empty text-center">' . wp_kses_post( apply_filters( 'wc_empty_cart_message', __( 'Your cart is currently empty.', 'woocommerce' ) ) ) . '</h4></div></section>';
}

// Change Alert Messages

add_filter ( 'wc_add_to_cart_message', 'wc_add_to_cart_message_filter', 10, 2 );
function wc_add_to_cart_message_filter($message, $product_id = null) {
    $titles[] = get_the_title( $product_id );

    $titles = array_filter( $titles );
    $added_text = sprintf( _n( 'Successfully added to your cart.', 'Products have been added to your cart.', sizeof( $titles ), 'woocommerce' ), wc_format_list_of_items( $titles ) );

		$message = sprintf( '%s <a href="%s">%s</a>&nbsp;|&nbsp;<a href="%s">%s</a>',
            esc_html( $added_text ),
            esc_url( wc_get_page_permalink( 'shop' ) ),
            esc_html__( 'Continue Shopping', 'woocommerce' ),
            esc_url( wc_get_page_permalink( 'cart' ) ),
            esc_html__( 'View Cart', 'woocommerce' ));

    return $message;
}


remove_action( 'woocommerce_before_customer_login_form', 'woocommerce_output_all_notices', 10 );
remove_action( 'woocommerce_before_lost_password_form', 'woocommerce_output_all_notices', 10 );

