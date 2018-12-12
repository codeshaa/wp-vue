<?php
/**
 * @author Sharun John <sharun@gmail.com>
 * @package ShaanzWPVue
 * @license GPLv3
 * @version 0.2.2
 */

namespace Inc\Base;

// Deactivation Class
class Shaanz_WP_Vue_Deactivate {

    // Method that runs when plugin deactivation
    public static function deactivate(){

        flush_rewrite_rules();
    }
}