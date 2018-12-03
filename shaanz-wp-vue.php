<?php
/**
 * @package ShaanzWPVue
 */

/*
Plugin Name:  WP Vue
Description:  WP Vue adds the power of VueJS to Wordpress. This plugin loads the VueJS script to the page that you want.
Version:      0.0.1
Author:       Sharun John
Author URI:   https://shaa.nz
License:      GPLv3 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
*/

// Abort if called direclty
defined( 'ABSPATH' ) or die( 'You can\t access this file.' );

// Require once the composer autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

// Define CONSTANTS
define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'PLUGIN', plugin_basename( __FILE__ ) );

use Inc\Base\Activate;
use Inc\Base\Deactivate;
use Inc\Base\Enqueue;



function activate_shaanz_wp_vue_plugin()
{
    Activate::activate();
}

function deactivate_shaanz_wp_vue_plugin()
{
    Deactivate::deactivate();
}

//activation
register_activation_hook( __FILE__ , 'activate_shaanz_wp_vue_plugin' );

//deactivation
register_deactivation_hook( __FILE__ , 'deactivate_shaanz_wp_vue_plugin' );


/**
 * Initializing all the core classes of the plugin
 */
if(class_exists( 'Inc\\Init' ) )
{
    Inc\init::registerServices();
}

?>