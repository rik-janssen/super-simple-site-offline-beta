<?php 
/**
* Plugin Name: Super Simple Site Offline
* Plugin URI: https://betacore.tech/plugins/super-simple-site-offline-for-wordpress/
* Description:  Hide or redirect your website in an instant! The Super Simple Site Offline Plugin does exactly that and is above all easy to customize. Works with Wordpress 5.3 Kirk.
* Version: 1.6.1
* Author: Beta
* Author URI: https://betacore.tech/
* Text Domain: betaoffline
* Domain Path: /lang
**/

/* Includes */
include_once('inc/functions-nav.php'); // the wp-admin navigation
include_once('inc/functions-wp-admin.php'); // the wp-admin navigation
include_once('inc/functions-offline.php'); // offline mode stuff


/* make the plugin page row better */

function bcSOFF_pl_links( $links ) {

	$links = array_merge( array(
		'<a href="' . esc_url( 'https://www.paypal.com/donate/?token=y9x2_N0_18pSbdHE9l9jivsqB3aTKgWQ3qGgxg_t6VUUmSU6B2H1hUcANUBzhX5xV0qg2G&country.x=NL&locale.x=NL' ) . '">' . __( 'Donate', 'betaoffline' ) . '</a>'
    ), $links );

    $links = array_merge( array(
		'<a href="' . esc_url( admin_url( '/options-general.php?page=bcSOFF_offline_settings' ) ) . '">' . __( 'Offline', 'betaoffline' ) . '</a>'
    ), $links );
    
	return $links;
}

add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'bcSOFF_pl_links' );
?>