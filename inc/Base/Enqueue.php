<?php
/**
 * @author Sharun John <sharun@gmail.com>
 * @package ShaanzWPVue
 * @license GPLv3
 * @version 0.1.7
 */

namespace Inc\Base;

// Enqueue Class for enqueuing scripts
final class Enqueue
{
    // Registering method to enqueue scripts
    public function register()
    {
        add_action( 'wp_enqueue_scripts', array( $this , 'enqueueVue' ) );
    }

    // Method to enqueue vue script
    public function enqueueVue()
    {

        global $post;

        $get_vue_env_option =  get_option( 'is_vue_load_env_option' );
        $post_meta_val = get_post_meta( $post->ID, '_is_vue_load', true );

        if( $get_vue_env_option == 'dev' )
        {
            self::enqueueVueDev();
        }
        elseif ( $get_vue_env_option == 'prod' ) {
            self::enqueueVueProd();
        }
        else {
            
            if( $post_meta_val == 'dev' )
            {
                self::enqueueVueDev();
            }
            elseif( $post_meta_val == 'prod' )
            {
                self::enqueueVueProd();
            }

        }

    }

    // Static method to enqueue Vue - Development Script
    private static function enqueueVueDev()
    {
        wp_enqueue_script( 'vuejs-dev' , 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js' , array(), '', true );
    }

    // Static method to enqueue Vue - Production Script
    private static function enqueueVueProd()
    {
        wp_enqueue_script( 'vuejs-prod' , 'https://cdn.jsdelivr.net/npm/vue/dist/vue.min.js' , array(), '', true );
    }

}