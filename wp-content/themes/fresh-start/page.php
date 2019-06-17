<?php get_header(); ?>

<?php if (is_page(array( 'cart' ))) { ?>
	<main>

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content/content', 'page' );

		endwhile; 
		?>

	</main>
<?php
} else { ?>
	<main>
		<div class="container py-5">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content/content', 'page' );

		endwhile; 
		?>

		</div>
	</main>

<?php
} ?>




<?php
get_footer();