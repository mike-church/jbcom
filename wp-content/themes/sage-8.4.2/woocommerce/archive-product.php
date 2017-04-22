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
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<?php
if ( is_tax('type','paleo') ) { ?>
    <section class="background-primary" style="padding-top:30px; padding-bottom:30px;">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
					<h1 class="color-white margin-bottom-0"><?php woocommerce_page_title(); ?></h1>
					<?php endif; ?>				
				</div>
			</div>
		</div>
	</section>
    <?php
}
elseif ( is_tax('type','primal') ) { ?>
    <section class="background-secondary" style="padding-top:30px; padding-bottom:30px;">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
					<h1 class="color-white margin-bottom-0"><?php woocommerce_page_title(); ?></h1>
					<?php endif; ?>				
				</div>
			</div>
		</div>
	</section>
    <?php
}
elseif ( is_tax('type','pegan') ) { ?>
    <section class="background-primary-alt-1" style="padding-top:30px; padding-bottom:30px;">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
					<h1 class="color-white margin-bottom-0"><?php woocommerce_page_title(); ?></h1>
					<?php endif; ?>				
				</div>
			</div>
		</div>
	</section>
    <?php
}
else { ?>
    <section class="background-brand" style="padding-top:30px; padding-bottom:30px;">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
					<h3 class="color-white margin-bottom-0"><?php woocommerce_page_title(); ?></h3>
					<?php endif; ?>				
				</div>
			</div>
		</div>
	</section>
    <?php
}
?>

<section class="section-padding">
	<div class="container">
		<div class="row margin-bottom-30 hidden-md hidden-lg">
			<div class="col-sm-12">
				<div class="filter-bar">
					<ul>
						<li><?php echo facetwp_display( 'facet', 'diet_dropdown' ); ?> <?php echo facetwp_display( 'facet', 'categories_dropdown' ); ?> <?php echo facetwp_display( 'facet', 'features_dropdown' ); ?></li>
						<li><button onclick="FWP.reset()" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i> Reset</button></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row margin-bottom-30">
			<div class="col-md-3 col-lg-2 hidden-xs hidden-sm">				
				<button onclick="FWP.reset()" class="btn btn-primary btn-block"><i class="fa fa-undo" aria-hidden="true"></i> Reset Filters</button>
			</div>
			<div class="col-sm-12 col-md-9 col-lg-10">
				<div class="sort-bar">
					<ul>
						<li>Showing: <?php echo facetwp_display( 'counts' );?></li>
						<li><?php echo facetwp_display( 'sort' );?></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-lg-2 sidebar hidden-xs hidden-sm">
				<div class="widget">
					<div class="diet-type">
						<?php echo facetwp_display( 'facet', 'product_type' ); ?>
					</div>
				</div>
				<div class="widget">
					<?php echo facetwp_display( 'facet', 'product_categories' ); ?>
				</div>
				<div class="widget">
					<?php echo facetwp_display( 'facet', 'tags' ); ?>
				</div>
			</div>
			<div class="col-sm-12 col-md-9 col-lg-10">
							
					<div class="row facetwp-template">
					<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
					<?php wc_get_template_part( 'content', 'product' ); ?>
					<?php endwhile; // end of the loop. ?>

					<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
						<?php wc_get_template( 'loop/no-products-found.php' ); ?>
					<?php endif; ?>
					</div>
							
			</div>
		</div>
	</div>
</section>
<section class="margin-bottom-60">
	<div class="container">
		<div class="row">
			<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">				
				<div class="sort-bar">
					<ul>
						<li>Showing: <?php echo facetwp_display( 'counts' );?></li>
						<li><?php echo facetwp_display( 'per_page' );?></li>
					</ul>
				</div>		
			</div>
		</div>
	</div>
</section>

<script>
(function($) {
    $(function() {
        FWP.loading_handler = function() { }
    });
});
</script>





