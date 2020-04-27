<?php
/**
 * Plugin Name: WooCommerce Local Pickup Email
 * Plugin URI: https://fishinglounge.com
 * Description: Plugin for adding a custom WooCommerce email that sends pickup instructions for local pickup customers
 * Author: Michael Church
 * Author URI: https://fishinglounge.com
 * Version: 0.1
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 *  Add a custom email to the list of emails WooCommerce should load
 *
 * @since 0.1
 * @param array $email_classes available email classes
 * @return array filtered available email classes
 */
function add_local_pickup_woocommerce_email( $email_classes ) {

	// include our custom email class
	require_once( 'includes/class-wc-local-pickup-email.php' );

	// add the email class to the list of email classes that WooCommerce loads
	$email_classes['WC_Local_Pickup_Email'] = new WC_Local_Pickup_Email();

	return $email_classes;

}
add_filter( 'woocommerce_email_classes', 'add_local_pickup_woocommerce_email' );
