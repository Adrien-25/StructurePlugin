<?php
/**
 * @package MRLExample
 */

namespace Example\Base;

use \Example\API\SettingsApi;
use \Example\Base\BaseController;
use \Example\API\Callbacks\AdminCallbacks;

class ActualitesController extends BaseController
{
    public $settings;
    public $callbacks;
    public $subpages = array();

    public $custom_post_types = [];

    public function register()
    {
        
        //Si l'option à été coché dans la page admin, alors on affiche cette sous page
        if ( ! $this->activated( 'example_actualites' ) ) return;

        $this->callbacks = new AdminCallbacks;
        $this->settings = new SettingsApi;
        $this->setSubpages();
        $this->settings->addSubPages($this->subpages)->register();

        /*Création du shortcode pour le front
        Première argument = nom du shortcode
        Deuxième argument = fonction renvoyant la page lié au shortcode*/
        add_shortcode( 'example-actualites', [$this, 'actualites_front'] );
    }

    /*Si cette page admin est connecté à un visuel dans la parti front du site
    On créé une page front dans le dossier templates et on le récupère ici
    Si la fonctionnalité de cette sous-page admin n'est pa lié directement à du front on peut supprimer cette fonction*/
    public function actualites_front()
    {
        ob_start();

        /*Si on veut ajouter du css exlusif à la page front.
        Ne pas oublier de créer le fichier à l'emplacement désigné*/
        echo "<link rel=\"stylesheet\"  href=\"$this->plugin_url/assets/css/example-actualites.css\"></link>";

        require_once( "$this->plugin_path/templates/actualites-front.php" );

        return ob_get_clean();

    }

    //Information lié à la sous-page
    public function setSubpages(){
        $this->subpages = [
            [
                'parent_slug' => 'mrl_example_plugins', //slug de la page principal
                'page_title' => 'Actualités',           //titre de la page
                'menu_title' => 'Actualités',           //titre de la page
                'capability' => 'manage_options',
                'menu_slug' => 'example_actualites',    //slug de la sous-page en question
                'callback' => [$this->callbacks, 'adminActualites'] //Appelle une fonction dans AdminCallback.php pour afficher la page php de la sous page
            ]
        ];
    }
}