<?php
/**
 * The template for displaying registration form
 *
 * Override this template by copying it to yourtheme/woocommerce/wwlc-registration-form.php
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
		<div class="col-12">
			<div class="d-flex flex-column justify-content-between vh-100">
				<div class="pl-3 pt-3">
					<a href="/home" class="color-logo header-logo"></a>
				</div>

				<div class="px-3 py-5">

					<div class="mx-auto" style="max-width:600px;">

						<h5>Wholesale Application</h5>
						<p>Use the form below to apply for a Julian Bakery Wholsale Account. Already have and account? <a href="/wholesale-login">Log in</a></p>

						<div id="wwlc-registration-form" data-redirect="<?php echo esc_attr( $redirect ); ?>"><?php

							$formProcessor->wwlc_initialize_registration_form();

							foreach ( $formFields as $field )
								$formProcessor->wwlc_form_field( $field );
						?>
							<div class="field-set form-controls-section">
								<?php echo $formProcessor->wwlc_get_form_controls(); ?>
							</div>

							<?php $formProcessor->wwlc_end_registration_form( $options ); ?>

						</div><!--#wwlc-registration-form-->

					</div>

				</div>	
				
				<div class="pl-3">
					<p><small>&copy; <?php echo date("Y");?> Julian Bakery. All rights reserved.</small></p>
				</div>

			</div>
		</div>
	</div>
</div>