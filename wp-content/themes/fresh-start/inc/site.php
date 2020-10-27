<?php

// Adds menu for Site Product Promotions (ie. Homepage Hero, Homepage Features, Shop Features)
function feature_menu() {
	add_menu_page(
		'Site Promotions',
		'Site Promotions',
		'read',
		'site-promotions',
		'',
		'dashicons-admin-generic',
		75
	);
} 
add_action( 'admin_menu', 'feature_menu' );

// Register wp_nav_menu() menus
register_nav_menus([
	'site_nav_diet' => __('Diet', 'freshstart'),
	'site_nav_categories' => __('Popular Categories', 'freshstart'),
	'site_nav_more' => __('More', 'freshstart'),
	'site_nav_mobile' => __('Mobile', 'freshstart'),
	'footer_nav_quick' => __('Quick Links', 'freshstart'),
	'footer_nav_additional' => __('Additional Links', 'freshstart'),
]);

add_theme_support( 'title-tag' );

remove_filter( 'the_content', 'wpautop' ); the_content();