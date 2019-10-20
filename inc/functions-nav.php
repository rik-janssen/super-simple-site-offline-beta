<?php


/* ---------------------------------------- */
/* Setting up the navigation */

function bcSOFF_admin_menu_sub_siteoffline() {
    
    // add the sub menu page for the plugin
	// https://codex.wordpress.org/Adding_Administration_Menus
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



?>
