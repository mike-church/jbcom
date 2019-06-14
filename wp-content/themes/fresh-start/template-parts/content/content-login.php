<?php the_content(); ?>
<?php wp_login_form( array('redirect' => home_url()) ); ?>
<a href="<?php echo wp_lostpassword_url(); ?>" title="Lost Password">Lost Password</a>