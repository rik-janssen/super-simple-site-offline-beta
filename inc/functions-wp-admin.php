<?php 
/* ---------------------------------------- */
/* adding the stylesheet to WP-admin */

function bcSOFF_offline_admin() {
  wp_enqueue_style('beta-admin', plugin_dir_url( __DIR__ ).'css/admin.css');
}
add_action('admin_enqueue_scripts', 'bcSOFF_offline_admin');


/* ---------------------------------------- */
/* adding the stylesheet to the frontend */

function bcSOFF_offline_frontend() {
	if (!is_admin()){
	  wp_enqueue_style('beta-admin', plugin_dir_url( __DIR__ ).'css/style.css');
	}
}
add_action('wp_enqueue_scripts', 'bcSOFF_offline_frontend',100);


/* ---------------------------------------- */
/* the WP-admin page with the settings */

function bcSOFF_function_for_sub(){
	
	// this is the page itself that you will find under the wp-admin
	// settings > Offline button
	include plugin_dir_path( __DIR__ ).'template/wp-admin-form.php';
	
}


/* ---------------------------------------- */
/* Add form data to the database after	    */
/* sanitising the input.	                */ 

function bcSOFF_settings_register() {
	
	// this corresponds to some information added at the top of the form
	$setting_name = 'bcSOFF_offlinesettings';
	
	// sanitize settings
    $args_html = array(
            'type' => 'string', 
            'sanitize_callback' => 'wp_kses_post',
            'default' => NULL,
            );	
	
    $args_int = 'intval';
	
    $args_text = array(
            'type' => 'string', 
            'sanitize_callback' => 'sanitize_text_field',
            'default' => NULL,
            );
	
	// adding the information to the database as options
    register_setting( $setting_name, 'bcSOFF_site_offline', $args_int ); // radio
    register_setting( $setting_name, 'bcSOFF_offline_redirect', $args_int ); // radio
    register_setting( $setting_name, 'bcSOFF_offline_header', $args_int ); // select -> int
    register_setting( $setting_name, 'bcSOFF_offline_redirect_url', $args_text );
    register_setting( $setting_name, 'bcSOFF_offline_background_image', $args_int );
    register_setting( $setting_name, 'bcSOFF_offline_logo', $args_int );
    register_setting( $setting_name, 'bcSOFF_offline_message', $args_html );
	register_setting( $setting_name, 'bcSOFF_offline_css', $args_html );
	register_setting( $setting_name, 'bcSOFF_offline_label', $args_html );
	
}

add_action( 'admin_init', 'bcSOFF_settings_register' );


/* ---------------------------------------- */
/* ---------------------------------------- */
/* input forms and functions                */



/* ---------------------------------------- */
/* This one is a check button for the wpadm */

function bcSOFF_check_input($arg, $label=''){
	if ($arg['selected']==''){
		$arg['selected']=0;
	}
?>
<div class="bcSOFF_check_wrapper">
	<label>
		<input type="checkbox" 
			   name="bcSOFF_<?php echo $arg['name']; ?>" 
			   value="<?php echo $arg['val']; ?>"
			   <?php 
				if($arg['selected']==$arg['val']){ echo "checked"; } ?> />
		<span></span>
		<?php if ($label!=''){ echo "<label>".__($label,'betaoffline')."</label>"; } ?>
	</label>
</div>
<?php
}


/* ---------------------------------------- */
/* This one is a select dropdown            */

function bcSOFF_select_box($arg){

?>
<div class="bcSOFF_select_wrapper">
	<select name="bcSOFF_<?php echo $arg['name']; ?>">
		<?php // making a list of the options
		foreach($arg['options'] as $name => $value){
			if($value['op_value']==$arg['selected']){$checkme=' selected';}else{$checkme='';}
			?><option value="<?php echo $value['op_value']; ?>"<?php echo $checkme; ?>><?php echo $value['op_name'];; ?></option><?php
		} ?>
	</select>
</div>
<?php
}


/* ---------------------------------------- */
/* This one is an input field               */

function bcSOFF_input_field($arg){
?>
<div class="bcSOFF_input_wrapper">
	<input type="text"
		   name="bcSOFF_<?php echo $arg['name']; ?>"
		   value="<?php echo $arg['selected']; ?>"
		   class="regular-text"
		   />
</div>
<?php	
}


/* ---------------------------------------- */
/* This one is a textarea field             */

function bcSOFF_textarea_field($arg){
?>
<div class="bcSOFF_textarea_wrapper">
	<textarea name="bcSOFF_<?php echo $arg['name']; ?>" 
			  class="large-text code"
			  rows="10"
			  cols="50"><?php echo $arg['selected']; ?></textarea>
</div>
<?php	
}

// the more complex image select field
add_action ( 'admin_enqueue_scripts', function () {
    if (is_admin ())
        wp_enqueue_media ();
} );


/* ---------------------------------------- */
/* This one is an image select field        */

function bcSOFF_imageselect_field($arg){
	
	$imgid =(isset( $arg[ 'selected' ] )) ? $arg[ 'selected' ] : "";
	$img    = wp_get_attachment_image_src($imgid, 'thumbnail');

	?>
	<script type="text/javascript">
	jQuery(document).ready(function() {
		var $ = jQuery;
		if ($('.<?php echo 'bcSOFF_'.$arg['name']; ?>').length > 0) {
			if ( typeof wp !== 'undefined' && wp.media && wp.media.editor) {
				$('.<?php echo 'bcSOFF_'.$arg['name']; ?>').on('click', function(e) {
					e.preventDefault();
					var button = $(this);
					var id = button.prev();
					wp.media.editor.send.attachment = function(props, attachment) {
						id.val(attachment.id);
					};
					wp.media.editor.open(button);
					return false;
				});
			}
		}
	});
	</script>
	<div class="bcSOFF_select_wrapper">
	<?php 
	if($img != "") { ?>
	<div class="bcSOFF_thumbnail">
		<img src="<?= $img[0]; ?>" width="80px" />
		<p><?php _e('The currently selected image.','betaoffline'); ?></p>
	</div>
	<p><?php _e('Select a new image or paste a image ID to replace the one above:','betaoffline'); ?></p>

	<?php }else{ ?>
	<p><?php _e('Select an image or paste an image ID:','betaoffline'); ?></p>	
	<?php }	?>
	<input type="text" 
		   value="<?php echo $arg['selected']; ?>" 
		   class="regular-text process_custom_images" 
		   id="process_custom_images" 
		   name="<?php echo 'bcSOFF_'.$arg['name']; ?>" 
		   max="" 
		   min="1" 
		   step="1" />
	<button class="<?php echo 'bcSOFF_'.$arg['name']; ?> button"><?php _e('Media library','betaoffline'); ?></button>
	</div>
	<?php
}

?>