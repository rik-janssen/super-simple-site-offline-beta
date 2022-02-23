<?php 

/* ---------------------------------------- */
/* Setting up the navigation */

function bcSOFF_admin_menu_sub_siteoffline() {
    
    // add the sub menu page for the plugin
    add_submenu_page( 
        'options-general.php', 
        'Offline', 
        'Offline', 
        'manage_options', 
        'bcSOFF_offline_settings', 
        'bcSOFF_function_for_sub'  // this should correspond with the function name
    ); 
	
}

add_action( 'admin_menu', 'bcSOFF_admin_menu_sub_siteoffline' );


/* ---------------------------------------- */
/* Add a label to the toolbar */

function bcSOFF_offline_toolbar($admin_bar){
	
    // check if the option is set
    if( get_option('bcSOFF_site_offline') == 1 ) {
        $bcSOFF_site_uc_status = true; // site is offline so run
    }else{
        $bcSOFF_site_uc_status = false; // site is online so not run
    }
    
    // here it all comes together: is the status OFFLINE and loggedin TRUE?
    if ($bcSOFF_site_uc_status == true){  
		
		$admin_bar->add_menu( array(
			'id'    => 'bcSOFF_offline_mode',
			'title' => 'Offline',
			'href'  => get_site_url().'/wp-admin/options-general.php?page=bcSOFF_offline_settings',
			'meta'  => array(
					'title' => __('Offline'),
					'class' => 'bcSOFF_offline'
			),
		));
	}
	
}

add_action('admin_bar_menu', 'bcSOFF_offline_toolbar', 100);


/* ---------------------------------------- */
/* adding the stylesheet to WP-admin */

function bcSOFF_offline_admin() {
  wp_enqueue_style('beta-offline', plugin_dir_url( __DIR__ ).'css/admin.css');
}
add_action('admin_enqueue_scripts', 'bcSOFF_offline_admin');


/* ---------------------------------------- */
/* the WP-admin page with the settings */

function bcSOFF_function_for_sub(){
	
	// this is the page itself that you will find under the wp-admin
	// settings > Offline button
	include plugin_dir_path( __DIR__ ).'template/wp-admin.php';
	
}


/* ---------------------------------------- */
/* Add form data to the database after	    */
/* sanitising the input.	                */ 

function bcSOFF_settings_register() {
	
	
	// sanitize settings
    $args_html = array(
            'type' => 'string', 
            'sanitize_callback' => 'wp_kses_post',
            'default' => NULL,
            );	
	
    $args_int = 'intval';
	
    $args_text = array(
            'type' => 'string', 
            'sanitize_callback' => 'sanitize_text_field',
            'default' => NULL,
            );
	
	// adding the information to the database as options
    register_setting( 'bcSOFF_offlinesettings', 'bcSOFF_site_offline', $args_int ); // radio
    register_setting( 'bcSOFF_offlinesettings', 'bcSOFF_offline_redirect', $args_int ); // radio
    register_setting( 'bcSOFF_offlinesettings', 'bcSOFF_offline_header', $args_int ); // select -> int
    register_setting( 'bcSOFF_offlinesettings', 'bcSOFF_offline_redirect_url', $args_text );
    
    register_setting( 'bcSOFF_offlineaccess', 'bcSOFF_offline_ip_exempt', $args_text );
    
    register_setting( 'bcSOFF_offlinedesign', 'bcSOFF_offline_background_image', $args_int );
    register_setting( 'bcSOFF_offlinedesign', 'bcSOFF_offline_logo', $args_int );
    register_setting( 'bcSOFF_offlinedesign', 'bcSOFF_offline_message', $args_html );
    register_setting( 'bcSOFF_offlinedesign', 'bcSOFF_offline_theme', $args_text );
    register_setting( 'bcSOFF_offlinedesign', 'bcSOFF_offline_css', $args_html );
    register_setting( 'bcSOFF_offlinedesign', 'bcSOFF_offline_label', $args_html );
    
    register_setting( 'bcSOFF_offlinestats', 'bcSOFF_offline_analytics', $args_html );
	
}

add_action( 'admin_init', 'bcSOFF_settings_register' );


/* ---------------------------------------- */
/* Add scripts to the wp-admin for upload   */ 

add_action ( 'admin_enqueue_scripts', function () { if (is_admin ()) wp_enqueue_media (); } );





