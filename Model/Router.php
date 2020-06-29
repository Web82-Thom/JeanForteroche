<?php

namespace Model;

use Controller\HomeController;
use Controller\PostController;

class Router 
{
    private $_homeController;
    //private $_view;

    public function requete()
    {
        try {   
            // LE CONTROLLER EST INCLUS SELON L'ACTION DE L'UTILISATEUR
            if (isset($_GET['objet'])) {
                //$url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
                if ('post' === $_GET['action']) {
                    var_dump('hello');
                   $postController = new PostController();

                    // Affichage du poste
                    if ('home' === $_GET['action']) {
                        var_dump('affichage home === $_GET[action]');
                        $postController->display();
                    //affichage de la listes des postes
                    } elseif ('list' === $_GET['action']) {
                        var_dump('affichage list === $_GET[action]');
                        $postController->list();
                    }
                }
                //PAGE D'ACCUEIL    
            } else {
                var_dump('ole');
                $homeController = new HomeController();
                $homeController->displayHome();
            }

        }
        //GESTION DES ERREURS
        catch(Exception $e) {
            $errorMsg = $e->getMessage();
            require_once('views/Error.php');
        }
    }
}