<?php
/*
Plugin Name: JB Logos
Plugin URI: https://www.julianbakery.com/
Description: Manage as seen on logos.
Version: 1.0
Author: Michael Church
Author URI: https://www.julianbakery.com/
License: GPLv2
*/

// REGISTER POST TYPE
add_action( 'init', 'jb_logos_post_type' );

function jb_logos_post_type() {
  register_post_type( 'jb_logos',
    array(
      'labels' => array(
        'name' => 'Logos',
        'singular_name' => 'Logos',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New',
        'edit' => 'Edit',
        'edit_item' => 'Edit',
        'new_item' => 'New Logo',
        'view' => 'View',
        'view_item' => 'View',
        'search_items' => 'Search',
        'not_found' => 'Not found',
        'not_found_in_trash' => 'Not found in Trash'
      ),      
      'description' => 'Manages as seen on logos',
      'supports' => array( 'title' ),
      'public' => false,
      'show_ui' => true,
      'show_in_menu' => 'site-promotions',
      'capabilities' => array(
				'edit_post'          => 'update_core',
				'read_post'          => 'update_core',
				'delete_post'        => 'update_core',
				'edit_posts'         => 'update_core',
				'edit_others_posts'  => 'update_core',
				'delete_posts'       => 'update_core',
				'publish_posts'      => 'update_core',
				'read_private_posts' => 'update_core'
			),
    )
  );
}

// METABOXES
add_filter( 'rwmb_meta_boxes', 'jb_logos_register_meta_boxes' );
function jb_logos_register_meta_boxes( $meta_boxes )
{
  $prefix = 'jb_logos_';

  $meta_boxes[] = array(
    'title'         => 'Logos',   
    'post_types'    => 'jb_logos',
    'context'       => 'normal',
    'priority'      => 'high',
    'fields' => array(

      // IMAGE ADVANCED (WP 3.5+)
      array(
        'name'              => 'Logo',
        'id'                => "{$prefix}brand",
        'type'              => 'image_advanced',
        'max_file_uploads'  => 1,
      ),
      
      // URL
      array(
        'name' => 'URL',
        'id'   => "{$prefix}url",
        'type' => 'url',
      ),

    ),
  );

  return $meta_boxes;
}

// Shortcode [logo-slider]
function logo_slider($atts, $content = null) {
  ob_start();
  ?>

  <section class="py-5 mdc-bg-grey-100">
    <div class="container my-5">
      <div class="row">
        <div class="col text-center">
          <h5 class="font-light mb-3">As seen on...</h5>
          <div id="logos" class="logo-wrapper px-lg-3">
              <div class="logo-slider">   
                <?php
                $args = array(
                'post_type' => 'jb_logos',
                'posts_per_page' => 100,
                'orderby' => 'date',
                'order'   => 'desc',
                );
                $myquery = new WP_Query($args);
                // The Loop
                while ( $myquery->have_posts() ) { $myquery->the_post(); 
                $logo = rwmb_meta( 'jb_logos_brand', 'size=medium' );
                $site = rwmb_meta( 'jb_logos_url' );
                ?>
                  <div class="px-4 slide">
                    <div class="sixteen-nine logo" style="background-image:url(<?php foreach ( $logo as $image ) { echo $image['url']; } ?>);">
                      <?php if ( ! empty( $site ) ) { ?><a href="<?php echo $site;?>" target="_blank"></a><?php };?>
                    </div>
                  </div>
                <?php
                }
                wp_reset_postdata();
                ?>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
  add_action( 'wp_footer', 'jb_logo_slider', 90 );
  function jb_logo_slider() {
  // Only run this on the single product page
  if ( ! is_page( 'home') ) return;
  ?>

    <script type="text/javascript">
    $(document).ready(function(){
      $('.logo-slider').slick({
        arrows: true,
        appendArrows: $('#logos'),
        prevArrow: '<div class="toggle-left d-none d-lg-inline-block"><i class="icon-arrow-left"></i></div>',
        nextArrow: '<div class="toggle-right d-none d-lg-inline-block"><i class="icon-arrow-right"></i></div>',
        autoplay: true,
        autoplaySpeed: 5000,
        speed: 800,
        slidesToShow: 5,
        slidesToScroll: 1,
        accessibility:false,
        dots:false,
        responsive: [
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 4,
                slidesToScroll: 1
              }
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 1
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1
              }
            }
          ]
      });
      $('.customer-logos').show();
    });
    </script>

  <?php

  }

  $content = ob_get_contents();
  ob_end_clean();
  return $content;

}
add_shortcode('logo-slider', 'logo_slider');


