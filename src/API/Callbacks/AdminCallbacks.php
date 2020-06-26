<?php
/**
 * @package MRLExample
 * 
 * Ici on a tous les callbacks appelé dans les fichiers contrôleur du dossier Base, représentant des pages et/ou sous pages affiché dans le tableau de bord.
 * Chaque fonction reprèsente un template correspondant aux pages/sous-pages lié au tableau de bord.
 */

namespace Example\API\Callbacks;

use \Example\Base\BaseController;

class AdminCallbacks extends BaseController
{
    public function adminDashboard(){
        return require_once( "$this->plugin_path/templates/admin/admin.php");
    }
    
    public function adminValidationMembre(){
        return require_once( "$this->plugin_path/templates/admin/validation-membre.php");
    }

    public function adminAPropos(){
        return require_once( "$this->plugin_path/templates/admin/a-propos.php");
    }

    public function adminActualitesEvenements(){
        return require_once( "$this->plugin_path/templates/admin/actualites-evenements.php");
    }

}
