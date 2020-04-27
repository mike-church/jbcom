<?php // For implementation instructions see: https://aceplugins.com/how-to-add-a-code-snippet/

/**
 * Add store address for local pickup.
 *
 * @param $order_id
 */
function ace_local_pickup_thank_you_page_address( $order_id ) {
    $order = wc_get_order( $order_id );

    $order_methods = array_map( function( $shipping ) { return $shipping->get_method_id(); }, $order->get_shipping_methods() );
    if ( in_array( 'local_pickup', $order_methods ) ) { ?>
<section>
    <div class="row">
        <div class="col">

        <h2 class="mb-3">Pickup Instructions</h2>
        <p><strong>We will call you when your order is ready.</strong> Please allow one business day lead time to complete your order. Completed orders may be picked up during Julian Bakery business hours.</p>
        <p><strong>PLEASE NOTE:</strong> If your ordered bread, we bake our bread to order on Monday's. This may impact your delivery expectations. Please contact Customer Service if you have questions.</p>
        <p>
            <strong>Pickup Location:</strong><br/>
            3021 Industry St.<br/>
            Oceanside, CA 92054<br/>
            <a href="https://goo.gl/maps/EQEq188WrPFaGnVP9" target="_blank">Map &amp; Directions</a>
        </p>
        <p><strong>Customer Service:</strong><br/>
            (760) 721-5200
        </p>
        </div>

    </div>
</section>

        <?php
    }
}
add_action( 'woocommerce_thankyou', 'ace_local_pickup_thank_you_page_address' );
add_action( 'woocommerce_view_order', 'ace_local_pickup_thank_you_page_address' );
add_action( 'woocommerce_email_order_details', 'ace_local_pickup_thank_you_page_address' );