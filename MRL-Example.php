<?php
/**
 * @package MRLExample
 */

/*
Plugin Name: MRL Example
Description: Structure d'exemple servant à créer un plugin.
Version: 1.0.0
Author: MRL
*/

//check si le plugin est utilisé par wordpress
if( ! defined('ABSPATH') ){
    die( "You're wrong" );
}

//check si l'autoload est ne place pour les namespace
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}


//activation et deactivation du plugin

function activate_mrl_accueil(){
    Example\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_mrl_accueil' );

function deactivate_mrl_accueil(){
    Example\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_mrl_accueil' );


//initialisation du Plugin
if (class_exists( 'Example\\Init' ) ) {
    Example\Init::register_services();
}
