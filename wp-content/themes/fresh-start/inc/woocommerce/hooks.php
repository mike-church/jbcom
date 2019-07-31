<?php

// HOOKS

// Full hook removals

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10);

// Hook customizations

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
add_action('woocommerce_before_main_content', 'fresh_start_wrapper_start', 10);
function fresh_start_wrapper_start() { 

	if ( is_shop() ) { ?>
		<main>
			<section class="py-5">
				<div class="container-fluid">

					<div class="row">
						<div class="col-sm-12 col-md-3 col-xl-2 ml-auto d-none d-md-block">
							<div class="d-flex justify-content-between align-items-center pb-3 border-bottom">
								<div class="text-uppercase font-medium">Filter</div>
								<button onclick="FWP.reset()" class="btn btn-primary"><i class="icon-redo" aria-hidden="true"></i></button>
							</div>
						</div>
						<div class="col-sm-12 col-md-9 col-xl-8 mr-auto">
							<div class="d-flex align-items-center pb-3">
								<div class="mr-auto d-none d-md-inline-block">
									<?php echo do_shortcode('[facetwp counts="true"]');?>
								</div>
								<div class="pr-2 d-inline-block d-md-none">
									<a href="javascript:void(0)" class="btn btn-primary" onclick="openFilters()"><i class="icon-filter"></i></a>
								</div>
								<div class="pr-2 d-inline-block d-md-none mr-auto">
									<button onclick="FWP.reset()" class="btn btn-primary"><i class="icon-redo" aria-hidden="true"></i></button>
								</div>
								<div>
									<?php echo do_shortcode('[facetwp sort="true"]') ;?>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12 col-md-3 col-xl-2 ml-auto pt-3 d-none d-md-block">
							<?php echo facetwp_display( 'facet', 'diet' ); ?>
							<?php echo facetwp_display( 'facet', 'categories' ); ?>
							<?php echo facetwp_display( 'facet', 'flavor' ); ?>
							<?php echo facetwp_display( 'facet', 'product_line' ); ?>
							<?php echo facetwp_display( 'facet', 'sale_items' ); ?>
						</div>
						<div class="col-sm-12 col-md-9 col-xl-8 mr-auto">
	<?php } 

}

// End Main Content Wrapper

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_after_main_content', 'fresh_start_wrapper_end', 10);
function fresh_start_wrapper_end() { 
	if ( is_shop() ) { ?>
						</div>
					</div>
				</div>
			</section>
		</main>





<div id="filters" class="overlay">
	<div class="overlay-container py-5">

		<a href="javascript:void(0)" onclick="closeFilters()" class="lockscroll close circle"><i class="icon-times"></i></a>
	

		<div class="container py-5">
			<div class="row">
				<div class="col-10 mx-auto">
					<?php echo facetwp_display( 'facet', 'mobile_diet' ); ?>
					<?php echo facetwp_display( 'facet', 'mobile_categories' ); ?>
					<?php echo facetwp_display( 'facet', 'mobile_product_line' ); ?>
					<?php echo facetwp_display( 'facet', 'mobile_sale_items' ); ?>
				</div>
				
			</div>
		</div>



	</div>
</div>


<script type="text/javascript">
//Overlay

function openFilters() {
  document.getElementById("filters").setAttribute( "style", "left:0");
  $( ".overlay-container" ).css( "opacity", "1");
}

function closeFilters() {
  document.getElementById("filters").setAttribute( "style", "left:-9999px");
  $( ".overlay-container" ).css( "opacity", "0");
}
</script>




	<?php }
}