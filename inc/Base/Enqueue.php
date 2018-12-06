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

        $post_meta_val = get_post_meta( $post->ID, '_is_vue_load', true );

        if( $post_meta_val == 'dev' )
        {
            wp_enqueue_script( 'vuejs-dev' , 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js' , array(), '', true );
        }
        elseif( $post_meta_val == 'prod' )
        {
            wp_enqueue_script( 'vuejs-prod' , 'https://cdn.jsdelivr.net/npm/vue/dist/vue.min.js' , array(), '', true );
        }

    }
}