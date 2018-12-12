<?php
/**
 * @author Sharun John <sharun@gmail.com>
 * @package ShaanzWPVue
 * @license GPLv3
 * @version 0.2.4
 */

namespace Shaanz_WP_Vue_Inc\Base;

// Activation Class
class Shaanz_WP_Vue_Activate{
    
    // Method that runs during plugin activation
    public static function activate(){

        flush_rewrite_rules();
    }
}