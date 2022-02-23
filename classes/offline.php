<?php 

class ssof_offline{
    
 
    
    /* ---------------------------------------- */
    /* Fetch image information by ID            */

    public static function getImage($img_ID){


        $imgid = (isset( $img_ID )) ? $img_ID : "";
        $img   = wp_get_attachment_image_src($imgid, 'full');

        if(isset($img[0])){
            return $img[0];
        }

    }

    
    /* ---------------------------------------- */
    /* Quick check if we are on a login page    */
     
    public static function loginPage() {

        // check if you are visiting the login page or register page
        return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));

    }


    
    
    public static function runPage(){
        

        // is the plugin active?
        if(get_option('bcSOFF_site_offline')){
            //print_r(is_admin());
            //print_r(ssof_checkRights());
            // are you an admin?
            if(ssof_checkRights()){ 

                //die('you must be an admin');
                return false;

            }else{

                //die('normal user');
                return true;

            }
            
        }else{
            
            //die('inactive');
            return false;
            
        }
        
    }
    

    
    
}
