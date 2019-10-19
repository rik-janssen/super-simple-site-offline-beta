<?php 

/* adding the stylesheet to WP-admin */
function beta_offline_admin() {
  wp_enqueue_style('beta-admin', plugin_dir_url( __DIR__ ).'css/admin.css');
}
add_action('admin_enqueue_scripts', 'beta_offline_admin');


/* the WP-admin page with the settings */
function beta_function_for_sub(){
	
	include plugin_dir_path( __DIR__ ).'template/wp-admin-form.php';
	
}

function beta_radio_input($arg){

?>
<div class="beta_radio_wrapper">
	<label>
		<input type="radio" 
			   name="beta_<?php echo $arg['name']; ?>" 
			   value="<?php echo $arg['val_1']; ?>"
			   <?php 
				if($arg['selected']==$arg['val_1']){ echo "checked"; } ?> />
		<span></span>
	</label>
	<label>
		<input type="radio" 
			   name="beta_<?php echo $arg['name']; ?>" 
			   value="<?php echo $arg['val_2']; ?>" 
			   <?php if($arg['selected']==$arg['val_2']){ echo "checked"; } ?>/>
		<span></span>
	</label>
	<?php if ($arg['val_3']!=''){ ?>
	<label>
		<input type="radio" 
			   name="beta_<?php echo $arg['name']; ?>" 
			   value="<?php echo $arg['val_3']; ?>" 
			   <?php if($arg['selected']==$arg['val_3']){ echo "checked"; } ?>/>
		<span></span>
	</label>
	<?php } ?>
</div>
<?php
}

function beta_select_box($arg){
?>
<div class="beta_select_wrapper">
	<select name="beta_<?php echo $arg['name']; ?>">
		<?php // making a list of the options
		foreach($arg['options'] as $name => $value){
			if($value['op_value']==$arg['selected']){$checkme=' selected';}else{$checkme='';}
			?><option value="<?php echo $value['op_value']; ?>"<?php echo $checkme; ?>><?php echo $value['op_name'];; ?></option><?php
		} ?>
	</select>
</div>
<?php
}

function beta_input_field($arg){
?>
<div class="beta_input_wrapper">
	<input type="text"
		   name="beta_<?php echo $arg['name']; ?>"
		   value="<?php echo $arg['selected']; ?>"
		   />
</div>
<?php	
}

function beta_textarea_field($arg){
?>
<div class="beta_textarea_wrapper">
	<textarea name="beta_<?php echo $arg['name']; ?>"><?php echo $arg['selected']; ?></textarea>
</div>
<?php	
}
?>