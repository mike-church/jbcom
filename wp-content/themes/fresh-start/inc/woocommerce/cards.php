<?php

// PRODUCT CARDS

// Begin Thumbnail

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'fresh_start_card_thumb', 10 );
function fresh_start_card_thumb() { ?>
	<div class="card-header">
		<div class="square img-bg-contain" style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_ID(),'medium');?>');">
		</div>
	</div>
<?php
}

// Begin Card Body

add_action( 'woocommerce_shop_loop_item_title', 'fresh_start_begin_card_body', 5 );
function fresh_start_begin_card_body() {
echo '<div class="card-body">';
}

// Card Product title

remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
add_action('woocommerce_shop_loop_item_title', 'fresh_start_shop_loop_item_title', 10);

function fresh_start_shop_loop_item_title() { ?>
	<h6><?php echo the_title();?></h6>
	<?php
}

// End Card Body

add_action( 'woocommerce_after_shop_loop_item_title', 'fresh_start_end_card_body', 15 );
function fresh_start_end_card_body() {
echo '</div>';
}

// Remove Add to Cart button

remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

// End Card Body

remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_close', 10);