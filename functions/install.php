<?php


function bcSOFF_run_installation(){

	update_option('bcSOFF_share_data', 1 ); 
}

function bcSOFF_run_deactivation(){

	delete_option( 'bcSOFF_site_offline' );
	delete_option( 'bcSOFF_offline_redirect' );
	delete_option( 'bcSOFF_offline_header' );
	delete_option( 'bcSOFF_offline_redirect_url' );
	delete_option( 'bcSOFF_offline_background_image' );
	delete_option( 'bcSOFF_offline_logo' );
	delete_option( 'bcSOFF_offline_message' );
	delete_option( 'bcSOFF_offline_css' );
	delete_option( 'bcSOFF_offline_label' );
	delete_option( 'bcSOFF_offline_theme' );
	delete_option( 'bcSOFF_offline_analytics' );
	
	delete_option( 'bcSOFF_token' );
	delete_option( 'bcSOFF_share_data' );
	delete_transient( 'bcSOFF_ask_account_update' );


}
