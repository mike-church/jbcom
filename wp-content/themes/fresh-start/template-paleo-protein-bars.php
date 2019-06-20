<?php
/**
 * The template for displaying full width pages.
 *
 * Template Name: Paleo Protein Bars
 *
 * @package storefront
 */

get_header(); ?>
<section class="py-5">
	<div class="container my-5">
		<div class="row">
			<div class="col-12">
				<h1>Protein Bars for Everyone</h1>
				<p>Julian Bakery’s Paleo Protein Bars&reg; are 100% Paleo*, no sugar alcohols, and no soy. All bars contain 20g of protein and are sweetened with monk fruit extract. Each bar is a complete protein meal replacement or snack. They are soft, creamy, chewy and best of all delicious!</p>
				<p>Pick your protein; from egg white, grass-fed beef, or organic plant proteins combined with carefully selected organic soluble tappioca (Dextrin) fiber and healthy fats. Our IMO-Free soluble fiber improves digestion and curbs appetite all without bloating and all bars are lab tested for nutritional accuracy.</p>
				<p>Select a flavor below for more information and remember, always FREE SHIPPING nationwide.</p>
				<p><small>* <i>Primal &amp; Stay Thin brands are not 100% Paleo</i></small></p>
		</div>
	</div>
</section>

<section class="py-5">
	<div class="container my-5">
		<div class="row">
			<div class="col-12">



<?php do_action( 'woocommerce_before_main_content' ); ?>
<h2 class="margin-bottom-30">Protein Bars</h2>

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
$wc_query = new WP_Query($params); if ($wc_query->have_posts()) : ?>
<?php do_action( 'woocommerce_before_shop_loop' ); ?>
<?php woocommerce_product_loop_start(); ?>
<?php woocommerce_product_subcategories(); ?>
<?php while ($wc_query->have_posts()) : $wc_query->the_post(); ?>
<?php do_action( 'woocommerce_shop_loop' ); ?>
<?php wc_get_template_part( 'content', 'product' ); ?>
<?php endwhile; // end of the loop. ?>
<?php woocommerce_product_loop_end(); ?>
<?php do_action( 'woocommerce_after_shop_loop' ); ?>
<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
<?php do_action( 'woocommerce_no_products_found' ); ?>
<?php endif; ?>
<h2 class="margin-bottom-30">You may also like our protein powders</h2>

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
			'terms'    => 'protein-powder',
		),
	),
);
$wc_query = new WP_Query($params); if ($wc_query->have_posts()) : ?>
<?php do_action( 'woocommerce_before_shop_loop' ); ?>
<?php woocommerce_product_loop_start(); ?>
<?php woocommerce_product_subcategories(); ?>
<?php while ($wc_query->have_posts()) : $wc_query->the_post(); ?>
<?php do_action( 'woocommerce_shop_loop' ); ?>
<?php wc_get_template_part( 'content', 'product' ); ?>
<?php endwhile; // end of the loop. ?>
<?php woocommerce_product_loop_end(); ?>
<?php do_action( 'woocommerce_after_shop_loop' ); ?>
<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
<?php do_action( 'woocommerce_no_products_found' ); ?>
<?php endif; ?>

<h2 class="margin-bottom-30">Facebook Reviews</h2>
<div id="fb_reviews" class="slider-arrows">

  <div id="review" class="row speaker-tiles">
    <div class="slide">
      <div class="fb-comment-embed background-white" data-href="https://www.facebook.com/julianbakery/photos/a.165408446828667.30393.105112046191641/950300815006089/?type=3&comment_id=1514813802146690&comment_tracking=%7B%22tn%22%3A%22R9%22%7D" data-width="220" data-include-parent="false"></div>
    </div>
    <div class="slide">
      <div class="fb-comment-embed background-white" data-href="https://www.facebook.com/julianbakery/photos/a.165408446828667.30393.105112046191641/1131791980190304/?type=3&amp;comment_id=1131899520179550" data-width="220" data-include-parent="false"></div>
    </div>
    <div class="slide">
      <div class="fb-comment-embed background-white" data-href="https://www.facebook.com/julianbakery/photos/a.165408446828667.30393.105112046191641/1129218157114353/?type=3&amp;comment_id=1129408850428617" data-width="220" data-include-parent="false"></div>
    </div>
    <div class="slide">
      <div class="fb-comment-embed background-white" data-href="https://www.facebook.com/julianbakery/photos/a.165408446828667.30393.105112046191641/1115214858514683/?type=3&amp;comment_id=1123555751013927" data-width="220" data-include-parent="false"></div>
    </div>
    <div class="slide">
      <div class="fb-comment-embed background-white" data-href="https://www.facebook.com/julianbakery/photos/a.165408446828667.30393.105112046191641/1085841334785369/?type=3&amp;comment_id=1085842324785270&amp;reply_comment_id=1087279171308252" data-width="220" data-include-parent="false"></div>
    </div>
    <div class="slide">
      <div class="fb-comment-embed background-white" data-href="https://www.facebook.com/julianbakery/photos/a.165408446828667.30393.105112046191641/1082186288484207/?type=3&amp;comment_id=1083594888343347" data-width="220" data-include-parent="false"></div>
    </div>
  </div>

</div>
<script>jQuery(function(a){a("#review").slick({arrows:!0,appendArrows:a("#fb_reviews"),prevArrow:'<div class="toggle-left"><i class="fa slick-prev fa-chevron-left"></i></div>',nextArrow:'<div class="toggle-right"><i class="fa slick-next fa-chevron-right"></i></div>',autoplay:!1,autoplaySpeed:8e3,speed:800,slidesToShow:4,slidesToScroll:4,accessibility:!1,dots:!1,responsive:[{breakpoint:992,settings:{slidesToShow:3,slidesToScroll:3}},{breakpoint:768,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:480,settings:{slidesToShow:1,slidesToScroll:1}}]}),a("#review").show()});</script>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

			</div>
		</div>
	</div>
</section>





<?php
get_footer();





