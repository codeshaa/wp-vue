<?php
/**
 * @author Sharun John <sharun@gmail.com>
 * @package ShaanzWPVue
 * @license GPLv3
 * @version 0.2.2
 */

namespace Inc\Base;

// Enqueue Class for enqueuing scripts
final class Shaanz_WP_Vue_Enqueue {

    // Registering method to enqueue scripts
    public function register(){

        add_action( 'wp_enqueue_scripts', array( $this , 'enqueueVue' ) );

    }

    // Method to enqueue vue script
    public function enqueueVue(){

        global $post;

        $get_vue_env_option =  get_option( 'is_vue_load_env_option' );
        $is_vue_load_overide =  get_option( 'is_vue_load_overide' );
        $post_meta_val = get_post_meta( $post->ID, '_is_vue_load', true );

        // Run only global settings if it is set to overide
        if( $is_vue_load_overide == true ){
            
            switch( $get_vue_env_option )
            {
                case 'dev': 
                    self::enqueueVueDev(); 
                    break;
                case 'prod':
                    self::enqueueVueProd();
                    break;
                case 'none':
                    return;
                    break;
            }
        }

        else {
            
            switch( $post_meta_val ){

                case 'dev': 
                    self::enqueueVueDev(); 
                    break;
                case 'prod':
                    self::enqueueVueProd();
                    break;
                case 'none':
                    return;
                    break;
            }

        }

    }

    // Static method to enqueue Vue - Development Script
    private static function enqueueVueDev() {
        wp_enqueue_script( 'vuejs-dev' , 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js' , array(), '', true );
    }

    // Static method to enqueue Vue - Production Script
    private static function enqueueVueProd(){
        wp_enqueue_script( 'vuejs-prod' , 'https://cdn.jsdelivr.net/npm/vue/dist/vue.min.js' , array(), '', true );
    }

}