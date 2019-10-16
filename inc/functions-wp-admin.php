<?php 

/* adding the stylesheet to WP-admin */
function beta_offline_admin() {
  wp_enqueue_style('beta-admin', plugin_dir_url( __DIR__ ).'css/admin.css');
}
add_action('admin_enqueue_scripts', 'beta_offline_admin');


/* the WP-admin page with the settings */
function beta_function_for_sub(){
	
	include plugin_dir_path( __DIR__ ).'template/wp-admin-form.php';
	
}

?>