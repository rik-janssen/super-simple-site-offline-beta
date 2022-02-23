
    
    
    <form method="post" action="options.php">
        <?php settings_fields( 'bcSOFF_offlinesettings' ); ?>
        <?php do_settings_sections( 'bcSOFF_offlinesettings' ); ?>
        <table class="bcSOFF_forms form-table">
            <tr valign="top">
                <th scope="row">
                    <?php _e("Enable Site Offline", 'betaoffline'); ?>
                </th>
                <td>
                <?php 
                $check_vars = array( 'name'=>'site_offline',
                                     'val'=>'1',
                                     'selected'=>get_option('bcSOFF_site_offline')
                                   );

                sso_forms::check($check_vars, 'By checking this box your website will display an offline message for the outside world and Google bots while you can still view your website when logged in as admin or editor.'); ?>
                <?php if(get_option('bcSOFF_site_offline')==1){ ?>
                <p><strong><a href="<?php echo get_home_url(); ?>/?preview_offline=true" target="_blank"><?php _e('Preview the landingpage in offline mode','betaoffline'); ?></a></strong></p>
                <?php } ?>
                </td>
            </tr> 
		</table>
		<br />
		<h2><?php _e('Redirect','betaoffline'); ?></h2>
			<table class="bcSOFF_forms form-table">
            <tr valign="top">
                <th scope="row">
                    <?php _e("Enable Redirect", 'betaoffline'); ?>
                </th>
                <td>
				<?php 
				$check_vars = array( 'name'=>'offline_redirect',
									 'val'=>'1',
									 'selected'=>get_option('bcSOFF_offline_redirect')
								   );

				sso_forms::check($check_vars, "If you don't want to display an offline message but redirect the visitor to another website, please check this box and fill out the information below."); ?>
                </td>
            </tr> 
               
            <tr valign="top">
	            <th scope="row">
                  <?php _e("Redirect URL", 'betaoffline'); ?>
                </th>
                 <td>
				<?php 
				$input_vars = array( 'name'=>'offline_redirect_url',
									 'selected'=>get_option('bcSOFF_offline_redirect_url')
								   );

				sso_forms::input($input_vars); ?>
					 <p><?php _e("If redirect is enabled this is the location where visitors are forwarded to.",'betaoffline'); ?></p>
                </td>
           </tr>                   
            <tr valign="top">
                <th scope="row">
                    <?php _e("Header information", 'betaoffline'); ?>
                </th>
                <td>
				<?php 
				$select_vars = array( 'name'=>'offline_header',
									 'options'=>array(
													array('op_name'=>'503 Service Unavailable', 'op_value'=>'503'),
                                                    array('op_name'=>'404 Not Found', 'op_value'=>'404'),
													array('op_name'=>'307 Temporary Redirect', 'op_value'=>'307'),
													array('op_name'=>'301 Moved Permanently', 'op_value'=>'301'),
                                                    array('op_name'=>'200 OK', 'op_value'=>'200')
													),
									 'selected'=>get_option('bcSOFF_offline_header')
								   );

				sso_forms::select($select_vars); ?>
					<p><?php _e("Give browsers and Google more information about your intentions behind the offline page and/or the redirect you have set up.",'betaoffline'); ?></p>
                </td>
            </tr>      
  
		</table>

        <?php submit_button(); ?>
        </form>
  