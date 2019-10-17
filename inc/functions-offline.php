<?php
/* ---------------------------------------- */
/* creating the site offline functionality  */

function beta_set_header($option){


}

function beta_site_offline(){

    // check if the option is set
    if( check option here ) {
        $beta_site_uc_status = true; // user is logged in AND and administrator or editor
    }else{
        $beta_site_uc_status = false; // not logged in, so visitor
    }
    
    // check if the user is logged in
    if( current_user_can('editor') || current_user_can('administrator') ) {
        $beta_site_uc_loggedin = true; // user is logged in AND and administrator or editor
    }else{
        $beta_site_uc_loggedin = false; // not logged in, so visitor
    }
    
    // here it all comes together: is the status OFFLINE and loggedin TRUE?
    if ($beta_site_uc_status == true AND $beta_site_uc_loggedin == false){   
				
        beta_set_header($header_option); // send along header information
        
        include plugin_dir_path( __DIR__ ).'template/wp-offline-page.php';
                
        die(); // and make sure nothing is following this page
        
    }

}
