<?php
/**
 * @package MRLExample
 */

namespace Example;

final class Init
{
    /**
     * Enregistre toutes les class dont on a besoin lors de l'initialisation du plugin
     * 
     * @return array Full list of classes
     */

    public static function get_services()
    {
        return [
            
            Pages\Dashboard::class,
            Base\Enqueue::class,
            Base\ArticlesController::class,
            Base\ActualitesController::class
            // Base\SettingsLink::class,
        ];
    }

    /**
     * 
     * On check s'ils ont une class register() et on l'active s'ils en ont une
     * Chaque contrôleur vont avoir une fonction register et c'est à partir de cette fonction que l'ont va activer toute les autres fonctions de chaques classes
     * @return
     */

    public static function register_services()
    {
        foreach ( self::get_services() as $class) {
            $service = self::instantiate( $class );
            if ( method_exists( $service, 'register' ) ) {
                $service->register();
            }
        }
    }

    /**
     * Initialise les class
     * @param class $class  class venant de l'array $service
     * @return class On instancie chaques classes stocké dans l'array $service
     */


    private static function instantiate( $class )
    {
        return new $class;
    }
}

