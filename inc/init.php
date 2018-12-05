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
            Base\Metabox::class,
            Base\SettingsLinks::class,
            Base\Enqueue::class
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