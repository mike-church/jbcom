<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

$jb_notice = rwmb_meta( 'jb_product_notice_notice' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<main>

	<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<?php

		// Use the build-in function if WP
		if(wp_is_mobile()) // On mobile
		{
		    $feature_image = rwmb_meta( 'feature_image_image', 'size=sixteen-nine' );
		}
		else
		{
		    $feature_image = rwmb_meta( 'feature_image_image', 'size=sixteen-nine-large' );
		}

		if ( ! empty( $feature_image ) ) { ?>

			<div class="feature-image img-bg-cover mbc-bg-grey-100" style="background-image:url('<?php foreach ( $feature_image as $image ) { echo $image['url']; } ?>');"></div>

			<?php } 
		?>

	<section class="py-5">
		<div class="container">
			<div class="row">

				<div class="col-lg-7 order-2 order-lg-1">
					<?php
					/**
					 * Hook: woocommerce_before_single_product_summary.
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked fresh_start_feature_facts - 20
					 * @hooked fresh_start_nutritional_panel -50
					 * @hooked comments_template -80
					 * @hooked woocommerce_show_product_images - 20
					 */
					do_action( 'woocommerce_before_single_product_summary' );
					?>
				</div>

				<div class="col-lg-5 order-1 order-lg-2">
					<div class="p-4 mb-5 border shadow-sm sticky-top price-block">
					<?php
					/**
					* Hook: woocommerce_single_product_summary.
					*
					* @hooked woocommerce_show_product_sale_flash - 5
					* @hooked woocommerce_template_single_price - 10
					* @hooked woocommerce_template_single_rating - 20
					* @hooked woocommerce_template_single_add_to_cart - 40
					*/
					do_action( 'woocommerce_single_product_summary' );
					?>
					</div>
				</div>

			</div>
		</div>
	</section>



	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>



</main>
<?php do_action( 'woocommerce_after_single_product' ); ?>


