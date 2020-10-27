<?php

/*remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
add_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_coupon_form', 10 );*/

function wp_schedule_delete_expired_coupons() {
  if ( ! wp_next_scheduled( 'delete_expired_coupons' ) ) {
    wp_schedule_event( time(), 'every_minute', 'delete_expired_coupons' );
  }
}
add_action( 'init', 'wp_schedule_delete_expired_coupons' );

function wp_delete_expired_coupons() {
  $args = array(
    'posts_per_page' => -1,
    'post_type'      => 'shop_coupon',
    'post_status'    => 'publish',
    'meta_query'     => array(
      'relation'   => 'AND',
      array(
        'key'     => 'expiry_date',
        'value'   => current_time( 'Y-m-d' ),
        'compare' => '<='
      ),
      array(
        'key'     => 'expiry_date',
        'value'   => '',
        'compare' => '!='
      )
    )
  );

  $coupons = get_posts( $args );

  if ( ! empty( $coupons ) ) {
    $current_time = current_time( 'timestamp' );

    foreach ( $coupons as $coupon ) {
      wp_delete_post( $coupon->ID, true );
    }
  }
}
add_action( 'delete_expired_coupons', 'wp_delete_expired_coupons' );