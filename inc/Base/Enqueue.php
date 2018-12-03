<?php
/**
 * @package ShaanzWPVue
 */

namespace Inc\Base;

class Enqueue
{
    public function register()
    {
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue') );

    }

    public function enqueue()
    {
        wp_enqueue_script( 'vuejs' , 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js' , array(), '', true );
    }

}