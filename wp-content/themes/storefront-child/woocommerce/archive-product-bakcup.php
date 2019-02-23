<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header( 'shop' ); ?>

	<?php if ( is_search() ){ ?>
	<h3 class="margin-bottom-30"><?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e('<span class="search-terms">"'); echo $key; _e('"</span>');?> we found <?php echo $count . ' '; _e('products!'); wp_reset_query(); ?></h3>
	<?php } ?>

	<div class="filter-bar hidden-lg">
		<h4>Narrow your choices</h4>
		<ul class="filters">
			<li><?php echo do_shortcode('[facetwp facet="diet_dropdown"]');?></li>
			<li><?php echo do_shortcode('[facetwp facet="categories_dropdown"]');?></li>
			<li><button onclick="FWP.reset()" class="button"><i class="fa fa-undo" aria-hidden="true"></i> Reset</button></li>
		</ul>
	</div>

	<?php
	/**
	 * Hook: woocommerce_before_main_content.
	 *
	 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
	 * @hooked woocommerce_breadcrumb - 20
	 * @hooked WC_Structured_Data::generate_website_data() - 30
	 */
	do_action( 'woocommerce_before_main_content' );

	?>



	<div class="margin-bottom-30 hidden-sm">
		<ul class="list-table">
			<li><?php echo do_shortcode('[facetwp counts="true"]') ;?></li>
			<li><?php echo do_shortcode('[facetwp sort="true"]') ;?></li>
		</ul>
	</div>


	<div class="facetwp-template">

	<?php if ( have_posts() ) {

		/**
		 * Hook: woocommerce_before_shop_loop.
		 *
		 * @hooked wc_print_notices - 10
		 * @hooked woocommerce_result_count - 20
		 * @hooked woocommerce_catalog_ordering - 30
		 */
		do_action( 'woocommerce_before_shop_loop' );

		woocommerce_product_loop_start();

		if ( wc_get_loop_prop( 'total' ) ) {
			while ( have_posts() ) {
				the_post();

				/**
				 * Hook: woocommerce_shop_loop.
				 *
				 * @hooked WC_Structured_Data::generate_product_data() - 10
				 */
				do_action( 'woocommerce_shop_loop' );

				wc_get_template_part( 'content', 'product' );
			}
		}

		woocommerce_product_loop_end();

		/**
		 * Hook: woocommerce_after_shop_loop.
		 *
		 * @hooked woocommerce_pagination - 10
		 */
		do_action( 'woocommerce_after_shop_loop' );
	} else {
		/**
		 * Hook: woocommerce_no_products_found.
		 *
		 * @hooked wc_no_products_found - 10
		 */
		do_action( 'woocommerce_no_products_found' );
	} 
?>

</div>
<div style="text-align:center;"><button class="fwp-load-more btn btn-primary">Load more</button></div>
<div class="hidden-sm" style="margin-top:30px">
	<ul class="list-table" >
		<li><?php echo do_shortcode('[facetwp counts="true"]') ;?></li>
		<li><?php echo do_shortcode('[facetwp per_page="true"]') ;?></li>
	</ul>
</div>

	<?php
	/**
	 * Hook: woocommerce_after_main_content.
	 *
	 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
	 */
	do_action( 'woocommerce_after_main_content' );

	/**
	 * Hook: woocommerce_sidebar.
	 *
	 * @hooked woocommerce_get_sidebar - 10
	 */
	do_action( 'woocommerce_sidebar' );

	get_footer( 'shop' );
?>