<?php
/**
 * @package MRLExample
 */

namespace Example\Base;

use \Example\Base\BaseController;

class Enqueue extends BaseController
{

    public function register(){
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue' ] );//Envoi le JS et CSS
        add_action( 'wp_ajax_myprefix_get_image', 'myprefix_get_image'   );
    }

    function enqueue(){
        wp_enqueue_style('example-style', $this->plugin_url . 'assets/CSS/example-style.css', __FILE__ );
        wp_enqueue_script('example-script', $this->plugin_url . 'assets/JS/example-script.js', __FILE__ );
    }
}