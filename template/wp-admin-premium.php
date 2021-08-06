
    
    
    <form method="post" action="options.php">
        <?php settings_fields( 'bcSOFF_offlinestats' ); ?>
        <?php do_settings_sections( 'bcSOFF_offlinestats' ); ?>

		<h2><?php _e('Google Analytics','betaoffline'); ?></h2>
		<table class="bcSOFF_forms form-table">
    
            <tr valign="top">
	            <th scope="row">
                  <?php _e("Google Analytics or Google Tagmanager", 'betaoffline'); ?>
                </th>
                 <td>
				<?php 
				$input_vars = array( 'name'=>'offline_analytics',
									 'selected'=>get_option('bcSOFF_offline_analytics')
								   );

				sso_forms::input($input_vars); ?>
					 <p><?php _e("Paste your GTM or UA tracking ID here so you can use Google Analytics or Google Tagmanager on your offline page. Leave empty if you don't want to track the visitors.",'betaoffline'); ?></p>
                </td>
           </tr>   
		</table>

        <?php submit_button(); ?>
        </form>
  