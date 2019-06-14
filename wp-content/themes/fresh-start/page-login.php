<?php get_header(); ?>


	<main>
		<div class="container py-5">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content/content', 'login' );

		endwhile; 
		?>

		</div>
	</main>


<?php
get_footer();