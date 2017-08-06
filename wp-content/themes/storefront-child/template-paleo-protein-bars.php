<?php
/**
 * The template for displaying full width pages.
 *
 * Template Name: Paleo Protein Bars
 *
 * @package storefront
 */

get_header( 'shop' ); ?>

<h1>Paleo Protein Bars</h1>


	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 * @hooked WC_Structured_Data::generate_website_data() - 30
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

<div class="filter-bar">
<h4>Narrow your choices</h4>
<ul class="filters">
<li><?php echo do_shortcode('[facetwp facet="diet_dropdown"]');?></li>
<li><?php echo do_shortcode('[facetwp facet="features_dropdown"]');?></li>
<li><button class="button" onclick="FWP.reset()"><i class="fa fa-undo" aria-hidden="true"></i> Reset</button></li>
</ul>
</div>


<div class="facetwp-template">

<?php
$params = array(
'posts_per_page' => 100, 
'post_type' => 'product',
'tax_query' => array(
		array(
			'taxonomy' => 'type',
			'field'    => 'slug',
			'terms'    => array('paleo','primal','pegan'),
		),
		array(
			'taxonomy' => 'product_cat',
			'field'    => 'slug',
			'terms'    => 'protein-bar',
		),
	),
);
$wc_query = new WP_Query($params); // (2)
?>

<?php if ($wc_query->have_posts()) : // (3) ?>


<?php
/**
* woocommerce_before_shop_loop hook.
*
* @hooked wc_print_notices - 10
* @hooked woocommerce_result_count - 20
* @hooked woocommerce_catalog_ordering - 30
*/
do_action( 'woocommerce_before_shop_loop' );
?>

<?php woocommerce_product_loop_start(); ?>

<?php woocommerce_product_subcategories(); ?>



<?php while ($wc_query->have_posts()) : // (4)
$wc_query->the_post(); ?>

<?php
/**
* woocommerce_shop_loop hook.
*
* @hooked WC_Structured_Data::generate_product_data() - 10
*/
do_action( 'woocommerce_shop_loop' );
?>

<?php wc_get_template_part( 'content', 'product' ); ?>

<?php endwhile; // end of the loop. ?>

<?php woocommerce_product_loop_end(); ?>

<?php
/**
* woocommerce_after_shop_loop hook.
*
* @hooked woocommerce_pagination - 10
*/
do_action( 'woocommerce_after_shop_loop' );
?>

<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

<?php
/**
* woocommerce_no_products_found hook.
*
* @hooked wc_no_products_found - 10
*/
do_action( 'woocommerce_no_products_found' );
?>

<?php endif; ?>

</div>




	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>




<?php get_footer( 'shop' ); ?>