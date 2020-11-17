<?php
/**
 * Gift Cards form in the Cart/Checkout
 *
 * Shows an HTML form in the cart/checkout page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/apply-gift-card-form.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce Gift Cards
 * @since   1.3.5
 * @version 1.3.5
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_gc_before_apply_gift_card_form' );

?><div class="add_gift_card_form">
	<h6><?php esc_html_e( 'Have a Gift Card?', 'woocommerce-gift-cards' ); ?></h6>
	<div id="wc_gc_cart_redeem_form" class="d-flex flex-row justify-content-start">
		<input placeholder="<?php esc_attr_e( 'Enter your code&hellip;', 'woocommerce-gift-cards' ); ?>" type="text" name="wc_gc_cart_code" id="wc_gc_cart_code" autocomplete="off" class="p-2 mr-1" style="box-sizing:border-box; outline:0; width:auto; font-size:1rem;" />
		<button type="button" name="wc_gc_cart_redeem_send" id="wc_gc_cart_redeem_send" class="btn btn-primary" style="width:auto;"><?php esc_html_e( 'Apply', 'woocommerce-gift-cards' ); ?></button>
	</div>
</div><?php

do_action( 'woocommerce_gc_after_apply_gift_card_form' );
?>
