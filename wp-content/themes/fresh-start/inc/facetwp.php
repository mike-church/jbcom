<?php

add_filter( 'facetwp_index_all_products', '__return_true' );

/* Adjust default per-page results*/
add_filter( 'facetwp_per_page_options', function( $options ) {
    return array( 12, 24, 48, 100 );
});


/* Number of products to display */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  $cols = 12;
  return $cols;
}

/* Add Facet labels and collapse */
function fwp_add_facet_labels() {
?>
<script>
(function($) {
    $(document).on('facetwp-loaded', function() {

    	$('.facetwp-facet').addClass( "collapse show" );

        $('.facetwp-facet').each(function(ind) {
            var $facet = $(this);
            var facet_name = $facet.attr('data-name');
            var facet_label = FWP.settings.labels[facet_name];
            var facet_id = $(this).attr('id', 'slide-' + parseInt(ind + 1));

            if ($facet.closest('.facet-wrap').length < 1 && $facet.closest('.facetwp-flyout').length < 1) {
                $facet.wrap('<div class="facet-wrap"></div>');
                $facet.before('<div class="facet-header"><h6 class="mb-0">' + facet_label + '</h6><button href="#'+$(this).attr('id')+'" data-toggle="collapse"><i class="icon-minus"></i></button></div>');
            }
        });

		$('.collapse').on('shown.bs.collapse', function(){
			$(this).parent().find(".icon-plus").removeClass("icon-plus").addClass("icon-minus");
		}).on('hidden.bs.collapse', function(){
			$(this).parent().find(".icon-minus").removeClass("icon-minus").addClass("icon-plus");
		});

    });
})(jQuery);
</script>
<?php
}
add_action( 'wp_footer', 'fwp_add_facet_labels', 100 );

/* Modify results count */
add_filter( 'facetwp_result_count', function( $output, $params ) {
    $output = $params['lower'] . '-' . $params['upper'] . ' of ' . $params['total'] . ' results';
    return $output;
}, 10, 2 );