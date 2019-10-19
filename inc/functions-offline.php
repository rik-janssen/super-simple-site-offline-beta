<?php
/* ---------------------------------------- */
/* creating the site offline functionality  */

function beta_set_header($option,$url=false){
    
    if ( $_SERVER['SERVER_PROTOCOL'] === 'HTTP/1.1' ) {
        $protocol = 'HTTP/1.1';
    }else{
		$protocol = 'HTTP/1.0';
	}

	if($option==503){
		$header = ' 503 Service Unavailable';
	}elseif($option==307){
		$header = ' 307 Temporary Redirect';
	}elseif($option==301){
		$header = ' 301 Moved Permanently';
	}
	
    header( $protocol . $header, true, $option );
	if($url!=false){
		header( 'Location: '.$url );
	}else{
    	header( 'Retry-After: 3600' );
	}
}


function beta_site_offline(){

    // check if the option is set
    if( check option here ) {
        $beta_site_uc_status = true; // site is offline so run
    }else{
        $beta_site_uc_status = false; // site is online so not run
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

// Enable and disable the function by adding it to the hook.
