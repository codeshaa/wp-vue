<?php
/**
 * @author Sharun John <sharun@gmail.com>
 * @package ShaanzWPVue
 * @license GPLv3
 * @version 0.1.7
 */

namespace Inc\Base;

// Activation Class
class Activate
{
    // Method that runs during plugin activation
    public static function activate()
    {
        flush_rewrite_rules();
    }
}