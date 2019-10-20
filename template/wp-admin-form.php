
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
		$radio_vars = array( 'name'=>'site_offline',
						 	 'val_1'=>'0',
							 'val_2'=>'1',
							 'selected'=>get_option('beta_site_offline')
						   );
		
		beta_radio_input($radio_vars); ?>
                </td>
            </tr> 
            <tr valign="top">
                <th scope="row">
                    <?php _e("Enable Redirect", 'betaoffline'); ?>
                </th>
                <td>
				<?php 
				$radio_vars = array( 'name'=>'offline_redirect',
									 'val_1'=>'0',
									 'val_2'=>'1', 
									 'selected'=>get_option('beta_offline_redirect')
								   );

				beta_radio_input($radio_vars); ?>
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
					 <p><?php _e('Write a message for the people that visit your site when offline mode is enabled. You can use HTML in this field but no javascript.','betaoffline'); ?></p>
				<?php 
				$textarea_vars = array( 'name'=>'offline_message',
									 'selected'=>get_option('beta_offline_message')
								   );

				beta_textarea_field($textarea_vars); ?>
				 </td>
            </tr>  
        </table>
        <?php submit_button(); ?>
        </form>
			
</div>



<h3>Todo</h3>
<ul>
	<li>make pretty offline page</li>
	<li>tie eerything together and hook it</li>
	<li>Make it safe....</li>
	<li>Donate button</li>
	<li>clean up files</li>
	<li>update template</li>
	<li>artwork and site page</li>
	<li>readme.txt</li>
	<li>submit to wordpress.org</li>
</ul>



<div class="beta_offline_footer">
	<a href="https://beta-media.com/super-simple-site-offline-wordpress-plugin/"><img src="<?php echo plugin_dir_url( __DIR__ ); ?>img/betalogo-b.png" /></a>
	<h2>Check out my other plugins at</h2>
	<p><a href="https://www.betacore.tech" target="_blank">www.betacore.tech</a></p>
</div>
