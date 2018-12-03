<?php
/**
 * @package ShaanzWPVue
 */

namespace Inc\Base;

class SettingsLinks
{
    protected $plugin;

    public function __construct()
    {
        $this->plugin = PLUGIN;
    }

    public function register()
    {
        add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
    }

    public function settings_link( $links ) 
	{
		$author_link = '<a href="https://shaa.nz">About</a>';
		array_push( $links, $author_link );
		return $links;
    }
    
}
