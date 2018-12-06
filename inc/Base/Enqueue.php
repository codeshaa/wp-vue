<?php
/**
 * @package ShaanzWPVue
 */

namespace Inc\Base;

final class Enqueue
{
    public function register()
    {
        add_action( 'wp_enqueue_scripts', array( $this , 'enqueueVue' ) );
    }

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

    private static function enqueueVueDev()
    {
        wp_enqueue_script( 'vuejs-dev' , 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js' , array(), '', true );
    }

    private static function enqueueVueProd()
    {
        wp_enqueue_script( 'vuejs-prod' , 'https://cdn.jsdelivr.net/npm/vue/dist/vue.min.js' , array(), '', true );
    }

}