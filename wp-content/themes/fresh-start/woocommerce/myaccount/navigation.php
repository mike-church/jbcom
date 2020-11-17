<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );?>


<div class="col-12 mb-5">

<ul class="nav nav-pills">
  <li class="nav-item dropdown">
    <a class="nav-link active dropdown-toggle text-uppercase font-medium" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Menu</a>
    <div class="dropdown-menu">
		<a class="dropdown-item" href="/my-account/">Dashboard</a>
		<?php $current_user = wp_get_current_user(); if ( current_user_can( 'buy_wholesale' ) ): ?>
			<a class="dropdown-item" href="/wholesale-ordering/">Wholesale Order Form</a>
		<?php endif; ?>
		<a class="dropdown-item" href="/my-account/orders/">Orders</a>
		<a class="dropdown-item" href="/my-account/edit-address/">Addresses</a>
		<a class="dropdown-item" href="/my-account/edit-account/">Account Details</a>
		<a class="dropdown-item" href="/my-account/payment-methods/">Payment Methods</a>
		<!--<a class="dropdown-item" href="/my-account/giftcards/">Gift Cards</a>-->
		<?php $current_user = wp_get_current_user(); if ( current_user_can( 'customer' ) ): ?>
			<a class="dropdown-item" href="/affiliates/">Affiliate Program</a>
		<?php endif; ?>
		<a class="dropdown-item" href="<?php echo wp_logout_url(get_permalink()); ?>">Logout</a>
    </div>
  </li>
</ul>


<!--
<ul class="nav flex-lg-column">
			<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
				<li class="nav-item <?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
					<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>" class="nav-link"><?php echo esc_html( $label ); ?></a>
				</li>
			<?php endforeach; ?>
		</ul>

-->


</div>


<!--

<div class="row">
	
	<div class="col-sm-12 col-lg-3 order-lg-2 mb-5 mb-lg-0">
		
	</div>

-->

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
