<?php

class ssof_redirect{
 
    
    /* ---------------------------------------- */
    /* Some header information to give it some  */
    /* personality for services like Google.    */

    public static function set($option,$url=false){

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
        }elseif($option==404){
            $header = ' 404 Not Found';
        }elseif($option==200){
            $header = ' 200 OK';
        }

        //execute the headers
        header( $protocol . $header, true, $option );
        if($url!=false){
            header( 'Location: '.$url );
        }else{
            header( 'Retry-After: 3600' );
        }

    }
    
    public static function location($url){
        // when the user wants a redirect...
        header( 'Location: '.$url );
    }
    
    
    /* ---------------------------------------- */
    /* Check if the redirect header is active   */
    
    public static function active(){
    
        if(get_option( 'bcSOFF_offline_redirect' )==1){
            return true;
        }else{
            return false;    
        }
        
    }
    
}