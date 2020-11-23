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
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
?>


<div class="col-12 mb-3">

	<h2>Your Account</h2>

	<p><?php
		/* translators: 1: user display name 2: logout url */
		printf(
			__( 'Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'woocommerce' ),
			'<strong>' . esc_html( $current_user->display_name ) . '</strong>',
			esc_url( wc_logout_url( wc_get_page_permalink( 'myaccount' ) ) )
		);
	?></p>

</div>

<?php
$current_user = wp_get_current_user(); 

if ( current_user_can( 'buy_wholesale' ) ): ?>

    <div class="col-sm-6 col-md-4">
		<div class="card mb-4 shadow" data-mh>
			<div class="card-body">
				<div class="display-4"><i class="icon-form mdc-text-indigo-500"></i></div>
				<h5>Wholesale Order Form</h5>
				<p>Purchase products on one convenient page.</p>
			</div>
			<div class="card-footer">
				<a href="/wholesale-ordering/" class="btn btn-primary btn-sm">View</a>
			</div>
		</div>
	</div>

<?php endif; ?>

<div class="col-sm-6 col-md-4">
	<div class="card mb-4 shadow" data-mh>
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
<div class="col-sm-6 col-md-4">
	<div class="card mb-4 shadow" data-mh>
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
<div class="col-sm-6 col-md-4">
	<div class="card mb-4 shadow" data-mh>
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
<div class="col-sm-6 col-md-4">
	<div class="card mb-4 shadow" data-mh>
		<div class="card-body">
			<div class="display-4"><i class="icon-credit-card mdc-text-teal-500"></i></div>
			<h5>Payment Methods</h5>
			<p>Manage your payment methods.</p>
		</div>
		<div class="card-footer">
			<a href="/my-account/payment-methods/" class="btn btn-primary btn-sm">Manage</a>
		</div>
	</div>
</div>
<div class="col-sm-6 col-md-4">
	<div class="card mb-4 shadow" data-mh>
		<div class="card-body">
			<div class="display-4"><i class="icon-gift-card mdc-text-purple-500"></i></div>
			<h5>Gift Cards</h5>
			<p>Add a Julian Bakery gift card to your account and track balance.</p>
		</div>
		<div class="card-footer">
			<a href="/my-account/giftcards/" class="btn btn-primary btn-sm">Manage</a>
		</div>
	</div>
</div>

	<?php
	$current_user = wp_get_current_user(); 

	if ( current_user_can( 'customer' ) ): ?>

	    <div class="col-sm-6 col-md-4">
			<div class="card mb-4 shadow" data-mh>
				<div class="card-body">
					<div class="display-4"><i class="icon-us-dollar mdc-text-green-500"></i></div>
					<h5>Affiliate Program</h5>
					<p>Earn extra money by reffering people you know.</p>
				</div>
				<div class="card-footer">
					<a href="/affiliates/" class="btn btn-primary btn-sm">View</a>
				</div>
			</div>
		</div>

	<?php endif; ?>

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