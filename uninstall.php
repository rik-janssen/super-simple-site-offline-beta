<?php
// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die();
}else{

	delete_option( 'beta_site_offline' );
	delete_option( 'beta_offline_redirect' );
	delete_option( 'beta_offline_header' );
	delete_option( 'beta_offline_redirect_url' );
	delete_option( 'beta_offline_background_image' );
	delete_option( 'beta_offline_logo' );
	delete_option( 'beta_offline_message' );
	delete_option( 'beta_offline_css' );
	delete_option( 'beta_offline_label' );

}
?>