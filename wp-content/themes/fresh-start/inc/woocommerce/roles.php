<?php

// IMPORTANT! Add Wholesale Role Capabilities ONLY when plugin is installed.
function wholesale_role_caps() {
    // Gets the simple_role role object.
    $role = get_role( 'wholesale_customer' );
    $role = get_role( 'wholesale_net_30' );

    // Add a new capability.
    $role->add_cap( 'buy_wholesale', true );
}
add_action( 'init', 'wholesale_role_caps', 11 );