<?php

	if (get_option( 'bcSOFF_offline_background_image' )!=0 OR get_option( 'bcSOFF_offline_background_image' )!=''){
		$background_image = ' style="background-image: url('.esc_html(ssof_offline::getImage(get_option( 'bcSOFF_offline_background_image' ))).');"';
	}else{
		$background_image = "";
	}

	if (get_option( 'bcSOFF_offline_logo' )!=0){
		$logo_image = '<img src="'.esc_html(ssof_offline::getImage(get_option( 'bcSOFF_offline_logo' ))).'" class="bcSOFF_offline_logo" alt="'.get_bloginfo('name').'" />';
	}else{
		$logo_image = "";
	}

	$message_html = get_option( 'bcSOFF_offline_message' );
	$message_css = get_option( 'bcSOFF_offline_css' );
	$bcSOFF_label = get_option( 'bcSOFF_offline_label' );
    $bcSOFF_theme = get_option( 'bcSOFF_offline_theme' );
    if ($bcSOFF_theme=='classic_dark'){ $bcSOFF_theme = '-classic_dark'; }
    elseif ($bcSOFF_theme=='bouncy_elements'){ $bcSOFF_theme = '-bouncy_elements'; }
    elseif ($bcSOFF_theme=='bar'){ $bcSOFF_theme = '-bar'; }
    elseif ($bcSOFF_theme=='bar_light'){ $bcSOFF_theme = '-bar_light'; }
    elseif ($bcSOFF_theme=='dot'){ $bcSOFF_theme = '-dot'; }
    else{ $bcSOFF_theme = ''; }
?>
<html>
	<title><?php echo get_bloginfo( 'name' ); ?> - <?php _e('Maintenance mode.', 'betaoffline'); ?></title>   
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" id="beta-admin-css" href="<?php echo plugin_dir_url( __DIR__ ); ?>css/style<?php echo esc_html($bcSOFF_theme); ?>.css" type="text/css" media="all" />    
    <?php tracking::tags('top'); ?>
	<style>
		<?php echo $message_css; ?>
	</style>
	<body class="betaplugin">
		<?php tracking::tags('body'); ?>
		<div id="bcSOFF_container"<?php echo $background_image; ?>>
			<div class="bcSOFF_message_box_wrapper">
                
				<div class="bcSOFF_message_box">
                    <div class="bcSOFF_message_box_contents">
					<?php echo $logo_image; ?>
					<?php echo do_shortcode($message_html); ?>
                        </div>
				</div>
				<?php if ($bcSOFF_label==1){ ?>
				<p class="bcSOFF_label">Powered by <a href="https://wordpress.org" target="_blank" rel="nofollow">Wordpress</a> and <a href="https://rikjanssen.info/plugins/super-simple-site-offline-for-wordpress/" target="_blank" rel="nofollow">Simple Site Offline by Rik</a>.</p>
				<?php } ?>
                
			</div>
		</div>

	</body>
</html>
