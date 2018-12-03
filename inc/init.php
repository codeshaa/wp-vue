<?php
/**
 * @package ShaanzWPVue
 */

namespace Inc;

final class init
{
    public static function getServices()
    {
        return [
            Base\Enqueue::class,
            Base\SettingsLinks::class
        ];
    }

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

    public static function instantiate( $class )
    {
        $service = new $class();
        return $service;
    }

}