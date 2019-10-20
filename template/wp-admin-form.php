
<div class="wrap">
		
    <h1>Site Offline</h1>

    <form method="post" action="options.php">
        <?php settings_fields( 'beta_offlinesettings' ); ?>
        <?php do_settings_sections( 'beta_offlinesettings' ); ?>
        <table class="beta_forms form-table">
            <tr valign="top">
                <th scope="row">
                    <?php _e("Enable Site Offline", 'betaoffline'); ?>
                </th>
                 <td>
		<?php 
		$check_vars = array( 'name'=>'site_offline',
						 	 'val'=>'1',
							 'selected'=>get_option('beta_site_offline')
						   );
		
		beta_check_input($check_vars); ?>
					 <p><?php _e('By checking this box your website will display an offline message for the outside world and Google bots while you can still view your website when logged in as admin or editor.','betaoffline'); ?></p>
                </td>
            </tr> 
            <tr valign="top">
                <th scope="row">
                    <?php _e("Enable Redirect", 'betaoffline'); ?>
                </th>
                <td>
				<?php 
				$check_vars = array( 'name'=>'offline_redirect',
									 'val'=>'1',
									 'selected'=>get_option('beta_offline_redirect')
								   );

				beta_check_input($check_vars); ?>
					<p><?php _e("If you don't want to display an offline message but redirect the visitor to another website, please check this box and fill out the information below.",'betaoffline'); ?></p>
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
													array('op_name'=>'307 Temporary Redirect', 'op_value'=>'307'),
													array('op_name'=>'301 Moved Permanently', 'op_value'=>'301')
													),
									 'selected'=>get_option('beta_offline_header')
								   );

				beta_select_box($select_vars); ?>
					<p><?php _e("Give browsers and Google more information about your intentions behind the offline page.",'betaoffline'); ?></p>
                </td>
            </tr>                     
            <tr valign="top">
	            <th scope="row">
                  <?php _e("Redirect URL", 'betaoffline'); ?>
                </th>
                 <td>
				<?php 
				$input_vars = array( 'name'=>'offline_redirect_url',
									 'selected'=>get_option('beta_offline_redirect_url')
								   );

				beta_input_field($input_vars); ?>
					 <p><?php _e("If redirect is enabled this is the location where visitors are forwarded to.",'betaoffline'); ?></p>
                </td>
           </tr>                   
             <tr valign="top">
                <th scope="row">
                    <?php _e("Background image", 'betaoffline'); ?>
                </th>
                 <td>
				<?php 
				$input_vars = array( 'name'=>'offline_background_image',
									 'selected'=>get_option('beta_offline_background_image')
								   );
					 
							beta_imageselect_field($input_vars); ?>
                </td>
            </tr>      
             <tr valign="top">
                <th scope="row">
                    <?php _e("Logo", 'betaoffline'); ?>
                </th>
                 <td>
				<?php 
				$input_vars = array( 'name'=>'offline_logo',
									 'selected'=>get_option('beta_offline_logo')
								   );

				beta_imageselect_field($input_vars); ?>
                </td>
            </tr>  
             <tr valign="top">
                <th scope="row">
                    <?php _e("The message people see", 'betaoffline'); ?>
                </th>
                 <td>
					 <p><?php _e('Write a message for the people that visit your site when offline mode is enabled. You can use HTML in this field but no javascript. If you like to return to the original message, just empty this field and save.','betaoffline'); ?></p>
				<?php 
					 
				if (get_option('beta_offline_message')==""){
					$get_a_message = __("<h1>".get_bloginfo('name')." is under construction at the moment.</h1>\r<p>Sorry for the inconvenience. Please return to this website at a later point. Thank you!</p>",'betaoffline');
				}else{
					$get_a_message = get_option('beta_offline_message');
				}
					 
				$textarea_vars = array( 'name'=>'offline_message',
									 'selected'=>$get_a_message
								   );

				beta_textarea_field($textarea_vars); ?>
				 </td>
            </tr>  
             <tr valign="top">
                <th scope="row">
                    <?php _e("Some custom CSS", 'betaoffline'); ?>
                </th>
                 <td>
					 <p><?php _e('If you like to change some things on the homepage, use this CSS box to do so. You will not lose changes when this plugin is updated.','betaoffline'); ?></p>
				<?php 
					 
					 
				$textarea_vars = array( 'name'=>'offline_css',
									 'selected'=>get_option('beta_offline_css')
								   );

				beta_textarea_field($textarea_vars); ?>
				 </td>
            </tr>  
           <tr valign="top">
                <th scope="row">
                    <?php _e("Show the Beta Label", 'betaoffline'); ?>
                </th>
                 <td>
					 <p>If you like this plugin, please leave it on. This will show the Beta and Wordpress links at the bottom of the offline-page.</p>
		<?php 
		$radio_vars = array( 'name'=>'offline_label',
						 	 'val_1'=>'1',
							 'val_2'=>'0',
							 'selected'=>get_option('beta_offline_label')
						   );
		
		beta_radio_input($radio_vars); ?>
                </td>
            </tr> 
        </table>
        <?php submit_button(); ?>
        </form>
			
</div>



<h3>Todo</h3>
<ul>
	<li>readme.txt (todo: screenshots)</li>
	<li>submit to wordpress.org</li>
</ul>



<div class="beta_offline_footer">
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="beta_donate"><input name="cmd" type="hidden" value="_s-xclick"><input name="hosted_button_id" type="hidden" value="MBLCTW6UE6L5E"><input title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" name="submit" src="https://www.paypalobjects.com/en_US/NL/i/btn/btn_donateCC_LG.gif" type="image"><img src="https://www.paypal.com/en_NL/i/scr/pixel.gif" alt="" width="1" height="1" border="0"></form>
	<a href="https://beta-media.com/super-simple-site-offline-wordpress-plugin/"><img src="<?php echo plugin_dir_url( __DIR__ ); ?>img/betalogo-b.png" /></a>
	<h2>Check out my other plugins at</h2>
	<p><a href="https://www.betacore.tech" target="_blank">www.betacore.tech</a></p>
</div>
