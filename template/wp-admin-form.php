<div class="wrap">
		
    <h1>Site Offline</h1>

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
		
		bcSOFF_check_input($check_vars, 'By checking this box your website will display an offline message for the outside world and Google bots while you can still view your website when logged in as admin or editor.'); ?>
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

				bcSOFF_check_input($check_vars, "If you don't want to display an offline message but redirect the visitor to another website, please check this box and fill out the information below."); ?>
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

				bcSOFF_input_field($input_vars); ?>
					 <p><?php _e("If redirect is enabled this is the location where visitors are forwarded to.",'betaoffline'); ?></p>
                </td>
           </tr>                   
    		</table>
		<br />
		<h2><?php _e('Display options','betaoffline'); ?></h2>
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
                                                    array('op_name'=>'Dark Horisontal Bar', 'op_value'=>'bar'),
                                                    array('op_name'=>'Centered Dot', 'op_value'=>'dot'),
													),
									 'selected'=>get_option('bcSOFF_offline_theme')
								   );

				bcSOFF_select_box($select_vars); ?>
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

				bcSOFF_imageselect_field($input_vars); ?>
                </td>
            </tr>  
             <tr valign="top">
                <th scope="row">
                    <?php _e("The message people see", 'betaoffline'); ?>
                </th>
                 <td>
					 <p><?php _e('Write a message for the people that visit your site when offline mode is enabled. You can use HTML in this field but no javascript. If you like to return to the original message, just empty this field and save.','betaoffline'); ?></p><br />
				<?php 
					 
				if (get_option('bcSOFF_offline_message')==""){
					$get_a_message = __("<h1>".get_bloginfo('name')." is under construction at the moment.</h1>\r<p>Sorry for the inconvenience. Please return to this website at a later point. Thank you!</p>",'betaoffline');
				}else{
					$get_a_message = get_option('bcSOFF_offline_message');
				}
					 
				$textarea_vars = array( 'name'=>'offline_message',
									 'selected'=>$get_a_message
								   );

				bcSOFF_textarea_field($textarea_vars); ?>
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
					 
							bcSOFF_imageselect_field($input_vars); ?>
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

				bcSOFF_textarea_field($textarea_vars); ?>
				 </td>
            </tr>  
		</table>
		<br />
		<h2><?php _e('Analytics and headers','betaoffline'); ?></h2>
		<table class="bcSOFF_forms form-table">
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
									 'selected'=>get_option('bcSOFF_offline_header')
								   );

				bcSOFF_select_box($select_vars); ?>
					<p><?php _e("Give browsers and Google more information about your intentions behind the offline page and/or the redirect you have set up.",'betaoffline'); ?></p>
                </td>
            </tr>      
            <tr valign="top">
	            <th scope="row">
                  <?php _e("Google Analytics or Google Tagmanager", 'betaoffline'); ?>
                </th>
                 <td>
				<?php 
				$input_vars = array( 'name'=>'offline_analytics',
									 'selected'=>get_option('bcSOFF_offline_analytics')
								   );

				bcSOFF_input_field($input_vars); ?>
					 <p><?php _e("Paste your GTM or UA tracking ID here so you can use Google Analytics or Google Tagmanager on your offline page. Leave empty if you don't want to track the visitors.",'betaoffline'); ?></p>
                </td>
           </tr>   
		</table>
		<br />
		<h2><?php _e('Support Beta','betaoffline'); ?></h2>
		<table class="bcSOFF_forms form-table">
           <tr valign="top">
                <th scope="row">
                    <?php _e("Show the Beta Label", 'betaoffline'); ?>
                </th>
                 <td>
		<?php 
		$check_vars = array( 'name'=>'offline_label',
						 	 'val'=>'1',
							 'selected'=>get_option('bcSOFF_offline_label')
						   );
		
		bcSOFF_check_input($check_vars, 'If you like this plugin, please check this box. This will show the Beta and Wordpress links at the bottom of the offline-page. Thank you!'); ?>
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
			
</div>


<?php 

/* ------------------------ */
/* THE FOOTER.              */

$bcALG_my_plugins = array(
                array(
                    'slug'=>'super-simple-site-offline-beta',
                    'name'=>'Super Simple Site Offline',
                    'content'=>'Site offline plugins are made awesome again with this piece of code. While most site offline plugins are bulky, intrusive and annoying this one is as light as a feather and has no paid options. The nav item is neatly tucked away within the settings menu so it feels like it is part of WordPress.' ),
                array(
                    'slug'=>'simple-analytics-tag-beta',
                    'name'=>'Simple Analytics Tag',
                    'content'=>'Simple Analytics Tag helps you get up and running quick. This plugin has a non-intrusive interface and fits very well within the Wordpress Settings menu. Just paste in the ID from Google Tagmanager or Google Analytics and you are good to go.' ),
                array(
                    'slug'=>'super-simple-age-gate-beta',
                    'name'=>'Super Simple Age Gate',
                    'content'=>"Do you have to filter out younger visitors? With this super simple age gate you'll fix those age restrictions quickly. Ment for webshops and other types of websites that has to have a curtain where people below your set age can't peek behind.." )/*,
                array(
                    'slug'=>'super-simple-schema-markup-beta',
                    'name'=>'Super Simple Schema Markup',
                    'content'=>'Grab those rich snippets with this Schema plugin that adds Json-LD schema to your Wordpress website. And if you want custom schema per page that is possible as well.' ),
                array(
                    'slug'=>'the-janitor-beta',
                    'name'=>'The Janitor',
                    'content'=>'Helping you maintain that time-consuming website and in the maintime cleaning up and branding your WP-admin panel.' )*/
            
            );

// get the slug of this plugin
$get_slug = explode('/', plugin_basename( __FILE__ ));
?>
<div class="bcALG_footer">
    <h2>Making Wordpress more awesome <span>with useful plugins like these...</span></h2>
    
    <ul class="bcALG_plugins">
        <?php foreach($bcALG_my_plugins as $bc_id => $bc_value){ 
            if($get_slug[0] != $bc_value['slug']){
        ?>
            <li>
                <img src="<?php echo plugin_dir_url( __DIR__ ).'img/'.$bc_value['slug'].'.jpg'; ?>" title="<?php echo $bc_value['name']; ?> by Beta" class="bcALG_icon" />
                <h3><a href="https://wordpress.org/plugins/<?php echo $bc_value['slug']; ?>/" target="_blank"><?php echo $bc_value['name']; ?></a></h3>
                <p><?php echo $bc_value['content']; ?></p>
                <a href="https://wordpress.org/plugins/<?php echo $bc_value['slug']; ?>/" class="button" target="_blank"><?php _e('Plugin page'); ?></a>
                <a href="<?php bloginfo('wpurl'); ?>/wp-admin/plugin-install.php?tab=plugin-information&plugin=<?php echo $bc_value['slug']; ?>&TB_iframe=false" class="button button-primary" target="_blank"><?php _e('Install'); ?></a>
            </li>
    
        <?php }} ?>
    </ul>

    <div class="bcALG_mailinglist">
        <form action="https://oneweekendwebsite.us20.list-manage.com/subscribe/post?u=72e22e9c5e66e05351f6c92af&amp;id=87b9e508b0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <h2>Are you running Wordpress inefficient? <span>Betacore is developing plugins to fix that!</span></h2>
            <p>Get an email when new plugins arrive! The only thing you'll have to do is subscribe to the mailing list now!</p>
            <ul class="bcALG_mailingform">
                <li>
                    
			
					<input type="text" value="" name="FNAME" class="" id="mce-FNAME" required>
					<label for="mce-FNAME">First Name</label>
                </li>
                <li>
                    
                    
					
					<input type="text" value="" name="EMAIL" class="required email" id="mce-EMAIL" required/>
					<label for="mce-EMAIL">Email Address</label>
                </li>
                <li>
					<input type="submit" value="Join!" name="subscribe" id="mc-embedded-subscribe" />
                </li>
				

    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_72e22e9c5e66e05351f6c92af_87b9e508b0" tabindex="-1" value=""></div>


            </ul>
        </form>
    </div>
	<div class="bcALG_logobar">
    <a href="https://beta-media.com/super-simple-site-gate-wordpress-plugin/"><img src="<?php echo plugin_dir_url( __DIR__ ); ?>img/betalogo-b.png" /></a>
    <p class="bcALG_url"><span>By:</span> <a href="https://www.betacore.tech" target="_blank">www.betacore.tech</a></p>
	</div>
</div>
