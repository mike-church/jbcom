<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.2
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_lost_password_form' );
?>

<div class="container-fluid login">
	<div class="row">
		<div class="col-md-6 col-lg-5 col-xl-4">
			<div class="d-flex flex-column justify-content-between vh-100">
				<div class="pl-3 pt-3">
					<a href="/home" class="color-logo header-logo"></a>
				</div>

				<div class="px-3 py-5">
					<h5>Lost your password?</h5>

					<form method="post" class="woocommerce-ResetPassword lost_reset_password">

					<p><?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></p><?php // @codingStandardsIgnoreLine ?>

					<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
					<label for="user_login"><?php esc_html_e( 'Username or email', 'woocommerce' ); ?></label>
					<input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="user_login" id="user_login" autocomplete="username" />
					</p>

					<div class="clear"></div>

					<?php do_action( 'woocommerce_lostpassword_form' ); ?>

					<p class="woocommerce-form-row form-row">
					<input type="hidden" name="wc_reset_password" value="true" />
					<button type="submit" class="btn btn-primary" value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>"><?php esc_html_e( 'Reset password', 'woocommerce' ); ?></button>
					</p>

					<?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>

					</form>

				</div>

				<div class="pl-3">
					<p><small>&copy; <?php echo date("Y");?> Julian Bakery. All rights reserved.</small></p>
				</div>

			</div>
		</div>
		
		<div class="d-none d-md-block col-md-6 col-lg-7 col-xl-8 vh-100 mdc-bg-grey-100 login-image"></div>
		
	</div>
</div>

<?php
do_action( 'woocommerce_after_lost_password_form' );