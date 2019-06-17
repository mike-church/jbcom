<?php

require_once( __DIR__ . '/inc/enqueues.php');
require_once( __DIR__ . '/inc/site.php');
require_once( __DIR__ . '/inc/taxonomies.php');
require_once( __DIR__ . '/inc/facetwp.php');
require_once( __DIR__ . '/inc/woocommerce.php');
require_once( __DIR__ . '/inc/images.php');




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