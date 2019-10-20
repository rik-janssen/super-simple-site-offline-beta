<?php

	if (get_option( 'beta_offline_background_image' )!=0 OR get_option( 'beta_offline_background_image' )!=''){
		$background_image = ' style="background-image: url('.beta_get_image(get_option( 'beta_offline_background_image' )).');"';
	}else{
		$background_image = "";
	}

	if (get_option( 'beta_offline_logo' )!=0){
		$logo_image = '<img src="'.beta_get_image(get_option( 'beta_offline_logo' )).'" class="beta_offline_logo" alt="'.get_bloginfo('name').'" />';
	}else{
		$logo_image = "";
	}

	$message_html = get_option( 'beta_offline_message' );
	$message_css = get_option( 'beta_offline_css' );
	$beta_label = get_option( 'beta_offline_label' );

?>
<html>
	<title><?php echo get_bloginfo( 'name' ); ?> - <?php _e('Maintenance mode.', 'betaoffline'); ?></title>   
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="robots" content="noindex,nofollow">
	<link rel="stylesheet" id="beta-admin-css" href="<?php echo plugin_dir_url( __DIR__ ); ?>css/style.css" type="text/css" media="all" />
	<style>
		<?php echo $message_css; ?>
	</style>
	<body class="betaplugin">
		
		<div id="beta_container"<?php echo $background_image; ?>>
			<div class="beta_message_box_wrapper">
				<div class="beta_message_box">
					<?php echo $logo_image; ?>
					<?php echo $message_html; ?>
				</div>
				<?php if ($beta_label==0){ ?>
				<p class="beta_label">Powered by <a href="https://wordpress.org" target="_blank" rel="nofollow">Wordpress</a> and <a href="https://betacore.tech/super-simple-site-offline-wordpress-plugin/" target="_blank" rel="nofollow">Simple Site Offline</a></p>
				<?php } ?>
			</div>
		</div>

	</body>
</html>
