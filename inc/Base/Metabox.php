<?php
/**
 * @author Sharun John <sharun@gmail.com>
 * @package ShaanzWPVue
 * @license GPLv3
 * @version 0.1.7
 */

namespace Inc\Base;

// Metabox Class
class Metabox
{
    // Registering Metaboxes to show vue settings fields
    public function register()
    {
        add_action( 'add_meta_boxes', array( $this, 'vueMetabox') );
        add_action( 'save_post', array( $this, 'saveVueMetaboxFieldsData') );

    }

    // Method to show Vue Metabox on all post types
    public function vueMetabox() {

        $screens = get_post_types();

        foreach($screens as $screen)
        {
            add_meta_box( 'shaanz-wp-vue-metabox' , 'VueJS Load' , array( $this, 'vueMetaboxFields') , $screen , 'side', 'low' );
        }
        
    }


    // Method that defines the field for setting Vue Metabox
    function vueMetaboxFields( $post )
    {
        // Add a nonce field so we can check for it later.
        wp_nonce_field( 'vue_load_nonce', 'vue_load_nonce' );

        $post_meta_val = get_post_meta( $post->ID, '_is_vue_load', true );

        ?>
        <!-- HTML Select Option for selecting dev / production version -->
        <div class="shaanz-wp-vue-load">
            <label><?php _e('Load VueJS :'); ?></label>
             <select name="_is_vue_load" id="is-vue-load">
                <option value="none" <?php selected($post_meta_val, "none" ) ?> > None</option>
                <option value="dev" <?php selected($post_meta_val, "dev" ) ?> > Development</option>
                <option value="prod" <?php selected($post_meta_val, "prod" ) ?> > Production</option>
            </select>       
        </div>
        
        <?php

    }


    // Method to save metabox field data which is selected
    function saveVueMetaboxFieldsData( $post_id )
    {
        // Check if nonce is set.
        if ( ! isset( $_POST['vue_load_nonce'] ) ) 
        {
            return;
        }

        // Verify that the nonce is valid.
        if ( ! wp_verify_nonce( $_POST['vue_load_nonce'], 'vue_load_nonce' ) ) 
        { 
            return;
        }

        // If this is an autosave, our form has not been submitted, so we don't want to do anything.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        {
            return;
        }

        // Checking the user's permissions.
        if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) 
        {

            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return;
            }

        }
        else 
        {

            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return;
            }
        }

        // Checks for input and saves - save checked as yes and unchecked at no
        if( isset( $_POST[ '_is_vue_load' ] ) )
        {
            // Update post meta
            update_post_meta( $post_id, '_is_vue_load', $_POST[ '_is_vue_load' ] );
        } 
        else
        {
            // update_post_meta( $post_id, '_is_vue_load', false );
            delete_post_meta($post_id, '_is_vue_load');
        }


    }


}