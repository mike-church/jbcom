<section class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-sm-3 col-lg-2">
				<button onclick="FWP.reset()" class="facetwp-reset">Reset</button>
				<?php echo do_shortcode('[facetwp facet="product_categories"]') ;?>
				<?php echo do_shortcode('[facetwp facet="tags"]') ;?>
				
			</div>
			<div class="col-sm-9 col-lg-10">
				<div class="row">
					<?php echo do_shortcode('[facetwp template="paleo"]') ;?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php echo do_shortcode('[match-height]'); ?>
