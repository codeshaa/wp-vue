<?php
/**
 * @author Sharun John <sharun@gmail.com>
 * @package ShaanzWPVue
 * @license GPLv3
 * @version 0.1.7
 */

namespace Inc\Base;

// Deactivation Class
class Deactivate
{

    // Method that runs when plugin deactivation
    public static function deactivate()
    {
        flush_rewrite_rules();
    }
}