<?php
/**
 * @author Sharun John <sharun@gmail.com>
 * @package ShaanzWPVue
 * @license GPLv3
 * @version 0.2.4
 */

namespace Shaanz_WP_Vue_Inc\Base;

// Settings Links Class
class Shaanz_WP_Vue_SettingsLinks{
    
    // Class variable to get plugin name
    protected $plugin;

    // Construcotor that sets plugin name variable
    public function __construct(){
        
        $this->plugin = SHAANZ_VUE_PLUGIN_NAME;
    }

    // Method to add filter on plugin adtion links
    public function register(){

        add_filter( "plugin_action_links_$this->plugin", array( $this, 'aboutLink' ) );
    }

    // Method to add an about link to the plugin on activation
    public function aboutLink( $links ) {

		$author_link = '<a href="https://shaanz.com">About</a>';
		array_push( $links, $author_link );
		return $links;
    }
    
}
