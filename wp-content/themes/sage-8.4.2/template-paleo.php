<?php
/**
 * Template Name: Paleo
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'paleo'); ?>
<?php endwhile; ?>
