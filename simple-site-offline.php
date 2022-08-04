<?php 
/**
* Plugin Name: Super Simple Site Offline
* Plugin URI: https://rikjanssen.info/plugins/super-simple-site-offline-for-wordpress/
* Description: Hide or redirect your website in an instant! The Super Simple Site Offline Plugin does exactly that and is above all easy to customize and track via Google Analytics or Google Tagmanager. But for your visitor just a nice little maintenance message or redirect. Nothing more.
* Version: 2.2
* Author: Rik Janssen 
* Author URI: https://rikjanssen.info
* Text Domain: betaoffline
* Domain Path: /lang
**/

/* classes */
include_once('classes/forms.php'); // form classes
include_once('classes/header.php'); // header information
include_once('classes/track.php'); // for visitor tracking
include_once('classes/post.php'); // settings for individual posts
include_once('classes/offline.php'); // the offline class 

/* functions */
include_once('functions/admin.php'); // the wp-admin functions
include_once('functions/rights.php'); // check rights
include_once('functions/offline.php'); // the front end offline functions
include_once('functions/install.php'); // run when installing



/* make the plugin page row better */

function bcSOFF_pl_links( $links ) {

    $links = array_merge( array(	
		'<a href="' . esc_url( admin_url( '/options-general.php?page=bcSOFF_offline_settings' ) ) . '">' . __( 'Offline', 'betaoffline' ) . '</a>'
    ), $links );
    
	return $links;
}

add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'bcSOFF_pl_links' );

register_activation_hook( __FILE__, 'bcSOFF_run_installation' );
register_deactivation_hook( __FILE__, 'bcSOFF_run_deactivation' );


