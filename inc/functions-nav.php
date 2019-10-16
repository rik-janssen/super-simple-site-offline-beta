<?php


/* ---------------------------------------- */
/* Setting up the navigation */

function beta_admin_menu_sub_siteoffline() {
    
    // add the sub menu page for the plugin
	// https://codex.wordpress.org/Adding_Administration_Menus
    add_submenu_page( 
        'options-general.php', 
        'Offline', 
        'Offline', 
        'manage_options', 
        'beta_offline_settings', 
        'beta_function_for_sub'  // this should correspond with the function name
    ); 
}

add_action( 'admin_menu', 'beta_admin_menu_sub_siteoffline' );





?>
