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

        bcSOFF_set_header(get_option('bcSOFF_offline_header')); // send along header information

		if (get_option( 'bcSOFF_offline_redirect' )==1){
			
			// when the user wants a redirect...
			header( 'Location: '.get_option( 'bcSOFF_offline_redirect_url' ) );
			
        }else{
			
			// when the user wants to show a pretty page..
        	include plugin_dir_path( __DIR__ ).'template/wp-offline-page.php';
			
		}
		

        
        die(); // and make sure nothing is following this page
        
    }
    if(isset($_GET['preview_offline'])){
        if($_GET['preview_offline']==true){

                include plugin_dir_path( __DIR__ ).'template/wp-offline-page.php';
                die(); // and make sure nothing is following this page
        }
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


/* ---------------------------------------- */
/* The Tracking tag for GA and TM           */

function bcSOFF_tracking_tags($location='top'){
    
    $the_google_id = substr(get_option( 'bcSOFF_offline_analytics' ), 0,16);
    $the_google_tag = substr(get_option( 'bcSOFF_offline_analytics' ), 0,2);
    
    
    if($location=='top' AND $the_google_tag=='UA'){
        ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $the_google_id; ?>"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', '<?php echo $the_google_id; ?>');
        </script>
        <?php
    }elseif($location=='top' AND $the_google_tag=='GT'){
        ?>
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','<?php echo $the_google_id; ?>');</script>
        <!-- End Google Tag Manager -->

        <?php
    }elseif($location=='body' AND $the_google_tag=='GT'){
        ?>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo $the_google_id; ?>"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        <?php
    }
}
?>