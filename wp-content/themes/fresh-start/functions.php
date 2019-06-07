<?php

$site_includes = [
  'inc/enqueues.php',
  'inc/site.php',
  'inc/taxonomies.php',
  'inc/facetwp.php',
  'inc/woocommerce.php',
  'inc/images.php',
  'inc/login.php'
];

foreach ($site_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'fresh-start'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

/**
 * Block User Enumeration
 */
function kl_block_user_enumeration_attempts() {
    if ( is_admin() ) return;

    $author_by_id = ( isset( $_REQUEST['author'] ) && is_numeric( $_REQUEST['author'] ) );

    if ( $author_by_id ) 
        wp_die( 'Author archives have been disabled.' );
}
add_action( 'template_redirect', 'kl_block_user_enumeration_attempts' );