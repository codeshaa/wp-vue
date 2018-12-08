<?php
/**
 * @author Sharun John <sharun@gmail.com>
 * @package ShaanzWPVue
 * @license GPLv3
 * @version 0.2.1
 */

namespace Inc;

// Initialisation class
final class init
{
    // Mthod to return array of classes to be initialised
    public static function getServices()
    {
        return [
            Base\Metabox::class,
            Base\SettingsLinks::class,
            Base\Enqueue::class,
            Base\SettingsPage::class
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