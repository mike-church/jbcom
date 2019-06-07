<?php
/*
Plugin Name: JB Homepage Hero
Plugin URI: https://www.julianbakery.com/
Description: This plugin manages Homepage hero.
Version: 1.0
Author: Michael Church
Author URI: https://www.julianbakery.com/
License: GPLv2
*/

// REGISTER POST TYPE
add_action( 'init', 'jb_homepage_hero_post_type' );

function jb_homepage_hero_post_type() {
  register_post_type( 'jb_homepage_hero',
    array(
      'labels' => array(
        'name' => 'Homepage Hero',
        'singular_name' => 'Homepage Hero',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New',
        'edit' => 'Edit',
        'edit_item' => 'Edit',
        'new_item' => 'New Homepage Hero',
        'view' => 'View',
        'view_item' => 'View',
        'search_items' => 'Search',
        'not_found' => 'Not found',
        'not_found_in_trash' => 'Not found in Trash',
        'parent' => 'Parent Homepage Hero'
      ),
      'description' => 'Adds hero banner images to the homepage',
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

// Metabox
add_filter( 'rwmb_meta_boxes', 'jb_homepage_hero_register_meta_boxes' );
function jb_homepage_hero_register_meta_boxes( $meta_boxes )
{
  $prefix = 'jb_homepage_hero_';

  $meta_boxes[] = array(
    'title'  => 'Homepage Hero',
    'post_types' => 'jb_homepage_hero',
    'context'    => 'normal',
    'priority'   => 'high',
    'fields' => array(


		// IMAGE ADVANCED (WP 3.5+)
		array(
			'name' => 'Desktop Image',
			'id' => "{$prefix}desktop_image",
			'type' => 'image_advanced',
			'max_file_uploads' => 1,
		),

		// IMAGE ADVANCED (WP 3.5+)
		array(
			'name' => 'Mobile Image',
			'id' => "{$prefix}mobile_image",
			'type' => 'image_advanced',
			'max_file_uploads' => 1,
		),


		// TEXT
		array(
		    'name'        => 'Alt Text',
		    'id'          => "{$prefix}alt_text",
		    'type'        => 'text',
		    'placeholder' => 'Enter Image Alt Text',
		    'size'        => 30,
		),

		// HEADING
		array(
			'type' => 'heading',
			'name' => 'Color',
		),


		// SELECT
		array(
			'name' 	=> 'Background Color',
			'id'		=> "{$prefix}background_color",
			'type'	=> 'select',
			// Array of 'value' => 'Label' pairs
			'options'	=> array(
				'mdc-bg-red-'			=> 'Red',
				'mdc-bg-pink-'			=> 'Pink',
				'mdc-bg-purple-'		=> 'Purple',
				'mdc-bg-deep-purple-'	=> 'Deep Purple',
				'mdc-bg-indigo-'		=> 'Indigo',
				'mdc-bg-blue-'     		=> 'Blue',
				'mdc-bg-light-blue-'	=> 'Light Blue',
				'mdc-bg-cyan-'			=> 'Cyan',
				'mdc-bg-teal-'        	=> 'Teal',
				'mdc-bg-green-'			=> 'Green',
				'mdc-bg-light-green-'   => 'Light Green',
				'mdc-bg-lime-'        	=> 'Lime',
				'mdc-bg-yellow-'		=> 'Yellow',
				'mdc-bg-amber-'			=> 'Amber',
				'mdc-bg-orange-'     	=> 'Orange',
				'mdc-bg-deep-orange-'	=> 'Deep Orange',
				'mdc-bg-deep-brown-'	=> 'Brown',					
				'mdc-bg-blue-grey-'		=> 'Blue Grey',
			),
			'multiple'        => false,
			'placeholder'     => 'Select a Color',
			'select_all_none' => false,
		),


		// SELECT
		array(
			'name' 	=> 'Color Value',
			'id'		=> "{$prefix}color_value",
			'type'	=> 'select',
			// Array of 'value' => 'Label' pairs
			'options'	=> array(
				'50'	=> '50',
				'100'	=> '100',
				'200'	=> '200',
				'300'	=> '300',
				'400'	=> '400',
				'500'	=> '500',
				'600'	=> '600',
				'700'	=> '700',
				'800'	=> '800',
				'900'	=> '900',
				'A100'	=> 'A100',
				'A200'  => 'A200',
				'A400'	=> 'A400',					
				'A700'	=> 'A700',
			),
			'multiple'        => false,
			'placeholder'     => 'Select a Value',
			'select_all_none' => false,
		),

		// HEADING
		array(
			'type' => 'heading',
			'name' => 'Destination',
		),


		// TEXT
		array(
		    'name'        => 'Link',
		    'id'          => "{$prefix}link",
		    'type'        => 'text',
		    'placeholder' => 'URL to Promotion',
		    'size'        => 30,
		),
      

    ),
  );

  return $meta_boxes;
}


// Shortcode [homepage-hero]
function jb_homepage_shortcode($atts, $content = null) {
ob_start();


$args = array(
'post_type' => 'jb_homepage_hero',
'posts_per_page' => 1,
'orderby' => 'date'
);
$myquery = new WP_Query($args);
// The Loop
while ( $myquery->have_posts() ) { $myquery->the_post();

$background = rwmb_meta( 'jb_homepage_hero_background_color' );
$value = rwmb_meta( 'jb_homepage_hero_color_value' );
$desktop = rwmb_meta( 'jb_homepage_hero_desktop_image', array( 'size' => 'full' ) );
$mobile = rwmb_meta( 'jb_homepage_hero_mobile_image', array( 'size' => 'full' ) );
$link = rwmb_meta( 'jb_homepage_hero_link' );

// $subhead = rwmb_meta( 'jb_homepage_hero_subhead' );
// $images = rwmb_meta( 'jb_homepage_hero_image', 'size=sixteen-nine-large' );
// $ctas = rwmb_meta( 'jb_homepage_hero_ctas' );
// $overlay = rwmb_meta( 'jb_homepage_hero_overlay_color' );

?>

<section class="py-5 <?php echo $background;?><?php echo $value;?>">
	<div class="container my-5">
		<div class="row">
			<div class="col-sm-12 text-center">
				<a href="<?php echo $link;?>">
				<?php foreach ( $desktop as $image ) { echo '<img src="', $image['url'], '" class="img-fluid d-none d-lg-block mt-5" data-aos="fade" data-aos-delay="50">'; } ?>
				<?php foreach ( $mobile as $image ) { echo '<img src="', $image['url'], '" class="img-fluid d-lg-none mt-5" data-aos="fade" data-aos-delay="50">'; } ?>
				</a>

			</div>
		</div>
	</div>
</section>
		

<?php } 

wp_reset_postdata(); 

$content = ob_get_contents();
ob_end_clean();
return $content;
}
add_shortcode('homepage-hero', 'jb_homepage_shortcode');
