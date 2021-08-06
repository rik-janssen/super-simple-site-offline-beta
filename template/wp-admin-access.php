
    
    
    <form method="post" action="options.php">
        <?php settings_fields( 'bcSOFF_offlineaccess' ); ?>
        <?php do_settings_sections( 'bcSOFF_offlineaccess' ); ?>

		<h2><?php _e('Access','betaoffline'); ?></h2>
			<table class="bcSOFF_forms form-table">
             <tr valign="top">
                <th scope="row">
                    <?php _e("Grant access to certain IP adresses.", 'betaoffline'); ?>
                </th>
                 <td>
					 <p><?php _e('Separate the IP adresses with a comma. Your IP address is:','betaoffline'); echo $_SERVER['REMOTE_ADDR']; ?> </p><br />
				<?php 
				if(get_option('bcSOFF_offline_ip_exempt')==''){
                    $custom_ip_content = $_SERVER['REMOTE_ADDR'].", 192.186.0.1, ...";
                }else{
                    $custom_ip_content = get_option('bcSOFF_offline_ip_exempt');   
                }
					 
				$textarea_vars = array( 'name'=>'offline_ip_exempt',
									 'selected'=>$custom_ip_content 
								   );

				sso_forms::textarea($textarea_vars); ?>
				 </td>
            </tr>  
		</table>

        <?php submit_button(); ?>
        </form>
  