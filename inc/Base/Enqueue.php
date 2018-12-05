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

        if( $post_meta_val == '1' )
        {
            wp_enqueue_script( 'vuejs' , 'https://cdn.jsdelivr.net/npm/vue/dist/vue.min.js' , array(), '', true );
        }

    }
}