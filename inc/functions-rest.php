<?php 

// Check the state of the account -> api side
function bcSOFF_check_account() {
    
    // is the api enabled?
    //if(get_option('bcSOFF_share_data')!=1){ return; }

    // is it x hours ago since last check?
    if(get_transient('bcSOFF_ask_account_update')!=''){ return; }
    
    // check for API availability
    $api = bcSOFF_register_api();

	foreach($api as $k => $v){
        update_option('bcSOFF_'.$k, esc_html($v), true);
    }

    if($api['status']==1){
        set_transient('bcSOFF_ask_account_update', date("Y-m-d H:i:s"), 604800); // 7
		set_option('bcSOFF_share_data',1);
        return true;
    }else{
        set_transient('bcSOFF_ask_account_update', date("Y-m-d H:i:s"), 172800); // 2
		set_option('bcSOFF_share_data',0);
        return false;
    }

}
add_action('init', 'bcSOFF_check_account');

/////////////////////////////////////////////////////////////////////////
////// REG //////////////////////////////////////////////////////////////

function bcSOFF_register_api(){


	if(get_option('bcSOFF_apistring')==1){
		$bcapi_url = 'https://rikjanssen.info';	
	}else{
    	$bcapi_url = 'https://rikjanssen.info';
	}
	
	if( ! function_exists('get_plugin_data') ){
        require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    }
    $plugin_data = get_plugin_data(dirname(__DIR__).'/simple-site-offline-beta.php' );
	if(isset($plugin_data['Version'])){ $version = $plugin_data['Version']; }else{ $version = 0; }

    // create the data needed for registration
    $input = array(
        'url'=>get_site_url(),
		'title'=>get_bloginfo('name'),
		'description'=>get_bloginfo('description'),
		'language'=>get_bloginfo('language'),
		'wp_version'=>get_bloginfo('version'),
		'plugin'=>'super-simple-site-offline',
		'plugin_version'=>$version,
    );

    $array_query = http_build_query($input, NULL, '&', PHP_QUERY_RFC3986);
    $request_url = $bcapi_url.'/wp-json/bcapi/v1/call/site?'.$array_query;
    // assemble the method
    $arg = array(
        'method' => 'GET',
		'timeout' => 7
    );

    // and request a token
    $return = wp_remote_request($request_url, $arg );
	if(isset($return->errors['http_request_failed'])){
		$ret['status'] = 0; 
		return $ret;
	}
	   
    $json = @json_decode($return);
	   
    $ret['url'] = $request_url; 

    if(isset($json->auth_token)){
        $ret['status'] = 1; 
        if(isset($json->auth_token)){ $ret['token'] = $json->auth_token; }else{ $ret['token'] = false; }
    }else{
        $ret['status'] = 0; 
    }

    return $ret;

}
