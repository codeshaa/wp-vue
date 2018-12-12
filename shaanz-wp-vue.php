<?php
/**
 * @author Sharun John <sharun@gmail.com>
 * @package ShaanzWPVue
 * @license GPLv3
 * @version 0.2.4
 */

/*
Plugin Name:  WP Vue by Shaanz
Description:  WP Vue adds the power of VueJS to Wordpress. This plugin loads the VueJS script to the page that you want.
Version:      0.2.4
Author:       Sharun John
Author URI:   https://shaanz.com
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
define( 'SHAANZ_VUE_PLUGIN_NAME', plugin_basename( __FILE__ ) );

use Shaanz_WP_Vue_Inc\Base\Shaanz_WP_Vue_Activate;
use Shaanz_WP_Vue_Inc\Base\Shaanz_WP_Vue_Deactivate;
use Shaanz_WP_Vue_Inc\Base\Shaanz_WP_Vue_Enqueue;


// Plugin activation function
function activate_shaanz_wp_vue_plugin()
{
    Shaanz_WP_Vue_Activate::activate();
}


// Plugin deactivation function
function deactivate_shaanz_wp_vue_plugin()
{
    Shaanz_WP_Vue_Deactivate::deactivate();
}

// Plugin activation
register_activation_hook( __FILE__ , 'activate_shaanz_wp_vue_plugin' );

// Plugin deactivation
register_deactivation_hook( __FILE__ , 'deactivate_shaanz_wp_vue_plugin' );


/**
 * Initializing all the core classes of the plugin
 */
if(class_exists( 'Shaanz_WP_Vue_Inc\\Shaanz_WP_Vue_Init' ) )
{
    Shaanz_WP_Vue_Inc\Shaanz_WP_Vue_Init::registerServices();
}

?>