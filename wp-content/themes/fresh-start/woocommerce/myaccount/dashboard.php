<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>



	<h2 class="mb-5">Your Account</h2>

	<p class="mb-5"><?php
		/* translators: 1: user display name 2: logout url */
		printf(
			__( 'Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'woocommerce' ),
			'<strong>' . esc_html( $current_user->display_name ) . '</strong>',
			esc_url( wc_logout_url( wc_get_page_permalink( 'myaccount' ) ) )
		);
	?></p>


<div class="row">
	<div class="col-sm-6">
		<div class="card mb-4" data-mh>
			<div class="card-body">
				<div class="display-4"><i class="icon-package mdc-text-red-500"></i></div>
				<h5>Orders</h5>
				<p>View your current/past orders and tracking info.</p>
			</div>
			<div class="card-footer">
				<a href="/my-account/orders/" class="btn btn-primary btn-sm">View</a>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="card mb-4" data-mh>
			<div class="card-body">
				<div class="display-4"><i class="icon-address-card mdc-text-orange-500"></i></div>
				<h5>Addresses</h5>
				<p>Manage your billing and shipping address.</p>
			</div>
			<div class="card-footer">
				<a href="/my-account/edit-address/" class="btn btn-primary btn-sm">Manage</a>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="card mb-4" data-mh>
			<div class="card-body">
				<div class="display-4"><i class="icon-user mdc-text-pink-500"></i></div>
				<h5>Account Details</h5>
				<p>Change your password, update your email, and display name.</p>
			</div>
			<div class="card-footer">
				<a href="/my-account/edit-account/" class="btn btn-primary btn-sm">Manage</a>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="card mb-4" data-mh>
			<div class="card-body">
				<div class="display-4"><i class="icon-credit-card mdc-text-green-500"></i></div>
				<h5>Payment Methods</h5>
				<p>Manage your payment methods.</p>
			</div>
			<div class="card-footer">
				<a href="/my-account/payment-methods/" class="btn btn-primary btn-sm">Manage</a>
			</div>
		</div>
	</div>
</div>






<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */


