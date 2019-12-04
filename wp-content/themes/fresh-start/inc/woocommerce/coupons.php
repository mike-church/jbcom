<?php

function schedule_delete_expired_coupons() {
if ( ! wp_next_scheduled( 'delete_expired_coupons' ) ) {
    wp_schedule_event( time(), 'daily', 'delete_expired_coupons' );
    }
}
add_action( 'init', 'schedule_delete_expired_coupons' );

function delete_expired_coupons() {
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
        wp_trash_post( $coupon->ID );
    }
  }
}
add_action( 'delete_expired_coupons', 'delete_expired_coupons' );