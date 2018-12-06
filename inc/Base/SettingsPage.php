<?php
/**
 * @package ShaanzWPVue
 */

namespace Inc\Base;

class SettingsPage
{
    public function register()
    {
        add_action( 'admin_menu', array( $this, 'addVueSettingsMenu') , 9 );
    }

    public function addVueSettingsMenu()
    {
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

    public function registerVueSettingsPage()
    {
        //register settings
        register_setting( 'wp-vue-settings-group', 'is_vue_load_env_option' );
    }


    public function vueSettingsPageContent(){

       $get_vue_env_option =  get_option( 'is_vue_load_env_option' );

        ?>

        <div class="wrap">
            <h2>WP VueJS</h2>
            <h3>Global Settings</h3>

            <div class="shaanz-wp-vue-load">
                
                <form method="post" action="options.php">
                    <?php wp_nonce_field('update-options'); ?>
                    <?php settings_fields( 'wp-vue-settings-group' ); ?>
                    <?php do_settings_sections( 'wp-vue-settings-group' ); ?>

                    <label><?php _e('Load VueJS globally in version:'); ?></label>
                    <select name="is_vue_load_env_option" id="is_vue_load_env">
                        <option value="none" <?php selected( $get_vue_env_option , "none" ) ?> > None</option>
                        <option value="dev" <?php selected( $get_vue_env_option , "dev" ) ?> > Development</option>
                        <option value="prod" <?php selected( $get_vue_env_option , "prod" ) ?> > Production</option>
                    </select>
                    <?php  submit_button(); ?>
                </form>

            </div>
        </div>

        <?php
    }


} 