<?php

/* ---------------------------------------- */
/* check the rights of the current user and */
/* determine if the offline page has to be  */
/* shown */

function ssof_checkRights(){

    // override all for viewing
    if(isset($_GET['preview_offline']) && $_GET['preview_offline']==true){ return false; }

    // is logged in as admin
    if(is_admin()){ return true; }
    if(current_user_can('editor')){ return true; }
    if(current_user_can('administrator')){ return true; }
    
    // check if user has IP override
    if(ssso_ipNeedle()){ return true; }

    // is visiting login page
    if(ssof_offline::loginPage()){ return true; }

    // page has override 
    $value = get_post_meta( get_the_ID(), 'ssso_post_override', true );
    if($value){ return true; }
        
    
    return false;

}


function ssso_ipNeedle($needle=false){
    
    if(!$needle){ $needle = $_SERVER['REMOTE_ADDR']; }
    
    if(get_option('bcSOFF_offline_message')){
        $haystack = explode(',', get_option('bcSOFF_offline_ip_exempt'));
        
        if(!is_array($haystack)){ 
            $haystack = array($haystack); 
        }
        
    }else{
      $haystack = array();   
    }
    
    if(in_array($needle, $haystack)){

        return true;  
    }else{
        return false;   
    }
    
}
