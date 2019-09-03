<?php
/**
 * Template Name: Homepage
 */
?>

<?php get_header(); ?>

<?php echo do_shortcode('[homepage-hero]');?>

<main>

	<section class="py-5 bg-white">
		<div class="container my-5">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h2 class="mb-5"><span class="font-bold">All</span> Julian Bakery products are <span class="font-bold">100% Gluten Free, Grain Free, and Non GMO!</span></h2>
					<h3 class="mb-5" data-aos="fade-up" data-aos="ease-in-sine">Shop by Diet Type</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-6 col-md-4 col-lg-2 mb-5 text-center" data-aos="fade-up"  data-aos="ease-in-sine" data-aos-delay="50">
					<div class="display-1 animate-icon"><a href="/shop/?fwp_diet=paleo" class="mdc-text-brown-500"><i class="icon-paleo"></i></a></div>
					<p class="text-uppercase font-medium">Paleo</p>
				</div>
				<div class="col-6 col-md-4 col-lg-2 mb-5 text-center" data-aos="fade-up"  data-aos="ease-in-sine" data-aos-delay="100">
					<div class="display-1 animate-icon"><a href="/shop/?fwp_diet=keto" class="mdc-text-light-green-900"><i class="icon-keto"></i></a></div>
					<p class="text-uppercase font-medium">Keto</p>
				</div>
				<div class="col-6 col-md-4 col-lg-2 mb-5 text-center" data-aos="fade-up"  data-aos="ease-in-sine" data-aos-delay="150">
					<div class="display-1 animate-icon"><a href="/shop/?fwp_diet=vegan" class="mdc-text-green-500"><i class="icon-vegan"></i></a></div>
					<p class="text-uppercase font-medium">Vegan</p>
				</div>
				<div class="col-6 col-md-4 col-lg-2 mb-5 text-center" data-aos="fade-up"  data-aos="ease-in-sine" data-aos-delay="200">
					<div class="display-1 animate-icon"><a href="/shop/?fwp_diet=low-carb"  class="mdc-text-amber-300"><i class="icon-low-carb"></i></a></div>
					<p class="text-uppercase font-medium">Low Carb</p>
				</div>
				<div class="col-6 col-md-4 col-lg-2 mb-5 text-center" data-aos="fade-up"  data-aos="ease-in-sine" data-aos-delay="250">
					<div class="display-1 animate-icon"><a href="/shop/?fwp_diet=dairy-free" class="mdc-text-cyan-300"><i class="icon-dairy-free"></i></a></div>
					<p class="text-uppercase font-medium">Dairy Free</p>
				</div>
				<div class="col-6 col-md-4 col-lg-2 mb-5 text-center" data-aos="fade-up"  data-aos="ease-in-sine" data-aos-delay="300">
					<div class="display-1 animate-icon"><a href="/shop/?fwp_diet=organic" class="mdc-text-light-green-400"><i class="icon-organic"></i></a></div>
					<p class="text-uppercase font-medium">Organic</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 text-center">
					<p><a href="/shop" class="btn btn-link">Shop all products</a></p>
				</div>
			</div>
		</div>
	</section>
	<!--
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<p data-aos="fade" data-aos="ease-in-sine"><img src="https://via.placeholder.com/600x500" class="img-fluid"></p>
				</div>
				<div class="col-sm-6">
					<p data-aos="fade" data-aos="ease-in-sine" data-aos-delay="50"><img src="https://via.placeholder.com/600x500" class="img-fluid"></p>
				</div>
			</div>
		</div>
	</section>
	-->
	<section class="py-5 border-top bg-white">
		<div class="container my-5">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h3 class="mb-5" data-aos="fade-up" data-aos="ease-in-sine">Shop by Popular Categories</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-6 col-md-4 col-lg-2 mb-5 text-center" data-aos="fade-up"  data-aos="ease-in-sine" data-aos-delay="50">
					<div class="display-1 animate-icon"><a href="/shop/?fwp_categories=protein" class="mdc-text-blue-700"><i class="icon-muscle"></i></a></div>
					<p class="text-uppercase font-medium">Protein</p>
				</div>
				<div class="col-6 col-md-4 col-lg-2 mb-5 text-center" data-aos="fade-up"  data-aos="ease-in-sine" data-aos-delay="100">
					<div class="display-1 animate-icon"><a href="/shop/?fwp_categories=granola-cereal" class="mdc-text-indigo-300"><i class="icon-granola"></i></a></div>
					<p class="text-uppercase font-medium">Cereal &amp; Granola</p>
				</div>
				<div class="col-6 col-md-4 col-lg-2 mb-5 text-center" data-aos="fade-up"  data-aos="ease-in-sine" data-aos-delay="150">
					<div class="display-1 animate-icon"><a href="/shop/?fwp_categories=treats-snacks" class="mdc-text-deep-orange-700"><i class="icon-cookie"></i></a></div>
					<p class="text-uppercase font-medium">Treats &amp; Snacks</p>
				</div>
				<div class="col-6 col-md-4 col-lg-2 mb-5 text-center" data-aos="fade-up"  data-aos="ease-in-sine" data-aos-delay="200">
					<div class="display-1 animate-icon"><a href="/shop/?fwp_categories=bread" class="mdc-text-brown-500"><i class="icon-bread"></i></a></div>
					<p class="text-uppercase font-medium">Bread</p>
				</div>
				<div class="col-6 col-md-4 col-lg-2 mb-5 text-center" data-aos="fade-up"  data-aos="ease-in-sine" data-aos-delay="250">
					<div class="display-1 animate-icon"><a href="/shop/?fwp_categories=staples" class="mdc-text-lime-800"><i class="icon-grocery"></i></a></div>
					<p class="text-uppercase font-medium">Staples</p>
				</div>
				<div class="col-6 col-md-4 col-lg-2 mb-5 text-center" data-aos="fade-up"  data-aos="ease-in-sine" data-aos-delay="300">
					<div class="display-1 animate-icon"><a href="/shop/?fwp_categories=supplements" class="mdc-text-cyan-600"><i class="icon-supplement"></i></a></div>
					<p class="text-uppercase font-medium">Supplements</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 text-center">
					<p><a href="/shop" class="btn btn-link">Shop all products</a></p>
				</div>
			</div>
		</div>
	</section>

	<?php echo do_shortcode('[logo-slider]');?>


</main>

<?php get_footer();?>