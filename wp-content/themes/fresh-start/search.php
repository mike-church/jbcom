<?php get_header(); ?>


<section class="py-5">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">

				<?php if ( have_posts() ) : ?>

				<div class="mb-5 p-3 mdc-bg-grey-50 border">
					<?php get_search_form(); ?>
				</div>
					
				<h4 class="mb-2 font-light">Search Results for <?php $allsearch = new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e('<strong>'); echo $key; _e('</strong>'); ?></h4>
				<p class="font-medium mdc-text-grey-600"><?php echo $count . ' '; _e('results'); wp_reset_query(); ?></p>

				<?php while (have_posts()) : the_post(); {

					if ( get_post_type() == 'product' ) { ?>

					<article>
					<h5 class="mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>	
					<p class="mb-0"><small><span class="text-uppercase font-medium">Product</span> <a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a></small></p>
					<?php the_excerpt(); ?>
					</article>	

					<?php }

					elseif ( get_post_type() == 'page' ) { ?>

					<article>
					<h5 class="mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
					<p class="mb-0"><small><span class="text-uppercase font-medium">Page</span> <a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a></small></p>
					<?php the_excerpt(); ?> 
					</article>

					<?php }

					else { ?>

					<article>
					<h5 class="mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>	
					<p class="mb-0"><small><span class="text-uppercase font-medium">Blog</span> <a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a></small></p>
					<?php the_excerpt(); ?>
					</article>	

					<?php }

				} ?>

				<?php endwhile; ?>

				<?php the_posts_pagination( array(
					'mid_size'  => 2,
					'prev_text' => __( 'Back', 'textdomain' ),
					'next_text' => __( 'Next', 'textdomain' ),
				)); ?>

				<?php else : ?>

				<div class="alert alert-primary" role="alert">Sorry, no results were found</div>
				<div class="mb-5 p-3 mdc-bg-grey-50 border">
					<?php get_search_form(); ?>
				</div>

				<?php endif; ?>

			</div>
			<div class="col-sm-12">
				<h4 class="font-light mt-5">Can't find what you're looking for?</h4>
				<p><strong>Search tips:</strong> Make sure all words are spelled correctly or try different keywords. If you are still having trouble, <a href="mailto:customerservice@julianbakery.com">contact us</a></p>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
