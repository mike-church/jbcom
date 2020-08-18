<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="p-3 border mb-3 shop_table woocommerce-checkout-review-order-table shadow">
	<?php
	do_action( 'woocommerce_review_order_before_cart_contents' ); ?>

	<h6>Product</h6>

	<?php
	foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
	$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

	if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
	?>

	<div class="d-flex flex-row justify-content-between py-1">
		<div>
			<?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times;&nbsp;%s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</div>
		<div>
			<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</div>
	</div>
	<?php
		}
	}

	do_action( 'woocommerce_review_order_after_cart_contents' );
	?>

	<div class="d-flex flex-row justify-content-between py-2 border-bottom border-top mt-2">
		<div><h6><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></h6></div>
		<div><?php wc_cart_totals_subtotal_html(); ?></div>
	</div>

	<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
	<div class="d-flex flex-row justify-content-between py-2 border-bottom cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
		<div><h6><?php wc_cart_totals_coupon_label( $coupon ); ?></h6></div>
		<div><?php wc_cart_totals_coupon_html( $coupon ); ?></div>
	</div>
	<?php endforeach; ?>

	<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

		<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

		<?php wc_cart_totals_shipping_html(); ?>

		<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

	<?php endif; ?>

	<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
	<div class="d-flex flex-row justify-content-between py-2 border-bottom">
		<div><h6><?php echo esc_html( $fee->name ); ?></h6></div>
		<div><?php wc_cart_totals_fee_html( $fee ); ?></div>
	</div>
	<?php endforeach; ?>

	<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
		<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
			<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited ?>
				<div class="d-flex flex-row justify-content-between py-2 border-bottom">
					<div><h6><?php echo esc_html( $tax->label ); ?></h6></div>
					<div><?php echo wp_kses_post( $tax->formatted_amount ); ?></div>
				</div>
			<?php endforeach; ?>
		<?php else : ?>
			<div class="d-flex flex-row justify-content-between py-2 border-bottom">
				<div><h6><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></h6></div>
				<div><?php wc_cart_totals_taxes_total_html(); ?></div>
			</div>
		<?php endif; ?>
	<?php endif; ?>

	<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

		<div class="d-flex flex-row justify-content-between pt-2">
			<div><h6><?php esc_html_e( 'Total', 'woocommerce' ); ?></h6></div>
			<div><?php wc_cart_totals_order_total_html(); ?></div>
		</div>

	<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

</div>