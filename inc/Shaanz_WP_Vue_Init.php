<?php
/**
 * @author Sharun John <sharun@gmail.com>
 * @package ShaanzWPVue
 * @license GPLv3
 * @version 0.2.4
 */

namespace Shaanz_WP_Vue_Inc;

// Initialisation class
final class Shaanz_WP_Vue_Init
{
    // Mthod to return array of classes to be initialised
    public static function getServices()
    {
        return [
            Base\Shaanz_WP_Vue_Metabox::class,
            Base\Shaanz_WP_Vue_SettingsLinks::class,
            Base\Shaanz_WP_Vue_Enqueue::class,
            Base\Shaanz_WP_Vue_SettingsPage::class
        ];
    }

    // Method to instanciate classes and calls register method if it has any.
    public static function registerServices()
    {
        foreach ( self::getServices() as $class )
        {
            $service = self::instantiate ( $class );
            if (method_exists( $service, 'register' ) ){
                $service->register();
            }
        }
    }

    // Method for initialising class
    public static function instantiate( $class )
    {
        $service = new $class();
        return $service;
    }

}