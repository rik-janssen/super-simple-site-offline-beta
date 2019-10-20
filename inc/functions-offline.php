<?php
/* ---------------------------------------- */
/* Some header information to give it some  */
/* personality for services like Google.    */

function bcSOFF_set_header($option,$url=false){
    
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

function bcSOFF_site_offline(){
	
    // check if the option is set
    if( get_option('bcSOFF_site_offline') == 1 ) {
        $bcSOFF_site_uc_status = true; // site is offline so run
    }else{
        $bcSOFF_site_uc_status = false; // site is online so not run
    }
    
    // check if the user is logged in
    if( current_user_can('editor') || current_user_can('administrator') ) {
        $bcSOFF_site_uc_loggedin = true; // user is logged in AND and administrator or editor
    }else{
        $bcSOFF_site_uc_loggedin = false; // not logged in, so visitor
    }
    
    // here it all comes together: is the status OFFLINE and loggedin TRUE?
    if ($bcSOFF_site_uc_status == true AND $bcSOFF_site_uc_loggedin == false){   

        bcSOFF_set_header(get_option('bcSOFF_site_header')); // send along header information

		if (get_option( 'bcSOFF_offline_redirect' )==1){
			
			// when the user wants a redirect...
			header( 'Location: '.get_option( 'bcSOFF_offline_redirect_url' ) );
			
        }else{
			
			// when the user wants to show a pretty page..
        	include plugin_dir_path( __DIR__ ).'template/wp-offline-page.php';
			
		}
		
        die(); // and make sure nothing is following this page
        
    }

}
if ( ! is_admin() && ! bcSOFF_is_login_page() ) {

	// if someone is not an admin or not on the login page, add this action!
	add_action('init', 'bcSOFF_site_offline');
	
}


// quick check if we are on a login page
function bcSOFF_is_login_page() {
	
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
	
}

/* ---------------------------------------- */
/* Fetch image information by ID            */

function bcSOFF_get_image($img_ID){
	
	
	$imgid = (isset( $img_ID )) ? $img_ID : "";
	$img   = wp_get_attachment_image_src($imgid, 'full');
	
	return $img[0];
	
}



