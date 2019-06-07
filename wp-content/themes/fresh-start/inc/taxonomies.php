<?php

add_action( 'init', 'fresh_start_diet', 0 );
function fresh_start_diet() {
  register_taxonomy(
    'type',
    array('product'),
    array(
      'labels' => array(
        'name' => 'Diet',
        'menu_name' => 'Diet',
        'add_new_item' => 'Add New',
        'new_item_name' => 'New Diet'
      ),
      'show_ui' => true,
      'show_tagcloud' => false,
      'hierarchical' => true,
      'sort' => true,      
      'args' => array( 'orderby' => 'term_order' ),
      'show_admin_column' => false,
      'capabilities'=>array(
        'manage_terms' => 'manage_options',
        'edit_terms' => 'manage_options',
        'delete_terms' => 'manage_options',
        'assign_terms' =>'edit_posts'),
      'rewrite' => array('with_front' => false, 'slug' => 'diet'),
    )
  );
}

add_action( 'init', 'fresh_start_product_line', 0 );
function fresh_start_product_line() {
  register_taxonomy(
    'product_line',
    array('product'),
    array(
      'labels' => array(
        'name' => 'Product Line',
        'menu_name' => 'Product Line',
        'add_new_item' => 'Add New',
        'new_item_name' => 'New Product Line'
      ),
      'show_ui' => true,
      'show_tagcloud' => false,
      'hierarchical' => true,
      'sort' => true,      
      'args' => array( 'orderby' => 'term_order' ),
      'show_admin_column' => false,
      'capabilities'=>array(
        'manage_terms' => 'manage_options',
        'edit_terms' => 'manage_options',
        'delete_terms' => 'manage_options',
        'assign_terms' =>'edit_posts'),
      'rewrite' => array('with_front' => false, 'slug' => 'product_line'),
    )
  );
}