<?php
/* ---------------------------------------- */
/* Some header information to give it some  */
/* personality for services like Google.    */

function beta_set_header($option,$url=false){
    
	// check the protocol
    if ( $_SERVER['SERVER_PROTOCOL'] === 'HTTP/1.1' ) {
        $protocol = 'HTTP/1.1';
    }else{
		$protocol = 'HTTP/1.0';
	}

	// add header information
	if($option==503){
		$header = ' 503 Service Unavailable';
	}elseif($option==307){
		$header = ' 307 Temporary Redirect';
	}elseif($option==301){
		$header = ' 301 Moved Permanently';
	}
	
	//execute the headers
    header( $protocol . $header, true, $option );
	if($url!=false){
		header( 'Location: '.$url );
	}else{
    	header( 'Retry-After: 3600' );
	}
	
}

/* ---------------------------------------- */
/* creating the site offline functionality  */

function beta_site_offline(){
	
    // check if the option is set
    if( get_option('beta_site_offline') == 1 ) {
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

        beta_set_header(get_option('beta_site_header')); // send along header information

		if (get_option( 'beta_offline_redirect' )==1){
			
			// when the user wants a redirect...
			header( 'Location: '.get_option( 'beta_offline_redirect_url' ) );
			
        }else{
			
			// when the user wants to show a pretty page..
        	include plugin_dir_path( __DIR__ ).'template/wp-offline-page.php';
			
		}
		
        die(); // and make sure nothing is following this page
        
    }

}

if (!is_admin()){
	
	// if someone is not an admin, add this action!
	add_action('init', 'beta_site_offline');
	
}

/* ---------------------------------------- */
/* Fetch image information by ID            */

function beta_get_image($img_ID){
	
	
	$imgid = (isset( $img_ID )) ? $img_ID : "";
	$img   = wp_get_attachment_image_src($imgid, 'full');
	
	return $img[0];
	
}



