<?php 
/**
* Plugin Name: Super Simple Site Offline
* Plugin URI: https://rikjanssen.info/plugins/super-simple-site-offline-for-wordpress/
* Description: Hide or redirect your website in an instant! The Super Simple Site Offline Plugin does exactly that and is above all easy to customize and track via Google Analytics or Google Tagmanager. But for your visitor just a nice little maintenance message or redirect. Nothing more.
* Version: 1.11
* Author: Rik Janssen 
* Author URI: https://rikjanssen.info
* Text Domain: betaoffline
* Domain Path: /lang
**/

/* Includes */
include_once('inc/functions-nav.php'); // the wp-admin navigation
include_once('inc/functions-wp-admin.php'); // the wp-admin navigation
include_once('inc/functions-offline.php'); // offline mode stuff
include_once('inc/functions-install.php'); // run when installing

/* make the plugin page row better */

function bcSOFF_pl_links( $links ) {

	$links = array_merge( array(
		'<a href="' . esc_url( 'https://www.rikjanssen.info/documentation' ) . '">' . __( 'Documentation', 'betaoffline' ) . '</a>'
	), $links );
	

    $links = array_merge( array(	
		'<a href="' . esc_url( admin_url( '/options-general.php?page=bcSOFF_offline_settings' ) ) . '">' . __( 'Offline', 'betaoffline' ) . '</a>'
    ), $links );
    
	return $links;
}

add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'bcSOFF_pl_links' );

register_activation_hook( __FILE__, 'bcSOFF_run_installation' );
register_deactivation_hook( __FILE__, 'bcSOFF_run_deactivation' );
