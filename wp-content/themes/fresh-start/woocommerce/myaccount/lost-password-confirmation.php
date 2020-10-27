<?php
/**
 * Lost password confirmation text.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/lost-password-confirmation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.9.0
 */

defined( 'ABSPATH' ) || exit;

?>

<div class="container-fluid login">
	<div class="row">
		<div class="col-md-6 col-lg-5 col-xl-4">
			<div class="d-flex flex-column justify-content-between vh-100">
				<div class="pl-3 pt-3">
					<a href="/home" class="color-logo header-logo"></a>
				</div>

				<div class="px-5">
					<?php wc_print_notice( esc_html__( 'Password reset email has been sent.', 'woocommerce' ) );?>
					<p><span class="font-bold">A password reset email has been sent to the email address on file for your account</span>, but may take several minutes to show up in your inbox. Please wait at least 10 minutes before attempting another reset.</p>
				</div>

				<div>
					<p><small>&copy; <?php echo date("Y");?> Julian Bakery. All rights reserved.</small></p>
				</div>

			</div>
		</div>
		
		<div class="d-none d-md-block col-md-6 col-lg-7 col-xl-8 vh-100 mdc-bg-grey-100 login-image"></div>
		
	</div>
</div>