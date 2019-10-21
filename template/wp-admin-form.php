<div class="wrap">
		
    <h1>Janitor</h1>

    <form method="post" action="options.php">
        <?php settings_fields( 'bcJANN_janitorsettings' ); ?>
        <?php do_settings_sections( 'bcJANN_janitorsettings' ); ?>
        <table class="bcJANN_forms form-table">
            <tr valign="top">
                <th scope="row">
                    <?php _e("Enable Site Offline", 'betajanitor'); ?>
                </th>
                 <td>
		<?php 
		$check_vars = array( 'name'=>'site_offline',
						 	 'val'=>'1',
							 'selected'=>get_option('bcJANN_site_offline')
						   );
		
		bcJANN_check_input($check_vars, 'By checking this box your website will display an offline message for the outside world and Google bots while you can still view your website when logged in as admin or editor.'); ?>
                </td>
            </tr> 
		</table>
		<br />
		<h2><?php _e('Redirect','betajanitor'); ?></h2>
			<table class="bcJANN_forms form-table">
            <tr valign="top">
                <th scope="row">
                    <?php _e("Enable Redirect", 'betajanitor'); ?>
                </th>
                <td>
				<?php 
				$check_vars = array( 'name'=>'offline_redirect',
									 'val'=>'1',
									 'selected'=>get_option('bcJANN_offline_redirect')
								   );

				bcJANN_check_input($check_vars, "If you don't want to display an offline message but redirect the visitor to another website, please check this box and fill out the information below."); ?>
                </td>
            </tr> 
               
            <tr valign="top">
	            <th scope="row">
                  <?php _e("Redirect URL", 'betajanitor'); ?>
                </th>
                 <td>
				<?php 
				$input_vars = array( 'name'=>'offline_redirect_url',
									 'selected'=>get_option('bcJANN_offline_redirect_url')
								   );

				bcJANN_input_field($input_vars); ?>
					 <p><?php _e("If redirect is enabled this is the location where visitors are forwarded to.",'betajanitor'); ?></p>
                </td>
           </tr>                   
    		</table>
		<br />
		<h2><?php _e('Display options','betajanitor'); ?></h2>
			<table class="bcJANN_forms form-table">
             <tr valign="top">
                <th scope="row">
                    <?php _e("Logo", 'betajanitor'); ?>
                </th>
                 <td>
				<?php 
				$input_vars = array( 'name'=>'offline_logo',
									 'selected'=>get_option('bcJANN_offline_logo')
								   );

				bcJANN_imageselect_field($input_vars); ?>
                </td>
            </tr>  
             <tr valign="top">
                <th scope="row">
                    <?php _e("The message people see", 'betajanitor'); ?>
                </th>
                 <td>
					 <p><?php _e('Write a message for the people that visit your site when offline mode is enabled. You can use HTML in this field but no javascript. If you like to return to the original message, just empty this field and save.','betajanitor'); ?></p><br />
				<?php 
					 
				if (get_option('bcJANN_offline_message')==""){
					$get_a_message = __("<h1>".get_bloginfo('name')." is under construction at the moment.</h1>\r<p>Sorry for the inconvenience. Please return to this website at a later point. Thank you!</p>",'betajanitor');
				}else{
					$get_a_message = get_option('bcJANN_offline_message');
				}
					 
				$textarea_vars = array( 'name'=>'offline_message',
									 'selected'=>$get_a_message
								   );

				bcJANN_textarea_field($textarea_vars); ?>
				 </td>
            </tr>  
		    <tr valign="top">
                <th scope="row">
                    <?php _e("Background image", 'betajanitor'); ?>
                </th>
                 <td>
				<?php 
				$input_vars = array( 'name'=>'offline_background_image',
									 'selected'=>get_option('bcJANN_offline_background_image')
								   );
					 
							bcJANN_imageselect_field($input_vars); ?>
                </td>
            </tr> 
             <tr valign="top">
                <th scope="row">
                    <?php _e("Some custom CSS", 'betajanitor'); ?>
                </th>
                 <td>
					 <p><?php _e('If you like to change some things on the homepage, use this CSS box to do so. You will not lose changes when this plugin is updated.','betajanitor'); ?></p><br />
				<?php 
					 
					 
				$textarea_vars = array( 'name'=>'offline_css',
									 'selected'=>get_option('bcJANN_offline_css')
								   );

				bcJANN_textarea_field($textarea_vars); ?>
				 </td>
            </tr>  
		</table>
		<br />
		<h2><?php _e('Header information','betajanitor'); ?></h2>
		<table class="bcJANN_forms form-table">
            <tr valign="top">
                <th scope="row">
                    <?php _e("Header information", 'betajanitor'); ?>
                </th>
                <td>
				<?php 
				$select_vars = array( 'name'=>'offline_header',
									 'options'=>array(
													array('op_name'=>'503 Service Unavailable', 'op_value'=>'503'),
													array('op_name'=>'307 Temporary Redirect', 'op_value'=>'307'),
													array('op_name'=>'301 Moved Permanently', 'op_value'=>'301')
													),
									 'selected'=>get_option('bcJANN_offline_header')
								   );

				bcJANN_select_box($select_vars); ?>
					<p><?php _e("Give browsers and Google more information about your intentions behind the offline page and/or the redirect you have set up.",'betajanitor'); ?></p>
                </td>
            </tr>      
		</table>
		<br />
		<h2><?php _e('Support Beta','betajanitor'); ?></h2>
		<table class="bcJANN_forms form-table">
           <tr valign="top">
                <th scope="row">
                    <?php _e("Show the Beta Label", 'betajanitor'); ?>
                </th>
                 <td>
		<?php 
		$check_vars = array( 'name'=>'offline_label',
						 	 'val'=>'1',
							 'selected'=>get_option('bcJANN_offline_label')
						   );
		
		bcJANN_check_input($check_vars, 'If you like this plugin, please check this box. This will show the Beta and Wordpress links at the bottom of the offline-page. Thank you!'); ?>
					 <label></label>
                </td>
            </tr> 
		    <tr valign="top">
                <th scope="row">
                    <?php _e("Show this plugin some love", 'betajanitor'); ?>
                </th>
                 <td>
					<a href="#">Write a review</a> | <a href="#">Rate this plugin</a>
                </td>
            </tr> 
        </table>
        <?php submit_button(); ?>
        </form>
			
</div>


<div class="bcJANN_offline_footer">
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="bcJANN_donate"><input name="cmd" type="hidden" value="_s-xclick"><input name="hosted_button_id" type="hidden" value="MBLCTW6UE6L5E"><input title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" name="submit" src="https://www.paypalobjects.com/en_US/NL/i/btn/btn_donateCC_LG.gif" type="image"><img src="https://www.paypal.com/en_NL/i/scr/pixel.gif" alt="" width="1" height="1" border="0"></form>
	<a href="https://beta-media.com/super-simple-site-offline-wordpress-plugin/"><img src="<?php echo plugin_dir_url( __DIR__ ); ?>img/betalogo-b.png" /></a>
	<h2>Check out my other plugins at</h2>
	<p><a href="https://www.betacore.tech" target="_blank">www.betacore.tech</a></p>
</div>
