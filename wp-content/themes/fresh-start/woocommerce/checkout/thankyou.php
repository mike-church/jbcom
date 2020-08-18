<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>


<?php if ( $order ) :

	do_action( 'woocommerce_before_thankyou', $order->get_id() ); ?>

	<?php if ( $order->has_status( 'failed' ) ) : ?>

		<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

		<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
			<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
			<?php if ( is_user_logged_in() ) : ?>
				<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</p>

	<?php else : ?>

		<div class="col-12">

		<h2 class="mb-5 woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h2>

		<div class="d-flex flex-column flex-lg-row justify-content-between py-3 mb-3" style="border-bottom:#E0E0E0 solid 4px;">

			<div class="mb-2 mb-lg-0">
				<small><?php esc_html_e( 'ORDER NUMBER:', 'woocommerce' ); ?></small><br/>
				<strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
			</div>

			<div class="mb-2 mb-lg-0">
				<small><?php esc_html_e( 'DATE:', 'woocommerce' ); ?></small><br/>
				<strong><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
			</div>

			<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
				<div class="mb-2 mb-lg-0">
					<small><?php esc_html_e( 'EMAIL:', 'woocommerce' ); ?></small><br/>
					<strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</div>
			<?php endif; ?>

			<div class="mb-2 mb-lg-0">
				<small><?php esc_html_e( 'TOTAL:', 'woocommerce' ); ?></small><br/>
				<strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
			</div>

			<?php if ( $order->get_payment_method_title() ) : ?>
				<div class="mb-2 mb-lg-0">
					<small><?php esc_html_e( 'PAYMENT METHOD:', 'woocommerce' ); ?></small><br/>
					<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
				</div>
			<?php endif; ?>

		</div>
	</div>


<?php endif; ?>


	<div class="col-12"><?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?></div>
	<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>
	


<?php else : ?>

	<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

<?php endif; ?>


