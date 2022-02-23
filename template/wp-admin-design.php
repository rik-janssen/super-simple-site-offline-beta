
    
    
    <form method="post" action="options.php">
        <?php settings_fields( 'bcSOFF_offlinedesign' ); ?>
        <?php do_settings_sections( 'bcSOFF_offlinedesign' ); ?>
        
		<h2><?php _e('Design','betaoffline'); ?></h2>
			<table class="bcSOFF_forms form-table">
              <tr valign="top">
                <th scope="row">
                    <?php _e("Select theme", 'betaoffline'); ?>
                </th>
                <td>
				<?php 
				$select_vars = array( 'name'=>'offline_theme',
									 'options'=>array(
													array('op_name'=>'Classic Light', 'op_value'=>'0'),
													array('op_name'=>'Classic Dark', 'op_value'=>'classic_dark'),
                                                    array('op_name'=>'Dark Horizontal Bar', 'op_value'=>'bar'),
                                                    array('op_name'=>'Light Horizontal Bar', 'op_value'=>'bar_light'),
                                                    array('op_name'=>'Centered Dot', 'op_value'=>'dot'),
													),
									 'selected'=>get_option('bcSOFF_offline_theme')
								   );

				sso_forms::select($select_vars); ?>
					<p><?php _e("Select the theme you'd like to display on the frontpage.",'betaoffline'); ?></p>
                </td>
            </tr> 
             <tr valign="top">
                <th scope="row">
                    <?php _e("Logo", 'betaoffline'); ?>
                </th>
                 <td>
				<?php 
				$input_vars = array( 'name'=>'offline_logo',
									 'selected'=>get_option('bcSOFF_offline_logo')
								   );

				sso_forms::image($input_vars); ?>
                </td>
            </tr>  
             <tr valign="top">
                <th scope="row">
                    <?php _e("The message people see", 'betaoffline'); ?>
                </th>
                 <td>

				<?php 
					 
				if (get_option('bcSOFF_offline_message')==""){
					$get_a_message = __("<h1>".get_bloginfo('name')." is under construction at the moment.</h1>\r<p>Sorry for the inconvenience. Please return to this website at a later point. Thank you!</p>",'betaoffline');
				}else{
					$get_a_message = get_option('bcSOFF_offline_message');
				}

                $textarea_vars = array( 'name'=>'offline_message',
									 'selected'=>$get_a_message
								   );

				sso_forms::textarea($textarea_vars); ?>
                     					 <p><?php _e('Write a message for the people that visit your site when offline mode is enabled. You can use HTML in this field but no javascript. If you like to return to the original message, just empty this field and save. You can also use shortcodes to embed forms like the one from Contact Form 7 here.','betaoffline'); ?></p><br />
				 </td>
            </tr>  
		    <tr valign="top">
                <th scope="row">
                    <?php _e("Background image", 'betaoffline'); ?>
                </th>
                 <td>
				<?php 
				$input_vars = array( 'name'=>'offline_background_image',
									 'selected'=>get_option('bcSOFF_offline_background_image')
								   );
				sso_forms::image($input_vars); ?>
                </td>
            </tr> 
             <tr valign="top">
                <th scope="row">
                    <?php _e("Some custom CSS", 'betaoffline'); ?>
                </th>
                 <td>
					 <p><?php _e('If you like to change some things on the homepage, use this CSS box to do so. You will not lose changes when this plugin is updated.','betaoffline'); ?></p><br />
				<?php 
				if(get_option('bcSOFF_offline_css')==''){
                    $custom_css_content = "body.betaplugin{}\r#bcSOFF_container div{}\r#bcSOFF_container{}\r#bcSOFF_container .bcSOFF_message_box_wrapper{}\r#bcSOFF_container .bcSOFF_message_box{}\r#bcSOFF_container img.bcSOFF_offline_logo{}\r#bcSOFF_container h1, #bcSOFF_container h2, #bcSOFF_container h3, #bcSOFF_container h4, #bcSOFF_container h5, #bcSOFF_container p{}\rp.bcSOFF_label{}\r#bcSOFF_container a{}\r#bcSOFF_container a:hover{}";
                }else{
                    $custom_css_content = get_option('bcSOFF_offline_css');   
                }
					 
				$textarea_vars = array( 'name'=>'offline_css',
									 'selected'=>$custom_css_content 
								   );

				sso_forms::textarea($textarea_vars); ?>
				 </td>
            </tr>  
		</table>
		
		<br />
		<h2><?php _e('Spread the word','betaoffline'); ?></h2>
		<table class="bcSOFF_forms form-table">
           <tr valign="top">
                <th scope="row">
                    <?php _e("Show the Rik's Plugins Label", 'betaoffline'); ?>
                </th>
                 <td>
                <?php 
                $check_vars = array( 'name'=>'offline_label',
                                     'val'=>'1',
                                     'selected'=>get_option('bcSOFF_offline_label')
                                   );

                sso_forms::check($check_vars, 'If you like this plugin, please check this box. This will show the Beta and Wordpress links at the bottom of the offline-page. Thank you!'); ?>
					 <label></label>
                </td>
            </tr>
           
		    <tr valign="top">
                <th scope="row">
                    <?php _e("Show this plugin some love", 'betaoffline'); ?>
                </th>
                 <td>
					<a href="https://wordpress.org/plugins/super-simple-site-offline-beta/" target="_blank"><?php _e('Write a review and rate this plugin.','betaoffline'); ?></a>
                </td>
            </tr> 
        </table>
        <?php submit_button(); ?>
        </form>
  