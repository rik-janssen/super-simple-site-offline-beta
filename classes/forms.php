<?php 

class sso_forms {
 
    
    
    public static function input($arg){
        ?>
        <div class="bcSOFF_input_wrapper">
            <input type="text"
                   name="bcSOFF_<?php echo esc_html($arg['name']); ?>"
                   value="<?php echo esc_html($arg['selected']); ?>"
                   class="regular-text"
                   />
        </div>
        <?php	
    }
    
    public static function select($arg){
        ?>
        <div class="bcSOFF_select_wrapper">
            <select name="bcSOFF_<?php echo $arg['name']; ?>">
                <?php // making a list of the options
                foreach($arg['options'] as $name => $value){
                    if($value['op_value']==$arg['selected']){$checkme=' selected';}else{$checkme='';}
                    ?><option value="<?php echo esc_html($value['op_value']); ?>"<?php echo $checkme; ?>><?php echo esc_html($value['op_name']); ?></option><?php
                } ?>
            </select>
        </div>
        <?php
    }
    
    public static function check($arg, $label=''){
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

     
    public static function textarea($arg){
        ?>
        <div class="bcSOFF_textarea_wrapper">
            <textarea name="bcSOFF_<?php echo esc_html($arg['name']); ?>" 
                      class="large-text code"
                      rows="10"
                      cols="50"><?php echo $arg['selected']; ?></textarea>
        </div>
        <?php	
    }

    
    public static function image($arg){
        $imgid =(isset( $arg[ 'selected' ] )) ? $arg[ 'selected' ] : "";
        $img    = wp_get_attachment_image_src($imgid, 'thumbnail');

        ?>
        <script type="text/javascript">
        jQuery(document).ready(function() {
            var $ = jQuery;
            if ($('.<?php echo 'bcSOFF_'.esc_html($arg['name']); ?>').length > 0) {
                if ( typeof wp !== 'undefined' && wp.media && wp.media.editor) {
                    $('.<?php echo 'bcSOFF_'.esc_html($arg['name']); ?>').on('click', function(e) {
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
            <img src="<?php echo esc_html($img[0]); ?>" width="80px" />
            <p><?php _e('The currently selected image.','betaoffline'); ?></p>
        </div>
        <p><?php _e('Select a new image or paste a image ID to replace the one above:','betaoffline'); ?></p>

        <?php }else{ ?>
        <p><?php _e('Select an image or paste an image ID:','betaoffline'); ?></p>	
        <?php }	?>
        <input type="text" 
               value="<?php echo esc_html($arg['selected']); ?>" 
               class="regular-text process_custom_images" 
               id="process_custom_images" 
               name="<?php echo 'bcSOFF_'.esc_html($arg['name']); ?>" 
               max="" 
               min="1" 
               step="1" />
        <button class="<?php echo 'bcSOFF_'.esc_html($arg['name']); ?> button"><?php _e('Media library','betaoffline'); ?></button>
        </div>
        <?php
    }
    
}