<?php
/**
 * Calls the class on the post edit screen.
 */
function call_ssso_postOverride() {
    new ssso_postOverride();
}
 
if ( is_admin() ) {
    add_action( 'load-post.php',     'call_ssso_postOverride' );
    add_action( 'load-post-new.php', 'call_ssso_postOverride' );
}
 
/**
 * The Class.
 */
class ssso_postOverride {
 
    /**
     * Hook into the appropriate actions when the class is constructed.
     */
    public function __construct() {
        add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
        add_action( 'save_post',      array( $this, 'save'         ) );
    }
 
    /**
     * Adds the meta box container.
     */
    public function add_meta_box( $post_type ) {
        // Limit meta box to certain post types.
        //$post_types = array( 'post', 'page' );
        $post_types = get_post_types();
 
        if ( in_array( $post_type, $post_types ) ) {
            add_meta_box(
                'some_meta_box_name',
                __( 'Site Offline', 'betaoffline' ),
                array( $this, 'render_meta_box_content' ),
                $post_type,
                'side',
                'high'
            );
        }
    }
 
    /**
     * Save the meta when the post is saved.
     *
     * @param int $post_id The ID of the post being saved.
     */
    public function save( $post_id ) {
 
        /*
         * We need to verify this came from the our screen and with proper authorization,
         * because save_post can be triggered at other times.
         */
 
        // Check if our nonce is set.
        if ( ! isset( $_POST['myplugin_inner_custom_box_nonce'] ) ) {
            return $post_id;
        }
 
        $nonce = $_POST['myplugin_inner_custom_box_nonce'];
 
        // Verify that the nonce is valid.
        if ( ! wp_verify_nonce( $nonce, 'myplugin_inner_custom_box' ) ) {
            return $post_id;
        }
 
        /*
         * If this is an autosave, our form has not been submitted,
         * so we don't want to do anything.
         */
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }
 
        // Check the user's permissions.
        if ( 'page' == $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            }
        } else {
            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }
        }
 
        /* OK, it's safe for us to save the data now. */
 
        // Sanitize the user input.
        $mydata = sanitize_text_field( $_POST['ssso_visible_post'] );
 
        // Update the meta field.
        update_post_meta( $post_id, 'ssso_post_override', $mydata );
    }
 
 
    /**
     * Render Meta Box content.
     *
     * @param WP_Post $post The post object.
     */
    public function render_meta_box_content( $post ) {
 
        // Add an nonce field so we can check for it later.
        wp_nonce_field( 'myplugin_inner_custom_box', 'myplugin_inner_custom_box_nonce' );
 
        // Use get_post_meta to retrieve an existing value from the database.
        $value = get_post_meta( $post->ID, 'ssso_post_override', true );
 
        // Display the form, using the current value.
        ?>
        <input type="checkbox" id="ssso_visible_post" name="ssso_visible_post" value="1" <?php if($value){ echo "checked"; } ?> />

        <label for="ssso_visible_post">
            <strong><?php _e( 'Override invisibility', 'betaoffline' ); ?></strong><br><br>
            <i><span class="dashicons dashicons-info-outline"></span> <?php _e( 'Make this post or page visible while the entire site stays invisible. Only works when Offline-mode is enabled.', 'betaoffline' ); ?></i>
        </label>
        <?php
    }
}