<?php
/*
* Template name: Register
*/
?>
<?php if(is_user_logged_in()){
	wp_redirect(get_permalink(get_option('woocommerce_myaccount_page_id')));
} ?>
<?php get_header();?>
<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<div class="container-fluid login">
	<div class="row">
		<div class="col-sm-6 vh-100">
			<div class="d-flex flex-column flex-wrap justify-content-between vh-100">
				<div>
					<h1 class="mt-2"><a href="/home">Julian Bakery</a></h1>
				</div>

				<div>

					<?php echo wc_print_notices();?>
	

<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
<?php do_action( 'woocommerce_register_form_start' ); ?>
<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
<label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
</p>
<?php endif; ?>
<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
<label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
</p>
<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
<label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
</p>
<?php else : ?>
<p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>
<?php endif; ?>
<?php do_action( 'woocommerce_register_form' ); ?>
<p class="woocommerce-FormRow form-row">
<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
<button type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
</p>
<?php do_action( 'woocommerce_register_form_end' ); ?>
</form>


				</div>

				<div>
					<p><small>&copy; <?php echo date("Y");?> Julian Bakery. All rights reserved.</small></p>
				</div>


			</div>
		</div>
		<div class="col-sm-6 vh-100 mdc-bg-blue-500">test</div>
	</div>
</div>




<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
<?php get_footer();?>