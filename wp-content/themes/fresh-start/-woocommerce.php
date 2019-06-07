<?php get_header(); ?>


<main>
	<section class="py-5">
		<div class="container my-5">
			<div class="row">
				<div class="col-sm-3">
					I'm the sidebar
				</div>
				<div class="col-sm-9">
					<?php woocommerce_content(); ?>
				</div>
			</div>
		</div>
	</section>



</main>

<?php
get_footer();