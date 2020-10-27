<?php
/**
 * The template for displaying registration form
 *
 * Override this template by copying it to yourtheme/woocommerce/wwlc-login-form.php
 *
 * @author 		Rymera Web Co
 * @package 	WooCommerceWholeSaleLeadCapture/Templates
 * @version     1.8.0
 */

if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// NOTE: Don't Remove any ID or Classes inside this template when overriding it.
// Some JS Files Depend on it. You are free to add ID and Classes without any problem.

?>

<div class="container-fluid login">
	<div class="row">
		<div class="col-md-6 col-lg-5 col-xl-4">
			<div class="d-flex flex-column justify-content-between vh-100">
				<div class="pl-3 pt-3">
					<a href="/home" class="color-logo header-logo"></a>
				</div>

				<div class="px-3 py-5">
					<h5>Wholesale Log In</h5>
					<p>Need a Julian Bakery Wholesale Account? <a class="register_link" href="<?php echo wwlc_get_url_of_page_option( 'wwlc_general_registration_page' ); ?>" ><?php _e( 'Apply for an account' , 'woocommerce-wholesale-lead-capture' ); ?></a></p>

					<div id="wwlc-login-form">

						<?php do_action( 'wwlc_before_login_form', $args ); ?>

						<form name="<?php echo esc_attr( $args[ 'form_id' ] ); ?>" id="<?php echo esc_attr( $args[ 'form_id' ] ); ?>" action="<?php echo esc_attr( $args[ 'form_action' ] ); ?>" method="<?php echo esc_attr( $args[ 'form_method' ] ); ?>">

							<p class="login-username woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
								<label for="<?php echo esc_attr( $args[ 'id_username' ] ); ?>">
									Username or email address
									<span style="color:red">*</span>
								</label>
								<input type="text" name="wwlc_username" id="<?php echo esc_attr( $args[ 'id_username' ] ); ?>" class="input" value="<?php echo esc_attr( $args[ 'value_username' ] ); ?>" size="20" />
							</p>

							<p class="login-password woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
								<label for="<?php echo esc_attr( $args[ 'id_password' ] ); ?>"><?php echo esc_html( $args[ 'label_password' ] ); ?> <span style="color:red">*</span></label>
								<input type="password" name="wwlc_password" id="<?php echo esc_attr( $args[ 'id_password' ] ); ?>" class="input" value="" size="20" />
							</p>

							<?php do_action( 'wwlc_login_forms', $args ); ?>

							<p class="login-submit">
								<input type="submit" name="wp-submit" id="<?php echo esc_attr( $args[ 'id_submit' ] ); ?>" class="btn btn-primary btn-block" value="<?php echo esc_attr( $args[ 'label_log_in' ] ); ?>" />
								<input type="hidden" name="redirect_to" value="<?php echo esc_url( $args[ 'redirect' ] ); ?>" />
							</p>



							<?php if ( $args[ 'remember' ] ) : ?>
								<p class="login-remember m-0 text-center">
									<label>
										<input name="rememberme" type="checkbox" id="<?php echo esc_attr( $args[ 'id_remember' ] ); ?>" value="forever"<?php checked( $args[ 'value_remember' ] , true ); ?> />
										<?php echo esc_html( $args[ 'label_remember' ] ); ?>
									</label>
								</p>
							<?php endif; ?>
							
							<?php wp_nonce_field( 'wwlc_login_form', 'wwlc_login_form_nonce_field' ); ?>

						</form>

						<?php do_action( 'wwlc_after_login_form', $args ); ?>

						
						<div class="text-center"><a class="lost_password_link" href="<?php echo wp_lostpassword_url(); ?>" ><?php _e( 'Lost your password?' , 'woocommerce-wholesale-lead-capture' ); ?></a></div>

					</div><!--#wwlc-login-form-->

				</div>	
				
				<div class="pl-3">
					<p><small>&copy; <?php echo date("Y");?> Julian Bakery. All rights reserved.</small></p>
				</div>

			</div>
		</div>
		
		<div class="d-none d-md-block col-md-6 col-lg-7 col-xl-8 vh-100 mdc-bg-grey-100 login-image"></div>

	</div>
</div>
