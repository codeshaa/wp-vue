<?php
/**
 * @author Sharun John <sharun@gmail.com>
 * @package ShaanzWPVue
 * @license GPLv3
 * @version 0.2.2
 */

namespace Inc\Base;

// SettingsPage Class
class Shaanz_WP_Vue_SettingsPage{

    // Register method to add action on admin menu
    public function register(){

        add_action( 'admin_menu', array( $this, 'addVueSettingsMenu') , 9 );
    }

    // Method to add submenu page under settings for Vue options
    public function addVueSettingsMenu(){

        add_submenu_page(
            'options-general.php', // parent slug
            'WP Vue Settings', // page_title,
            'WP Vue', // menu_title,
            'manage_options', // capability,
            'shaanz_wp_vue_settings', // menu_slug
            array( $this, 'vueSettingsPageContent') // function
        );

        //call register settings function
	    add_action( 'admin_init', array( $this, 'registerVueSettingsPage') );

    }
    

    // Registering Vue settings page
    public function registerVueSettingsPage(){

        //register settings
        register_setting( 'wp-vue-settings-group', 'is_vue_load_env_option' );
        register_setting( 'wp-vue-settings-group', 'is_vue_load_overide' );
    }


    // Method that provides content for Vue settings page
    public function vueSettingsPageContent(){

        // Get value environment value from the saved settings
       $get_vue_env_option =  get_option( 'is_vue_load_env_option' );

       // Get the saved boolen whether to overide individual settings
       $is_vue_load_overide =  get_option( 'is_vue_load_overide' );

        ?>

        <div class="wrap">
            <h2>WP VueJS</h2>
            <h3>Global Settings</h3>

            <div class="shaanz-wp-vue-load">
                <h4>You may define global VueJS settings on this page.</h4>

                <form method="post" action="options.php">
                    <?php wp_nonce_field('update-options'); ?>
                    <?php settings_fields( 'wp-vue-settings-group' ); ?>
                    <?php do_settings_sections( 'wp-vue-settings-group' ); ?>

                    <label for="is_vue_load_env_option"><?php _e('Load VueJS globally in version:'); ?></label>
                    <select name="is_vue_load_env_option" id="is_vue_load_env">
                        <option value="none" <?php selected( $get_vue_env_option , "none" ) ?> > None</option>
                        <option value="dev" <?php selected( $get_vue_env_option , "dev" ) ?> > Development</option>
                        <option value="prod" <?php selected( $get_vue_env_option , "prod" ) ?> > Production</option>
                    </select><br/><br/>

                    <input type="checkbox" value="1" name="is_vue_load_overide" id="is_vue_load_overide" <?php checked( $is_vue_load_overide , true, true ); ?> />
                    <label for="is_vue_load_overide"><?php _e('Please tick if you want to override indivdual settings with this.'); ?></label>

                    <?php  submit_button(); ?>
                </form>
                
                <h3>Instructions:</h3>
                <p>Ticking the box will override individual post settings, meaning, if you set Development version globally, all post types
                will load development version of the Vue Script on the front end irrespetive of what you set on the individual post settings.</p>
                <p>If override checkbox is not ticked, individual settings will consider if it is other than 'None'. That means,
                if you set "None" globally, but you have some pages that are set to "Development", then the development version of the script will
                load at the front end on those respective pages.</p>

            </div>
        </div>

        <?php
    }


} 