<?php


/* ---------------------------------------- */
/* creating the site offline functionality  */

function bcSOFF_site_offline(){

    if(ssof_offline::runPage()){  

        ssof_redirect::set(get_option('bcSOFF_offline_header')); // send along header information

		if (ssof_redirect::active()){
			
			ssof_redirect::location(get_option( 'bcSOFF_offline_redirect_url' ));
			
        }else{
			
			// when the user wants to show a pretty page..
        	include plugin_dir_path( __DIR__ ).'template/wp-offline-page.php';
			
		}
        
        die();
		

    }
    
    


}


add_action('template_redirect', 'bcSOFF_site_offline'); 

